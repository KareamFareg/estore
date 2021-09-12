<main id="main" class="main-site">
    <title>My Cart</title>

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            @if (Session::has('success_message'))
             <div class="alert alert-success">
             <strong>success </strong>{{Session::get('success_message')}}
             </div>
             @endif
            <div class="wrap-iten-in-cart">
            @if (Cart::instance('cart')->count()>0)
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart">
                 @foreach(Cart::instance('cart')->content() as $item)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}"{{$item->model->name}}</a>
                        </div>
                        <div class="price-field produtc-price"><p class="price">${{$item->model->regular_price}}</p></div>
                        <div class="quantity">
                            <span class="text-danger">Max Quantity :{{$item->model->quantity}}</span>
                            @if($item->model->quantity <= $item->qty)
                                @php
                                     $item->qty = $item->model->quantity ;
                                @endphp
                            @endif
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="{{$item->model->quantity}}" pattern="[0-9]*" >
                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                            </div>

                            <a class="btn justify-center" href="#" wire:click.prevent="moveToSaveForLater('{{$item->rowId}}')"> Save For Later</a>
                        </div>
                        <div class="price-field sub-total"><p class="price">{{$item->subtotal}}</p></div>
                        <div class="delete">
                            <a href="#" class="btn btn-delete" title="" wire:click.prevent="destroy('{{$item->rowId}}')">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                @endforeach
                </ul>

            </div>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{number_format((filter_var(Cart::instance('cart')->subtotal(),FILTER_SANITIZE_NUMBER_FLOAT)/100),2)}}</b></p>
                    @if (Session::has('coupon'))
                        <p class="summary-info"><span class="title">Discount ({{Session::get('coupon')['value']}} {{Session::get('coupon')['type']=='fixed' ? ' $' : ' %'}}): </span><b class="index">{{number_format($discount,2)}}</b> <a href="#" wire:click.prevent="uninstallCoupon"><i class="fa fa-times"></i></a></p>
                        <p class="summary-info"><span class="title">Subtotal after Discount</span><b class="index">${{number_format($subTotalAfterDiscount,2)}}</b></p>
                        <p class="summary-info"><span class="title">Tax ({{config('cart.tax')}} %) </span><b class="index">${{number_format($taxAfterDiscount,2)}}</b></p>
                        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                        <p class="summary-info"><span class="title">Total after Discount</span><b class="index">${{number_format($totalAfterDiscount,2)}}</b></p>

                    @else
                        <p class="summary-info"><span class="title">Tax</span><b class="index">${{Cart::instance('cart')->tax()}}</b></p>
                        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                        <p class="summary-info"><span class="title">Total</span><b class="index">${{Cart::instance('cart')->total()}}</b></p>
                    @endif

                </div>
                <div class="checkout-info">
                    @if (!Session::has('coupon'))
                        <label class="checkbox-field">
                            <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox" wire:model="haveCouponCode"><span>I have promo code</span>
                        </label>
                        @if($haveCouponCode == 1)
                            <div class="summary-item">
                                <form wire:submit.prevent="applyCouponCode">
                                    <h4 class="title-box">Coupon Code</h4>
                                    @if (Session::has('coupon_message'))
                                        <div class="alert alert-danger">{{Session::get('coupon_message')}}</div>
                                    @endif
                                    <p class="row-in-form">
                                        <label for="coupon-code">Enter your coupon code:</label>
                                        <input type="text" name="coupon-code" wire:model="CouponCode"/>
                                    </p>
                                    <button type="submit" class="btn btn-medium">Apply</button>
                                </form>
                            </div>
                        @endif
                    @endif
                    <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Check out</a>
                    <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
                <div class="update-clear">
                    <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
                    <a class="btn btn-update" href="#">Update Shopping Cart</a>
                </div>
            </div>
                @else
                    <div class="text-center" style="padding: 30px 0">
                        <h1>Your Cart is Empty</h1>
                        <p style="color: red;font-weight: bold">Add Items to it now</p>
                        <a class="btn btn-success btn-medium" href="/shop">Shop Now</a>
                    </div>


                @endif
        {{-- saveforlater     --}}
                @if (Cart::instance('saveforlater')->count()>0)
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                <div class="wrap-iten-in-cart">
                    <h3 class="title-box" style="margin-bottom:30px;">{{Cart::instance('saveforlater')->count()}} Item(s) Save for later</h3>
                        <h3 class="box-title">Products Name</h3>
                        <ul class="products-cart">
                            @foreach(Cart::instance('saveforlater')->content() as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}"{{$item->model->name}}</a>
                                    </div>
                                    <div class="price-field produtc-price"><p class="price">${{$item->model->regular_price}}</p></div>
                                    <div class="quantity">
                                        <button class="btn btn-success btn-medium" style="margin-bottom:10px"   href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')"> Save To Cart</button>
                                        <button class="btn btn-danger btn-medium"  href="#" wire:click.prevent="deleteFromSaveForLater('{{$item->rowId}}')"> Delete from save for later</button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p  class="title-box" style="margin-top:30px;color: white; padding: 10px; background-color: darkgrey; font-size: medium ">No Item In save for later</p>
                    @endif
                </div>
                </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
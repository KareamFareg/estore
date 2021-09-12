<div>
    <div>
        <title>Top New Products</title>

        <style>
            .product-wish{
                position: absolute;
                top: 10%;
                left: 0;
                z-index: 99;
                right: 30px;
                text-align: right;
                padding-top: 0px;
            }
            .product-wish .fa{
                color: #cbcbcb;
                font-size: 32px;
            }
            .product-wish .fa:hover{
                color: #ff2832;
            }
            .fill-heart{
                color: #ff2832 !important;
            }
        </style>
        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><a href="/shop" class="link">Products</a></li>
                    <li class="item-link"><span>Top New Products</span></li>
                </ul>
            </div>
            <div class="row">
                <ul class="product-list grid-products equal-container">
                    @php
                        $witems=Cart::instance('wishlist')->content()->pluck('id');
                    @endphp
                    @foreach($products as $product)

                        <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                        <figure><img src="{{asset('assets/images/products') }}/{{$product->image}}" alt="{{$product->name}}"></figure>
                                    </a>
                                    <div class="group-flash" >
                                        <span class="flash-item new-label" >New</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="{{route('product.details',['slug'=>$product->slug])}}" class="product-name"><span>{{$product->name}}</span></a>
                                    @if($product->sale_price > 0)
                                        <div class="wrap-price"><span class="product-price">${{$product->sale_price}}</span> <del><p class="product-price">${{$product->regular_price}}</p></del></div>
                                    @else
                                        <div class="wrap-price"><span class="product-price">${{$product->regular_price}}</span></div>

                                    @endif
                                    <div><a class="btn add-to-cart"  href="#"  wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add To Cart</a></div>

                                    <div class="product-wish">
                                        @if($witems->contains($product->id))
                                            <a href="#" wire:click.prevent="removeFromWishList({{$product->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                        @else
                                            <a href="#" wire:click.prevent="addToWishList({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fa fa-heart"></i></a>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="text-center justify-center"> {{ $products-> links() }}</div>
            </div>

        </div>
    </div></div>

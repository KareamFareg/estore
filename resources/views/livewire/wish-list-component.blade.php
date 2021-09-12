<main id="main" class="main-site left-sidebar" >
    <title>My WishList</title>

    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
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
                <li class="item-link"><span>wishlist</span></li>
            </ul>
        </div>
        <div class="row">
            @if(Cart::instance('wishlist')->content()->count() > 0)
            <ul class="product-list grid-products equal-container">
                @foreach(Cart::instance('wishlist')->content() as $item)
                    @if($item)
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product.details',['slug'=>$item->model->slug])}}" title="{{$item->model->name}}">
                                    <figure><img src="{{asset('assets/images/products') }}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="{{route('product.details',['slug'=>$item->model->slug])}}" class="product-name"><span>{{$item->model->name}}</span></a>
                                <div class="wrap-price"><span class="product-price">{{$item->model->regular_price}}</span></div>
                                <div><a class="btn add-to-cart"  href="#"  wire:click.prevent="moveFromWishList('{{$item->rowId}}')">Add To Cart</a></div>

                                <div class="product-wish">
                                        <a href="#" wire:click.prevent="removeFromWishList({{$item->model->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                 @else
                     <h4>No Item in the Wishlist</h4>
                 @endif

            </ul>
        </div>
    </div>
</main>
<div>
    <title>{{$category_name}}</title>

    <main id="main" class="main-site left-sidebar" >

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>Product Categories</span></li>
                    <li class="item-link"><span>{{$category_name}}</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                    <div class="banner-shop">
                        <a href="#" class="banner-link">
                            <figure><img src="{{asset('assets/images/shop-banner.jpg')}}" alt=""></figure>
                        </a>
                    </div>

                    <div class="wrap-shop-control">

                        <h1 class="shop-title">{{$category_name}}</h1>

                    </div><!--end wrap shop control-->

                    <div class="row">

                        <ul class="product-list grid-products equal-container">

                            @foreach($products as $product)

                                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                                <figure><img src="{{asset('assets/images/products') }}/{{$product->image}}" alt="{{$product->name}}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('product.details',['slug'=>$product->slug])}}" class="product-name"><span>{{$product->name}}</span></a>
                                            <div class="wrap-price"><span class="product-price">{{$product->regular_price}}</span></div>
                                            <div><a class="btn add-to-cart"  href="#"  wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add To Cart</a></div>

                                        </div>
                                    </div>
                                </li>

                            @endforeach

                        </ul>

                    </div>

                    <div class="wrap-pagination-info">
                        <div class="text-center justify-center"> {!! $products-> links() !!}</div>
                    </div>
                </div><!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget">
                        <h2 class="widget-title">All Categories</h2>
                        <div class="widget-content">
                            <ul class="list-category">
                                @foreach($categories as $category)
                                    <li class="category-item has-child-cate">
                                        <a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="cate-link">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- Categories widget-->
                    <!-- Price-->
                    <div class="widget mercado-widget filter-widget price-filter" style="margin-top: 60px ;">
                        <h2 class="widget-title">Price <span class="text-info">${{$min_price}} - ${{$max_price}}</span></h2>
                        <div class="widget-content" style="padding: 10px 5px 12px">
                            <div id="slider" wire:ignore></div>
                        </div>
                    </div><!--price-->
                    <!-- poplar products-->
                    @if($poplar_products->count() > 0)
                        <div class="widget mercado-widget widget-product" style="margin-top: 60px ;">
                            <h2 class="widget-title">Popular Products</h2>
                            <div class="widget-content">
                                <ul class="products">
                                    @foreach($poplar_products as $product)
                                        <li class="product-item">
                                            <div class="product product-widget-style">
                                                <div class="thumbnnail">
                                                    <a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                                        <figure><img src="{{asset('assets/images/products') }}/{{$product->image}}" alt="{{$product->name}}"></figure>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <a href="{{route('product.details',['slug'=>$product->slug])}}" class="product-name"><span>{{$product->name}}</span></a>
                                                    @if($product->sale_price > 0)
                                                        <div class="wrap-price"><span class="product-price">${{$product->sale_price}}</span> <del><p class="product-price">${{$product->regular_price}}</p></del></div>
                                                    @else
                                                        <div class="wrap-price"><span class="product-price">${{$product->regular_price}}</span></div>

                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div><!-- poplar products-->
                </div><!--end sitebar-->

            </div><!--end row-->

        </div><!--end container-->

    </main>
</div>

@push('scripts')

    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider,{
            start:[1,1000],
            connect:true,
            range: {
                'min': 1,
                'max': 1000
            },
            pips:{
                mode:'steps',
                stepped:true,
                density:4
            }
        });
        slider.noUiSlider.on('update',function (value) {
        @this.set('min_price',value[0]);
        @this.set('max_price',value[1]);
        });

    </script>


@endpush

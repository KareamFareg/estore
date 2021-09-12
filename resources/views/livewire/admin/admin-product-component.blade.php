<div>
    <title>Admin Products</title>

    <style>
        nav svg{
            height: 20px;
            color: #f00;
            padding: 0px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style='padding: 30px 0px ;'>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    @if(Session::has('success_message'))
                        <p class="alert alert-success">{{Session::get('success_message')}}</p>
                    @endif
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Products
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.add.products')}}" class="alert alert-success pull-right"> Add New Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class='table table-striped'>
                            <thead>
                            <tr>
                                <td>Produuct id</td>
                                <td>Image</td>
                                <td>Prooduct name</td>
                                <td>Product slug</td>
                                <td> Price</td>
                                <td>Stock status</td>
                                <td>Quantity</td>
                                <td>Category</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><img  height="20px" width="40px" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}"></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td>{{$product->regular_price}}</td>
                                    <td>{{$product->stock_status}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->Category->name}}</td>
                                    <td>
                                        <a href="{{route('admin.edit.products',['product_slug'=>$product->slug])}}"> <i class="fa fa-edit fa-2x"></i> </a>
                                        <a href="#" onclick="confirm('Do You want to delete this product ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})"> <i class="fa fa-times fa-2x"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center justify-center"> {{$products->links()}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
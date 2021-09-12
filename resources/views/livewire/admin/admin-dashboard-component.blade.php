<div class="content">
    <title>Admin Dashboard</title>

    <style>
        .content {
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            margin-bottom: 1em;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }
        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }
        .icon-stat-visual {
            position: relative;
            top: 22px;
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            line-height: 30px;
        }
        .bg-primary {
            color: #fff;
            background: #d74b4b;
        }
        .bg-secondary {
            color: #fff;
            background: #6685a4;
        }

        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class=" panel-heading">
                        My Profile
                    </div>
                    <div class=" panel-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{$user->name}}</td>
                                <th>Email</th>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td>{{$user->age}}</td>
                                <th>Gender</th>
                                @if($user->gender == true)
                                    <td>Male</td>
                                @elseif($user->gender == false)
                                    <td>Female</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$user->phone}}</td>
                                <th>Country</th>
                                <td>{{$user->country}}</td>

                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$user->address}}</td>
                                <th>Registration Date</th>
                                <td>{{$user->created_at}}</td>
                            </tr>
                            <tr>
                                <th></th>
                                <td></td>
                                <td> <a class="btn btn-primary" href="{{route('admin.profile')}}">Change Profile</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($myOrders)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                My Orders
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.orders')}}">See ALL orders</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class='table table-striped'>
                            <thead>
                            <tr>
                                <td>Order id</td>
                                <td>Subtotal</td>
                                <td>Discount</td>
                                <td>Tax</td>
                                <td>Total</td>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Mobile</td>
                                <td>Email</td>
                                <td>Zipcode</td>
                                <td>Status</td>
                                <td>Order Date</td>
                                <td colspan="2" class="text-center">Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($myOrders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->subtotal}}</td>
                                    <td>{{$order->discount}}</td>
                                    <td>{{$order->tax}}</td>
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->firstname}}</td>
                                    <td>{{$order->lastname}}</td>
                                    <td>{{$order->mobile}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->zipcode}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">Total Revenue</span>
                            <span class="icon-stat-value">${{$totalRevenue}}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">Total Sales</span>
                            <span class="icon-stat-value">{{$totalSales}}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">Today Revenue</span>
                            <span class="icon-stat-value">${{$todayRevenue}}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">Today Sales</span>
                            <span class="icon-stat-value">{{$todaySales}}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-stat">
                    <div class="row">
                        <div class="col-xs-8 text-left">
                            <span class="icon-stat-label">  Products with limit Quantity</span>
                            <span class="icon-stat-value">{{$less_products_count}}</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                        </div>
                    </div>
                    <div class="icon-stat-footer">
                        <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      Latest Orders
                  </div>
                  <div class="panel-body">
                      <table class='table table-striped'>
                          <thead>
                          <tr>
                              <td>Order id</td>
                              <td>Subtotal</td>
                              <td>Discount</td>
                              <td>Tax</td>
                              <td>Total</td>
                              <td>First Name</td>
                              <td>Last Name</td>
                              <td>Mobile</td>
                              <td>Email</td>
                              <td>Zipcode</td>
                              <td>Status</td>
                              <td>Order Date</td>
                              <td>Action</td>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($orders as $order)
                              <tr>
                                  <td>{{$order->id}}</td>
                                  <td>{{$order->subtotal}}</td>
                                  <td>{{$order->discount}}</td>
                                  <td>{{$order->tax}}</td>
                                  <td>{{$order->total}}</td>
                                  <td>{{$order->firstname}}</td>
                                  <td>{{$order->lastname}}</td>
                                  <td>{{$order->mobile}}</td>
                                  <td>{{$order->email}}</td>
                                  <td>{{$order->zipcode}}</td>
                                  <td>{{$order->status}}</td>
                                  <td>{{$order->created_at}}</td>
                                  <td><a href="{{route('admin.order.details',['order_id' => $order->id])}}" class="btn btn-info btn-sm">Details</a></td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
        @if($less_products_count > 0)
        <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      Almost Empty Quantity
                  </div>
                  <div class="panel-body">
                      <table class='table table-striped'>
                          <thead>
                          <tr>
                              <td>Produuct id</td>
                              <td>Image</td>
                              <td>Prooduct name</td>
                              <td>Product slug</td>
                              <td>Price</td>
                              <td>Sale Price</td>
                              <td>Stock status</td>
                              <td>Quantity</td>
                              <td>Category</td>
                              <td>Actions</td>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($less_products as $product)
                              <tr>
                                  <td>{{$product->id}}</td>
                                  <td><img  height="20px" width="40px" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}"></td>
                                  <td>{{$product->name}}</td>
                                  <td>{{$product->slug}}</td>
                                  <td>{{$product->regular_price}}</td>
                                  @if($product->sale_price > 0)
                                      <td>{{$product->sale_price}}</td>
                                  @else
                                      <td>No Offer</td>
                                  @endif
                                  <td>{{$product->stock_status}}</td>
                                  <td>{{$product->quantity}}</td>
                                  <td>{{$product->Category->name}}</td>
                                  <td>
                                      <a href="{{route('admin.edit.products',['product_slug'=>$product->slug])}}"> <i class="fa fa-edit fa-2x"></i> </a>
                                      <a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                  </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      Top Ordered Items
                  </div>
                  <div class="panel-body">
                      <table class='table table-striped'>
                          <thead>
                          <tr>
                              <td>Produuct id</td>
                              <td>Image</td>
                              <td>Prooduct name</td>
                              <td>Price</td>
                              <td>Sale Price</td>
                              <td>Stock status</td>
                              <td>Quantity</td>
                              <td>Ordered Count</td>
                              <td>Category</td>
                              <td>Actions</td>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($topOrdered as $product)
                              <tr>
                                  <td>{{$product->id}}</td>
                                  <td><img  height="20px" width="40px" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}"></td>
                                  <td>{{$product->name}}</td>
                                  <td>{{$product->regular_price}}</td>
                                  @if($product->sale_price > 0)
                                      <td>{{$product->sale_price}}</td>
                                  @else
                                      <td>No Offer</td>
                                  @endif
                                  <td>{{$product->stock_status}}</td>
                                  <td>{{$product->quantity}}</td>
                                  <td>{{$product->ordered_count}}</td>
                                  <td>{{$product->Category->name}}</td>
                                  <td>
                                      <a href="{{route('admin.edit.products',['product_slug'=>$product->slug])}}"> <i class="fa fa-edit fa-2x"></i> </a>
                                      <a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}"></a>
                                  </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
         @endif
    </div>
</div>
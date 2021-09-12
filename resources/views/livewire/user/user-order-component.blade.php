<div>
    <title>My Orders</title>

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
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                My Orders
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('order_updated'))
                          <div class="alert alert-success" role="alert"> {{Session::get('order_updated')}}</div>
                        @endif
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
                                    <td><a href="{{route('user.order.details',['order_id' => $order->id])}}" class="btn btn-info btn-sm">Details</a></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                status
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                                @if($order->status !== 'delivered')
                                                <li><a href="#"  wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Delivered</a></li>
                                                @php
                                                    // Declare and define two dates
                                                    $date1 = strtotime($order->created_at);
                                                    $date2 = strtotime(now());

                                                    // Formulate the Difference between two dates
                                                    $diff = abs($date2 - $date1);


                                                    // To get the year divide the resultant date into
                                                    // total seconds in a year (365*60*60*24)
                                                    $years = floor($diff / (365*60*60*24));


                                                    // To get the month, subtract it with years and
                                                    // divide the resultant date into
                                                    // total seconds in a month (30*60*60*24)
                                                    $months = floor(($diff - $years * 365*60*60*24)
                                                                                   / (30*60*60*24));


                                                    // To get the day, subtract it with years and
                                                    // months and divide the resultant date into
                                                    // total seconds in a days (60*60*24)
                                                    $days = floor(($diff - $years * 365*60*60*24 -
                                                                 $months*30*60*60*24)/ (60*60*24));

                                                @endphp
                                                @if($order->status === 'ordered' && $days < 7)
                                                <li><a href="#"  wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Canceled</a></li>
                                                    @endif
                                            @else
                                                <p>Order is already Delivered</p>
                                           @endif
                                            </ul>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center justify-center"> {{$orders->links()}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


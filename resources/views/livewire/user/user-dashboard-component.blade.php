<div>
    <title>My Dashboard</title>
    <div class="container" style="padding-top: 30px">
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
                                    <td style="padding-top: 20px;float: right"> <a class="btn btn-primary" href="{{route('edit.profile')}}">Change Profile</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @if($orders->count() > 0)
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
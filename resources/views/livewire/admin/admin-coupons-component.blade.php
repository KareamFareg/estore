<div>
    <title>Coupons</title>

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
                    @if(Session::has('delete_success'))
                        <p class="alert alert-success">{{Session::get('delete_success')}}</p>
                    @endif
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Coupons
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.coupon.add')}}" class="alert alert-success pull-right"> Add New Coupon</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class='table table-striped'>
                            <thead>
                            <tr>
                                <td>Coupon id</td>
                                <td>Coupon Code</td>
                                <td>Coupon Type</td>
                                <td>Coupon Value</td>
                                <td>Cart Value</td>
                                <td>Expiry Date</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->id}}</td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->type}}</td>
                                    @if($coupon->type == 'fixed')
                                    <td>$ {{$coupon->value}}</td>
                                    @else
                                        <td>{{$coupon->value}} %</td>
                                     @endif
                                    <td>{{$coupon->cart_value}}</td>
                                    <td>{{$coupon->expiry_date}}</td>
                                        <td>
                                        <a href="{{route('admin.coupon.edit',['coupon_id'=>$coupon->id])}}"> <i class="fa fa-edit fa-2x"></i> </a>
                                        <a href="#" onclick="confirm('Do You want to delete this coupon ?') || event.stopImmediatePropagation()" wire:click.prevent="deletecoupon({{$coupon->id}})"> <i class="fa fa-times fa-2x"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center justify-center"> {{$coupons->links()}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOrderComponent extends Component
{
    /**
     * update user order status when [delivered or cancel order]
     * @param $order_id
     * @param $status
     */
    public function updateOrderStatus($order_id , $status){
        $order = Order::find($order_id);
        $order->status = $status;
        if($status = 'delivered'){
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }elseif ($status = 'canceled'){
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_updated','You change order status successfully');
    }
    public function render()
    {
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
        return view('livewire.user.user-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}

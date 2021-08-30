<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    /**
     * @var $order_id
     */
    public $order_id;
    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * cancel order
     */
    public function cancelOrder(){
        $order = Order::find($this->order_id);
        $order->status = 'canceled';
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('order_canceled' , 'You Cancel this order successfully');
    }
    public function render()
    {
        $order = Order::where('user_id',Auth::user()->id)->find($this->order_id);
        return view('livewire.user.user-order-details-component',['order' => $order])->layout('layouts.base');
    }
}

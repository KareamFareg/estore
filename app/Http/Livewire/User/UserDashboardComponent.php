<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $user = User::find(Auth::user()->id);
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get()->take(5);

        return view('livewire.user.user-dashboard-component',['user'=>$user,'orders'=>$orders])->layout('layouts.base');
    }
}

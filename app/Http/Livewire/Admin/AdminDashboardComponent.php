<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    /**
     * return some important statistics and data to admin dashbord to monitoring business
     * @return mixed
     */
    public function render()
    {
        $user = User::find(Auth::user()->id);
        $myOrders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get()->take(5);

        $orders              =  Order::orderBy('created_at' , 'DESC')->get()->take(10);
        $less_products       =  Product::where('quantity','<=',5)->get()->take(10); //products that it's quantity less than 5
        $less_products_count =  Product::where('quantity','<=',5)->count(); //count of products that it's quantity less than 5
        $totalSales          =  Order::where('status','delivered')->count();  //count of orders that deliverd of all time
        $totalRevenue        =  Order::where('status','delivered')->sum('total'); //sum of salary of orders that deliverd
        $todaySales          =  Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count(); //count of orders that deliverd TODAY
        $todayRevenue        =  Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total'); //sum of salary of orders that deliverd TODAY
        $topOrdered          =  Product::orderBy('ordered_count','DESC')->get()->take(10);
        return view('livewire.admin.admin-dashboard-component',[
            'user'                  => $user,
            'myOrders'              => $myOrders,
            'orders'                => $orders,
            'totalSales'            => $totalSales,
            'totalRevenue'          => $totalRevenue,
            'todaySales'            => $todaySales,
            'todayRevenue'          => $todayRevenue,
            'less_products'         => $less_products,
            'less_products_count'   => $less_products_count,
            'topOrdered'            => $topOrdered
        ])->layout('layouts.base');
    }
}

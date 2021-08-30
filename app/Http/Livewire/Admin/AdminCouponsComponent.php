<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCouponsComponent extends Component
{
    use WithPagination;

    /**
     * delete coupon
     * @param $coupon_id
     */
    public function deletecoupon($coupon_id){
         Coupon::find($coupon_id)->delete();
        session()->flash('delete_success','coupon deleted successfully');
    }
    public function render()
    {
        $coupons = Coupon::paginate(8);
        return view('livewire.admin.admin-coupons-component',['coupons' => $coupons])->layout('layouts.base');
    }
}

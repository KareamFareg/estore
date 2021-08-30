<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminAddCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;

    /**
     * validation input fields
     * @param $fields
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($fields){
        $this->validateOnly($fields,[
            'code'=> 'required|unique:coupons',
            'type'=> 'required',
            'value'=> 'required|numeric',
            'cart_value'=> 'required|numeric',
            'expiry_date'=> 'required',

        ]);
    }

    /**
     * add coupon to enable user use it's code for discount
     */
    public function storecoupon(){
        $this->validate([
            'code'=> 'required|unique:coupons',
            'type'=> 'required',
            'value'=> 'required|numeric',
            'cart_value'=> 'required|numeric',
            'expiry_date'=> 'required',
        ]);
        $coupon=new Coupon();
        $coupon->code=$this->code;
        $coupon->type=$this->type;
        $coupon->value=$this->value;
        $coupon->cart_value=$this->cart_value;
        $coupon->expiry_date=$this->expiry_date;
        $coupon->save();
        session()->flash('success_message','created coupon successfully');

    }
    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')->layout('layouts.base');
    }
}

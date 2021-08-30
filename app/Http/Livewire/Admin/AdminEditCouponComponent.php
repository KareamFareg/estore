<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminEditCouponComponent extends Component
{
    public $coupon_id;
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;

    /**
     * select coupon from db throw it's id
     * @param $coupon_id
     */
    public function mount($coupon_id)
    {
        $coupon=Coupon::find($coupon_id);
        $this->code        = $coupon->code;
        $this->type        = $coupon->type;
        $this->value       = $coupon->value;
        $this->cart_value  = $coupon->cart_value;
        $this->coupon_id   = $coupon->id;
        $this->expiry_date = $coupon->expiry_date;
    }

    /**
     * validation to coupon input fields
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
     * update coupon
     */
    public function updatecoupon(){
        $this->validate([
            'code'       => 'required|unique:coupons',
            'type'       => 'required',
            'value'      => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date'=> 'required',
        ]);
        $coupon = Coupon::find($this->coupon_id);
        $coupon->code        =  $this->code;
        $coupon->type        =  $this->type;
        $coupon->value       =  $this->value;
        $coupon->cart_value  =  $this->cart_value;
        $coupon->expiry_date=$this->expiry_date;
        $coupon->save();
        session()->flash('success_message','coupon has been updated successfully');

    }
    public function render()
    {
        return view('livewire.admin.admin-edit-coupon-component')->layout('layouts.base');
    }
}

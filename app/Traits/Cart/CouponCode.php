<?php
namespace App\Traits\Cart;

use App\Models\Coupon;
use Carbon\Carbon;
use Cart;

trait CouponCode{

    /**
     * apply coupon to  discount the total price
     * check coupon code validation
     */
    public function applyCouponCode()
    {
        $coupon  = Coupon::where('code',$this->CouponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',(filter_var(Cart::instance('cart')->subtotal(),FILTER_SANITIZE_NUMBER_FLOAT)/100))->first();
        if (!$coupon)
        {
            session()->flash('coupon_message','sorry, this coupon is invalid');
            return;
        }else{
            session()->put('coupon',[
                'code'       =>$coupon->code,
                'type'       =>$coupon->type,
                'value'      =>$coupon->value,
                'cart_value' =>$coupon->cart_value
            ]);
        }
    }

    /**
     * un use coupon
     * delete discount from total price
     */
    public function uninstallCoupon(){
        session()->forget('coupon');
    }
}
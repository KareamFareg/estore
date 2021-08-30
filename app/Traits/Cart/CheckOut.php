<?php
namespace App\Traits\Cart;

use Illuminate\Support\Facades\Auth;
use Cart;

trait CheckOut{

    /**
     * check from login or not (have permission)
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function checkout(){
        if(Auth::check()){
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login');
        }
    }

    /**
     * check if using coupon or not
     * calculate the final prices of products to put it in session by key [checkout] to ready for making order and payment
     *
     */
    public function setAmountForCheckout(){
        if (!Cart::instance('cart')->count() > 0){
            session()->forget('checkout');
            return;
        }
        if (session()->has('coupon')){
            session()->put('checkout',[
                'discount'  =>$this->discount,
                'subtotal'  => $this->subTotalAfterDiscount,
                'tax'       =>$this->taxAfterDiscount,
                'total'     =>$this->totalAfterDiscount
            ]);
        }else{
            session()->put('checkout',[
                'discount'  =>0,
                'subtotal'  => filter_var(Cart::instance('cart')->subtotal(),FILTER_SANITIZE_NUMBER_FLOAT)/100,
                'tax'       => filter_var(Cart::instance('cart')->tax(),FILTER_SANITIZE_NUMBER_FLOAT)/100,
                'total'     => filter_var(Cart::instance('cart')->total(),FILTER_SANITIZE_NUMBER_FLOAT)/100
            ]);
        }
    }
}
<?php

namespace App\Traits\Checkout;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

trait SaveOrder{

    public function PlaceOrder(){
        $this->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|email',
            'mobile'    => 'required|numeric',
            'line1'     => 'required',
            'province'  => 'required',
            'country'   => 'required',
            'city'      => 'required',
            'zipcode'   => 'required'
        ]);

        //order
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->discount=session()->get('checkout')['discount'];
        $order->tax=session()->get('checkout')['tax'];
        $order->subtotal=session()->get('checkout')['subtotal'];
        $order->total=session()->get('checkout')['total'];
        $order->firstname=$this->firstname;
        $order->lastname=$this->lastname;
        $order->email=$this->email;
        $order->mobile=$this->mobile;
        $order->line1=$this->line1;
        $order->line2=$this->line2;
        $order->province=$this->province;
        $order->country=$this->country;
        $order->city=$this->city;
        $order->zipcode=$this->zipcode;
        $order->status='ordered';
        $order->is_shipping_different=$this->ship_for_diff ? 1:0;
        $order->save();

        return $order;
    }
}

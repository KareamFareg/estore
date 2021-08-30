<?php

namespace App\Traits\Checkout;

use App\Models\Shipping;
use App\Models\Order;

trait ShippingOrder{

    public function ship(Order $order){
        if ($this->ship_for_diff){
            $this->validate([
                's_firstname' => 'required',
                's_lastname'  => 'required',
                's_email'     => 'required|email',
                's_mobile'    => 'required|numeric',
                's_line1'     => 'required',
                's_province'  => 'required',
                's_country'  => 'required',
                's_city'  => 'required',
                's_zipcode'  => 'required'
            ]);
            $shipping = new Shipping();
            $shipping->order_id   = $order->id;
            $shipping->firstname  =$this->s_firstname;
            $shipping->lastname   =$this->s_lastname;
            $shipping->email      =$this->s_email;
            $shipping->mobile     =$this->s_mobile;
            $shipping->line1      =$this->s_line1;
            $shipping->line2      =$this->s_line2;
            $shipping->province   =$this->s_province;
            $shipping->country    =$this->s_country;
            $shipping->city       =$this->city;
            $shipping->zipcode    =$this->s_zipcode;
            $shipping->save();
        }
        else{
            $shipping = new Shipping();
            $shipping->order_id   = $order->id;
            $shipping->firstname  =$this->firstname;
            $shipping->lastname   =$this->lastname;
            $shipping->email      =$this->email;
            $shipping->mobile     =$this->mobile;
            $shipping->line1      =$this->line1;
            $shipping->line2      =$this->line2;
            $shipping->province   =$this->province;
            $shipping->country    =$this->country;
            $shipping->city       =$this->city;
            $shipping->zipcode    =$this->zipcode;
            $shipping->save();
        }
    }
}

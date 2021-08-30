<?php

namespace App\Traits\Checkout;

use App\Models\Order;
use Cartalyst\Stripe\Stripe;

trait PaymentMode{

    /**
     * check payment mode [cash on delivery (cod) or card (strip) ]
     * @param Order $order
     * @param $mode
     */
    public function payment(Order $order,$mode){
        if ($mode == 'card')
        {
            $this->validate([
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ]);
        }
        if ($mode=='cod')
        {
            $this->storeTransaction($order->id,'pending');
            $this->resetCart();
        }
        elseif ($mode=='card')
        {
            $stripe = Stripe::make(env('STRIPE_KEY'));
            try{
                $token = $stripe->tokens()->create([
                    'card'=>[
                        'number' => $this->card_no,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc
                    ]
                ]);
                if (!isset($token['id']))
                {
                    session()->flash('stripe_token' , 'the stripe token was not generated correctly');
                    $this->thankyou = 0;
                }

                $customer = $stripe->customers()->create([
                    'name' =>$this->firstname.' '.$this->lastname,
                    'email' =>$this->email,
                    'phone'=>$this->mobile,
                    'address'=>[
                        'line1' => $this->line1,
                        'postal_code' => $this->zipcode,
                        'city'=>$this->city,
                        'state'=>$this->province,
                        'country'=> $this->country
                    ],
                    'shipping'=>[
                        'name' =>$this->firstname.' '.$this->lastname,
                        'address'=>[
                            'line1' => $this->line1,
                            'postal_code' => $this->zipcode,
                            'city'=>$this->city,
                            'state'=>$this->province,
                            'country'=> $this->country
                        ],
                    ],
                    'source' => $token['id']
                ]);
                $charge = $stripe->charges()->create([
                    'customer' =>$customer['id'],
                    'currency' => 'USD',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Payment for order no '.$order->id,
                ]);
                if ($charge['status'] == 'succeeded')
                {
                    $this->storeTransaction($order->id , 'approved');
                    $this->resetCart();
                }
                else {
                    session()->flash('stripe_error' , 'Error in Transaction !');
                    $this->thankyou = 0;
                }
            }catch (\Exception $e){
                session()->flash('stripe_error' , $e->getMessage());
                $this->thankyou = 0;
            }
        }
    }
}

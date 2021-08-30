<?php

namespace App\Traits\Checkout;

use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

trait Trans{

    public function storeTrans($order_id,$status){

            $transaction = new Transaction();
            $transaction->user_id =Auth::user()->id;
            $transaction->order_id = $order_id;
            $transaction->mode='cod';
            $transaction->status=$status;
            $transaction->save();
    }
}
<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\OrderItem;
use App\Traits\Checkout\PaymentMode;
use App\Traits\Checkout\SaveOrder;
use App\Traits\Checkout\ShippingOrder;
use App\Traits\Checkout\Trans;
use App\Traits\Checkout\ValidateFields;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Cart;

class CheckoutComponent extends Component
{
    use ValidateFields;
    use SaveOrder;
    use ShippingOrder;
    use PaymentMode;
    use Trans;

    /**
     * @var boolean ship to different address or person
     */
    public $ship_for_diff;
    /**
     * @var string payment mode [cash on delivery (cod)][card (stripe)]
     */
    public $paymentmode;
    /**
     *  to show thanks message
     * @var boolean thankyou if [ 1 => order is success] [0 => something wrong that happen]
     */
    public $thankyou;

//billing data
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $province;
    public $country;
    public $city;
    public $zipcode;
//card info [ if payment mode is card]
    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;

//shipping to another one or address [if $ship_for_diff is true or 1]
    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_province;
    public $s_country;
    public $s_city;
    public $s_zipcode;


    /**
     * validation to inputs [billing , ship to another , card info]
     * @param $fields
     */
    public function updated($fields){
       $this->Validator($fields);
    }

    /**
     * store order information in database
     * store shipping information in database
     * Reduce product quantity after creating item
     * Payment method [card , cash on delivery]
     * store order items data  in it's table
     * send confirmation email when order complete to inform user
     */
    public function storeOrder(){
        $order = $this->PlaceOrder();
        $this->ship($order);
        foreach(Cart::instance('cart')->content() as $item){
            $order_item = new OrderItem();
            $order_item ->product_id =  $item->id;
            $order_item ->order_id =  $order->id;
            $order_item ->quantity =  $item->qty;
            $order_item ->price =  $item->price;
            $order_item->product->quantity =  $order_item->product->quantity - $item->qty;
            $order_item->product->ordered_count = $order_item->product->ordered_count +  $item->qty;
            $order_item->product->save();
            $order_item -> save();
            Cart::instance('cart')->destroy();

        }
        $this->payment( $order , $this->paymentmode);

        $this->sendOrderConfirmationMail($order);
    }

    /**
     * @param $order_id
     * @param $status
     *
     */
    public function storeTransaction($order_id,$status){
        $this->storeTrans($order_id,$status);
    }

    /**
     * send confirmation email when order complete to inform user
     * @param $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendOrderConfirmationMail($order){
            // pass dynamic message to mail class
            $toEmail = Auth::user()->email;
            Mail::to($toEmail)->send(new OrderMail($order));

    }

    /**
     * reset cart after order is done to enable user to add another order
     */
    public function resetCart(){
        $this->thankyou = 1;
        session()->forget('checkout');
    }

    /**
     * check for signing  and route to thanking page when order is placed
     */
    public function verfiyForCheckout(){
        if (!Auth::check()){
            redirect()->route('login');
        }else if($this->thankyou){
            redirect()->route('thankyou');
        }
        else if(!Session::has('checkout')){
            redirect()->route('product.cart');
        }
    }
    public function render()
    {
        $this->verfiyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}

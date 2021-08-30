<?php
namespace App\Http\Livewire;


use App\Traits\Cart\cartTrait;
use App\Traits\Cart\CheckOut;
use App\Traits\Cart\CouponCode;
use App\Traits\Cart\SaveForLaterTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    use SaveForLaterTrait;
    use CouponCode;
    use CheckOut;
    use cartTrait;

    public $haveCouponCode;
    public $CouponCode;
    public $discount;
    public $subTotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    /**
     * increase the quantity of cart when adding products to it
     * refresh the cart to update it's new count
     * @param $rowId

     */
    public function increaseQuantity($rowId)
    {
        $this->incQty($rowId);
    }

    /**
     * decrease the quantity of cart when remove products from it
     * refresh the cart to update it's new count
     * @param $rowId
     */
    public function decreaseQuantity($rowId)
    {
        $this->decQty($rowId);
    }

    /**
     *  remove item from cart
     * @param $rowId
     */
    public function destroy($rowId)
    {
      $this->removeFromCart($rowId);
    }

    /**
     * remove all items (empty) from cart
     */
    public function destroyAll()
    {
       $this->removeAllCart();
    }

    /**
     * calculate the total , tax , discount  prices to bill and ready to checkout and make order
     *
     */
    public function calculateTotal()
    {
        if (session()->has('coupon')){
            if (session()->get('coupon')['type'] == 'fixed'){
                $this->discount = session()->get('coupon')['value'];
            }else{
                $this->discount =( (filter_var(Cart::instance('cart')->subtotal(),FILTER_SANITIZE_NUMBER_FLOAT)/100) * session()->get('coupon')['value'] )/ 100 ;
            }
            $this->subTotalAfterDiscount = (filter_var(Cart::instance('cart')->subtotal(),FILTER_SANITIZE_NUMBER_FLOAT)/100) - $this->discount;
            $this->taxAfterDiscount      =  ($this->subTotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount    = $this->subTotalAfterDiscount + $this->taxAfterDiscount;
        }

    }

    public function render()
    {
        if (session()->has('coupon')){
            $this->calculateTotal();
        }
        $this->setAmountForCheckout();
        if (Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
            Cart::instance('saveforlater')->store(Auth::user()->email);
        }
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
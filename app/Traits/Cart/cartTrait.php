<?php

namespace App\Traits\Cart;

use Cart;

trait cartTrait{

    /**
     * enable adding  product to cart
     * @param $product_id
     * @param $product_name
     * @param $product_price
     * @return \Illuminate\Http\RedirectResponse [ cart page ]
     */
    public function addToCart($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','adding item in cart');
        return redirect()->route('product.cart');

    }

    /**
     * increase the quantity of cart when adding products to it
     * refresh the cart to update it's new count
     * @param $rowId
     */
    public function incQty($rowId)
    {
        $product= Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty );
        $this->emitTo('cart-count-component','refreshComponent');
    }
    /**
     * decrease the quantity of cart when remove products from it
     * refresh the cart to update it's new count
     * @param $rowId
     */
    public function decQty($rowId)
    {
        $product= Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        $product = Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');

    }
    /**
     * remove item from cart
     * @param $rowId
     */
    public function removeFromCart($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item removed success');
    }

    /**
     * remove all items (empty) from cart
     */
    public function removeAllCart()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message', 'All Item are removed from the Cart');
    }
}
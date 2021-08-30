<?php

namespace App\Traits\Cart;

use Cart;
trait SaveForLaterTrait{

    /**
     * move product row from cart to saveforlater
     * refresh the count of cart
     * saveforlater is an instance of cart
     * @param $rowId
     */
    public function moveToSaveForLater($rowId){
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveforlater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
    }

    /**
     * delete the product row from saveforlater
     * @param $rowId
     */
    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveforlater')->remove($rowId);
        $this->emitTo('cart-component','refreshComponent');
    }

    /**
     *  move product row from saveforlater to cart
     * refresh the count of cart
     * @param $rowId
     */
    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveforlater')->get($rowId);
        Cart::instance('saveforlater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
    }
}
<?php

namespace App\Traits\Cart;

use Cart;

trait wishListTrait{

    /**
     * enable to add products to wishlist
     * enable to remove products to wishlist
     * @param $product_id
     * @param $product_name
     * @param $product_price
     */
    public function addTo($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-count-component','refreshComponent'); //event to refresh wishlist counter after adding product from list
    }

    /**
     * move product from wishlist to cart and remove it from wishlist
     * @param $rowId
     */
    public function moveTo($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('wish-list-count-component','refreshComponent');
        $this->emitTo('cart-count-component','refreshComponent');
    }

    /**
     * remove product from wishlist
     * @param $product_id
     */
    public function removeFrom($product_id){
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wish-list-count-component','refreshComponent'); //event to refresh wishlist counter after removing product from list
            }
        }
    }

}
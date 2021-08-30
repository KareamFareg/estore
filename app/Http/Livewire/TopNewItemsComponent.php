<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Traits\Cart\cartTrait;
use App\Traits\Cart\wishListTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class TopNewItemsComponent extends Component
{
    use WithPagination;
    use wishListTrait;
    use cartTrait;
    /**
     * @param $product_id
     * @param $product_name
     * @param $product_price
     * @return \Illuminate\Http\RedirectResponse [cart page]
     * enable adding  product to cart
     */
    public function store($product_id,$product_name,$product_price)
    {
        $this->addToCart($product_id,$product_name,$product_price);
    }

    /**
     * @param $product_id
     * @param $product_name
     * @param $product_price
     * enable to add products to wishlist
     */
    public function addToWishList($product_id,$product_name,$product_price)
    {
        $this->addTo($product_id,$product_name,$product_price);
    }

    /**
     * @param $product_id
     * enable to remove products to wishlist
     */
    public function removeFromWishList($product_id)
    {
        $this->removeFrom($product_id);
    }


    public function render()
    {
        $latest_products = Product::orderBy('created_at','DESC')->paginate(12);

        if (Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.top-new-items-component',['products'=>$latest_products])->layout('layouts.base');
    }
}

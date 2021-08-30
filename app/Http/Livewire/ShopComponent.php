<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Traits\Cart\cartTrait;
use App\Traits\Cart\wishListTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
use App\Traits\Product\SortingProducts;

class ShopComponent extends Component
{
    use SortingProducts;
    use wishListTrait;
    use cartTrait;
    //sort shop page throw [count of products per page] or [ newness , price from low to high or high to low]
    public $pagesize;
    public $sorting;

    //sorting products throw ranges of prices [min , max]
    public $min_price;
    public $max_price;

    /**
     * set the default sorting options
     */
    public function mount()
    {
        $this->sorting = 'sort_default';
        $this->pagesize = '12';
        $this->min_price=1;
        $this->max_price=1000;
    }

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



    /**
     * @return mixed
     * sorting products throw range of prices
     * or throw category or creation date [newness]
     */
    public function render()
    {
        $poplar_products = Product::orderBy('ordered_count','DESC')->get()->take(6);
        if ($this->sorting == 'sort_default')
        {
                $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate($this->pagesize);
        } else{
                $products = SortingProducts::sorting($this->sorting)->whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate($this->pagesize);
        }
        $categories=Category::all();
        if (Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories,'poplar_products'=>$poplar_products])->layout('layouts.base');
    }
  }

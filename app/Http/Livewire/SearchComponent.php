<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Traits\Cart\cartTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
use App\Traits\Product\SortingProducts;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use SortingProducts;
    use WithPagination;
    use cartTrait;

    //sorting products throw ranges of prices [min , max]
    public $min_price;
    public $max_price;

    /**
     * @var page size [count of products per page]
     */
    public $pagesize;
    /**
     * @var sorting of products
     */
    public $sorting;
    /**
     * @var search word [product]
     */
    public $search;
    /**
     * @var product category name
     */
    public $product_cat;
    /**
     * @var product category id
     */
    public $product_cat_id;

    /**
     * set default search settings
     */
    public function mount(){
        $this->sorting = 'sort_default';
        $this->pagesize = '12';
        $this->min_price=1;
        $this->max_price=1000;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }

    /**
     * enable adding  product to cart
     * @param $product_id
     * @param $product_name
     * @param $product_price
     * @return \Illuminate\Http\RedirectResponse [ cart page ]
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
     * return results of searched products and sorted it as [salary or category or ...]
     * use sorting trait to sort result of searched products
     * @return mixed

     */
    public function render()
    {
        if ( $this->sorting == 'sort_default'){
            $products=Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->paginate($this->pagesize);
        }else {
            $products = SortingProducts::sorting($this->sorting)->where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->paginate($this->pagesize);
        }
        $poplar_products = Product::orderBy('ordered_count','DESC')->get()->take(6);
        $categories=Category::all();
        if (Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.search-component',['products'=>$products,'categories'=>$categories,'poplar_products'=> $poplar_products])->layout('layouts.base');
    }
}

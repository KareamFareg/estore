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

class CategoryComponent extends Component
{
    use SortingProducts;
    use WithPagination;
    use cartTrait;

    public $category_slug;
//sorting products throw ranges of prices [min , max]
    public $min_price;
    public $max_price;

    /**
     * set default values for sorting products throw category
     * [all categories, num of products to show]
     * sorting throw category
     * @param $category_slug
     */
    public function mount($category_slug){
        $this->category_slug = $category_slug;
        $this->min_price=1;
        $this->max_price=1000;
    }


    /**
     * add product row to cart
     * @param $product_id
     * @param $product_name
     * @param $product_price
     * @return \Illuminate\Http\RedirectResponse
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
     * search and show  products throw their categories
     * return it to view file
     * @return mixed
     */
    public function render()
    {
        $category=Category::where('slug',$this->category_slug)->first();
        $category_id=$category->id;
        $category_name=$category->name;
        $products = Product::where('category_id',$category->id)->whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate(12);
        $poplar_products = Product::orderBy('ordered_count','DESC')->get()->take(6);

        if (Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        $categories=Category::all();
        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'category_name'=>$category_name,'poplar_products'=>$poplar_products])->layout('layouts.base');
    }
}


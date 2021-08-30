<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use App\Traits\Cart\cartTrait;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component

{
    use cartTrait;
    /**
     * @var
     */
    public $slug;

    /**
     * @param $slug
     * set v
     */
    public function mount($slug){
        $this->slug = $slug;
    }

    /**
     * to enable user to add product to cart from [product details page]
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
     * return  chosen product data that will shown in details page
     * return popular products to add another choices to user
     *  return related products that in same category of chosen product to add another choices to user of same category
     * return on sale products that have discount to deadline  to add another choices to user
     * @return mixed [send some data to details interface page]
     *
     */
    public function render()
    {
        $product=Product::where('slug',$this->slug)->first();
        $popular_products= Product::inRandomOrder()->limit(4)->get();  //return any 4 items frm db
        $related_products=Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $sale=Sale::find(1);
        return view('livewire.details-component',['product'=>$product,'popular_products'=>$popular_products,'related_products'=>$related_products , 'sale'=> $sale])->layout('layouts.base');
    }
}

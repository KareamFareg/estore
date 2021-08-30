<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
class HomeComponent extends Component
{
    /**
     * @return mixed
     */
    public function render()
    {
        $sliders = HomeSlider::where('status',0)->get();  //return products that will shown in home sliders
        $home_categories=HomeCategory::find(1);           //return categories [ids] throw HomeCategory table and split it from [sel_category column] amd  shown in home page
        $cat_ids=explode(',',$home_categories->sel_category);
        $categories=Category::whereIn('id',$cat_ids)->get();
        $num_of_products=$home_categories->num_of_products;
        $sale_products = Product::where('sale_price','>',0)->inRandomorder()->get()->take(8);  //on sale products that have discount to deadline
        $latest_products = Product::orderBy('created_at','DESC')->get()->take(8); //return latest created products
        $sale=Sale::find(1); //on sale deadline to show count down in home page inteface

        //check auhantication user to show cart info in home page

        if (Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }
        return view('livewire.home-component',['sliders' => $sliders,'categories'=>$categories,'num_of_products' => $num_of_products, 'sale_products'=> $sale_products,'latest_products'=> $latest_products, 'sale'=> $sale ])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    /**
     * delete product
     * @param $product_id
     */
    public function deleteProduct($product_id){

        $product=Product::find($product_id);
        /**
         * delete product image
         */
        if($product->image){
            unlink('assets/images/products'.'/'.$product->image);
        }
        /**
         * delete product Gallery
         */
        if($product->images){
            $images = explode(",",$product->images);
            foreach ($images as $image){
                $file = 'assets/images/products'.'/'.$image;
                if (is_file($file)){
                    unlink($file);
                }
            }
        }
        $product->delete();
        session()->flash('success_message','You delete product successfully');
    }
    public function render()
    {
       $products = Product::orderBy('created_at','DESC')->paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
}

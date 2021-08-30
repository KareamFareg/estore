<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Traits\Product\generateTrait;
use Livewire\Component;
use Livewire\WithFileUploads;


class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    use generateTrait;
    public $name;
    public $slug;
    public $description;
    public $short_description;
    public $regular_price;
    public $sale_price;
    public $stock_status;
    public $category_id;
    public $quantity;
    public $SKU;
    public $image;
    public $images;


    public function generateslug(){
        $this->slug =$this->geneSlug($this->name);
    }

    /**
     * @param $fields
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($fields){
        $this->validateOnly($fields,[
            'name'                  => 'required|unique:products',
            'slug'                  => 'required|unique:products',
            'description'           => 'required',
            'regular_price'         => 'required|numeric',
            'short_description'     => 'required',
            'stock_status'          => 'required|',
            'quantity'              => 'required|numeric',
            'SKU'                   => 'required',
            'sale_price'            => 'numeric',
            'image'                 => 'required',
            'category_id'           => 'required',
        ]);
    }

    /**
     * add new product to DB
     */
    public function storeProduct(){
        $this->validate([
            'name'                  => 'required|unique:products',
            'slug'                  => 'required|unique:products',
            'description'           => 'required',
            'regular_price'         => 'required|numeric',
            'short_description'     => 'required',
            'stock_status'          => 'required|',
            'quantity'              => 'required|numeric',
            'SKU'                   => 'required',
            'sale_price'            => 'numeric',
            'image'                 => 'required',
            'category_id'           => 'required',
        ]);

        /**
         * create new product
         */

        $product=new Product();
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->description=$this->description;
        $product->short_description=$this->short_description;
        $product->regular_price=$this->regular_price;
        $product->sale_price=$this->sale_price;
        $product->stock_status=$this->stock_status;
        $product->category_id=$this->category_id;
        $product->quantity=$this->quantity;
        $product->SKU=$this->SKU;
        /**
         * save product image
         */
        $product->image=$this->saveImage($this->image,'products');
        /**
         * store product Gallary
         */
        if($this->images) {
            $imagesname = '';
            foreach ($this->images as $key => $image){
                $imagesname = $imagesname . ',' . $this->saveImage($image,'products',$key);
            }
            $product->images=$imagesname;
        }
        $product->save();
        session()->flash('success_message','You Add New Product Successfully');

    }

    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}

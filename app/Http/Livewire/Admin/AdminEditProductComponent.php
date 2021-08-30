<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Traits\Product\generateTrait;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    use generateTrait;
    //product info
    public $name;
    public $slug;
    public $description;
    public $short_description;
    public $regular_price;
    public $sale_price;
    public $stock_status;
    public $quantity;
    public $SKU;
    public $image;
    public $newimage;
    public $images;
    public $newimages;
    public $category_id;
    public $product_id;


    public function mount($product_slug){
       $product = Product::where('slug',$product_slug)->first();
        $this->name=$product->name;
        $this->slug=$product->slug;
        $this->description=$product->description;
        $this->short_description=$product->short_description;
        $this->regular_price=$product->regular_price;
        $this->sale_price=$product->sale_price;
        $this->stock_status=$product->stock_status;
        $this->quantity=$product->quantity;
        $this->SKU=$product->SKU;
        $this->image=$product->image;
        $this->images=explode(',',$product->images);
        $this->category_id=$product->category_id;
        $this->product_id=$product->id;

    }

    /**
     * generate new slug to product
     */
    public function generateslug(){
        $this->slug =$this->geneSlug($this->name);
    }


    public function updated($fields){
        $this->validateOnly($fields,[
            'name'                  => 'required',
            'slug'                  => 'required',
            'description'           => 'required',
            'regular_price'         => 'required|numeric',
            'short_description'     => 'required',
            'stock_status'          => 'required',
            'quantity'              => 'required|numeric',
            'SKU'                   => 'required',
            'sale_price'            => 'numeric',
            'category_id'           => 'required',
        ]);
        if($this->newimage){
            $this->validateOnly($fields,[
                'newimage'  => 'required',
            ]);
        }
    }
    public function updateProduct(){
        $this->validate([
            'name'                  => 'required',
            'slug'                  => 'required',
            'description'           => 'required',
            'regular_price'         => 'required|numeric',
            'short_description'     => 'required',
            'stock_status'          => 'required|',
            'quantity'              => 'required|numeric',
            'SKU'                   => 'required',
            'sale_price'            => 'numeric',
            'category_id'           => 'required',
        ]);
        if($this->newimage){
            $this->validate([
                'newimage'  => 'required',
            ]);
        }

        /**
         * update product fields
         */
        $product = Product::find($this->product_id);
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->description=$this->description;
        $product->short_description=$this->short_description;
        $product->regular_price=$this->regular_price;
        $product->sale_price=$this->sale_price;
        $product->stock_status=$this->stock_status;
        $product->quantity=$this->quantity;
        $product->SKU=$this->SKU;

        /**
         * delete product old image and save new product image
         */
        if($this->newimage){
            unlink('assets/images/products'.'/'.$product->image);
            $product->image=$this->saveImage($this->newimage,'products');;
        }

        /**
         * delete old product Gallery and save new product Gallery
         */
        if($this->newimages){
            if($product->images){
                $images = explode(",",$product->images);
                foreach ($images as $image){
                    if ($image){
                        unlink('assets/images/products'.'/'.$image);
                    }
                }
            }
            /**
             * store new Product Gallery
             */
            $imagesname = '';
            foreach ($this->newimages as $key => $image){
                if($image){
                    $imagesname = $imagesname . ',' . $this->saveImage($image,'products',$key);;
                }
            }
            $product->images=$imagesname;
        }

        $product->category_id=$this->category_id;
        $product->save();
        session()->flash('success_message','you edit product successfully');

    }
    public function render()
    {
         $categories=Category::all();
        return view('livewire.admin.admin-edit-product-component',['categories' => $categories])->layout('layouts.base');
    }
}

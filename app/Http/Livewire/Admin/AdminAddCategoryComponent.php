<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Traits\Product\generateTrait;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{
    use generateTrait;
    public $name;
    public $slug;

    public function generateslug(){
        $this->slug =$this->geneSlug($this->name);
    }

    /**
     * validation input fields
     * @param $fields
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=> 'required|unique:categories',
            'slug'=> 'required|unique:categories',

        ]);
    }

    /**
     * store new category to DB
     */
    public function storeCategory(){
        $this->validate([
            'name'=> 'required|unique:categories',
            'slug'=> 'required|unique:categories',
        ]);
       $category=new Category();
        $category->name=$this->name;
        $category->slug=$this->slug;
        $category->save();
        session()->flash('success_message','created category successfully');

    }
    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}

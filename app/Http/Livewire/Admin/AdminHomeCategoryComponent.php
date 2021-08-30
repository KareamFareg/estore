<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    public $sel_category = [];
    public $num_of_products;

    public function mount(){
       $category= HomeCategory::find(1);
       $this->sel_category=explode(',',$category->sel_category);
       $this->num_of_products=$category->num_of_products;
    }

    public function saveHomeCategories(){
        $category= HomeCategory::find(1);
        $category->sel_category=implode(',',$this->sel_category);
        $category->num_of_products=$this->num_of_products;
        $category->save();
        session()->flash('success_message','saved home categories successfully');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}

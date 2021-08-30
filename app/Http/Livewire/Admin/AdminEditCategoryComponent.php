<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Traits\Product\generateTrait;
use Livewire\Component;

class AdminEditCategoryComponent extends Component
{
    use generateTrait;

    public $category_slug;
    public $category_id;
    public $name;
    public $slug;

    public function mount( $category_slug){
        $this->category_slug = $category_slug;
        $category=Category::where('slug',$category_slug)->first();
        $this->category_id=$category->id;
        $this->name=$category->name;
        $this->slug=$category->slug;

    }
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
     * update category data
     */
    public function updatecategory(){
        $this->validate([
            'name'=> 'required|unique:categories',
            'slug'=> 'required|unique:categories',
        ]);
       $category = Category::find($this->category_id);
       $category->name = $this->name;
       $category->slug=$this->slug;
       $category->save();
       session()->flash('success_editing','you edit category successfully');

    }
    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base');
    }
}

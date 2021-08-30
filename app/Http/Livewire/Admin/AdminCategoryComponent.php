<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    /**
     * delete category
     * @param $id  [category id]
     */
    public function deletecategory($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('delete_success','you deleted category successfully');
    }
    public function render()
    {
        $categories = Category::paginate(3);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}

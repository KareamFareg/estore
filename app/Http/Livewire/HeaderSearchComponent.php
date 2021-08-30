<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    /**
     * @var
     */
    public $search;
    /**
     * @var
     */
    public $category_cat;
    /**
     * @var
     */
    public $category_cat_id;

    public function mount(){
        $this->category_cat='All Category';
        $this->fill(request()->only('search','category_cat','category_cat_id'));
    }
    public function render()
    {
        $categories= Category::all();
        return view('livewire.header-search-component',['categories'=>$categories]);
    }

}

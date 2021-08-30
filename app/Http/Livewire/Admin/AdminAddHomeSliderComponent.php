<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use App\Traits\Product\generateTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    use generateTrait;
    public $title;
    public $subtitle;
    public $link;
    public $price;
    public $status;
    public $image;


    public function mount(){
       $this->status=0;
    }

    /**
     * add home sliders products' details
     */
    public function storehomeslider(){
        //save image
        $file_name = $this->saveImage($this->image,'homesliders');

        //create new homeslider
        $homeslider=new HomeSlider();
        $homeslider->title=$this->title;
        $homeslider->subtitle=$this->subtitle;
        $homeslider->link=$this->link;
        $homeslider->price=$this->price;
        $homeslider->status=$this->status;
        $homeslider->image=$file_name;
        $homeslider->save();
        session()->flash('success_message','created home slider successfully');

    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}

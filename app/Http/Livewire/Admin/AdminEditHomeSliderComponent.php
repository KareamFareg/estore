<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use App\Traits\Product\generateTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    use generateTrait;
    public $slider_id;
    public $title;
    public $subtitle;
    public $link;
    public $price;
    public $status;
    public $image;
    public $newimage;

    /**
     * select slider from DB throw it's id
     * @param $slider_id
     */
    public function mount($slider_id){
         $slider = HomeSlider::where('id',$slider_id)->first();
         $this->title = $slider->title;
         $this->subtitle = $slider->subtitle;
         $this->link = $slider->link;
         $this->price = $slider->price;
         $this->image = $slider->image;
         $this->slider_id=$slider->id;
    }
    /**
     * Edit home sliders products' details
     */
    public function updatehomeslider(){
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title ;
        $slider->subtitle = $this->subtitle ;
        $slider->link = $this->link ;
        $slider->price = $this->price ;
        //save new image
        if($this->newimage){
            $file_name = $this->saveImage($this->image,'homesliders');
            $slider->image=$file_name;
        }
        $slider->save();
        session()->flash('success_message','you edit Home slider successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    /**
     * delete homeslider from DB
     * @param $slider_id
     */
    public function deleteSlider($slider_id){
       $slider = HomeSlider::find($slider_id);
       $slider->delete();
        session()->flash('success_message','you deleted home slider successfully');
    }
    public function render()
    {
       $homesliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',['homesliders'=>$homesliders])->layout('layouts.base');
    }
}

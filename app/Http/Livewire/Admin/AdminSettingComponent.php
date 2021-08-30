<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminSettingComponent extends Component
{
    //admin team social contacts and information
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $twitter;
    public $facebook;
    public $pinterest;
    public $youtube;
    public $instagram;

    public function mount(){
        $setting= Setting::find(1);
        if($setting){
            $this->email    = $setting->email;
            $this->phone    = $setting->phone;
            $this->phone2   = $setting->phone2;
            $this->address  = $setting->address;
            $this->map      = $setting->map;
            $this->twitter  = $setting->twitter;
            $this->facebook = $setting->facebook;
            $this->pinterest = $setting->pinterest;
            $this->youtube   = $setting->youtube;
            $this->instagram = $setting->instagram;
        }
    }

    /**
     * validation input fields
     * @param $fields
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($fields){
        $this->validateOnly($fields,[
            'email'=>'required|email',
            'phone'=>'required',
            'phone2'=>'required',
            'address'=>'required',
            'map'=>'required',
            'twitter'=>'required',
            'pinterest'=>'required',
            'youtube'=>'required',
            'instagram'=>'required',
        ]);
    }

    /**
     * add contacts information and social links to users
     */
    public function saveSettings(){
        $this->validate([
            'email'=>'required|email',
            'phone'=>'required',
            'phone2'=>'required',
            'address'=>'required',
            'map'=>'required',
            'twitter'=>'required',
            'pinterest'=>'required',
            'youtube'=>'required',
            'instagram'=>'required',
        ]);
        /**
         * check if there is setting stored or not to create new one
         */
        $setting= Setting::find(1);
        if(!$setting){
            $setting = new Setting();
        }
        /**
         * update setting or create new
         */
        $setting->email     = $this->email;
        $setting->phone     = $this->phone;
        $setting->phone2    = $this->phone2;
        $setting->address   = $this->address;
        $setting->map       = $this->map;
        $setting->twitter   = $this->twitter;
        $setting->facebook  = $this->facebook;
        $setting->pinterest = $this->pinterest;
        $setting->youtube   = $this->youtube ;
        $setting->instagram = $this->instagram;
        $setting->save();
        session()->flash('settings','You saved settings successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}

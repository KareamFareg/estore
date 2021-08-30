<?php

namespace App\Http\Livewire;

use App\Traits\Product\generateTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
    use WithFileUploads;
    use generateTrait;

    public $name;
    public $age;
    public $address;
    public $country;
    public $gender;
    public $phone;
    public $profile_photo_path;
    public $new_profile_photo;

    public function mount(){
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->age = $user->age;
        $this->address = $user->address;
        $this->country = $user->country;
        $this->gender = $user->gender;
        $this->phone = $user->phone;
        $this->profile_photo_path = $user->profile_photo_path;
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'phone' => 'required|min:11',
            'address'=>'required',
            'country'=>'required',
            'age'=>'required',
            'gender'=>'required|boolean',
        ]);
        if($this->new_profile_photo){
            $this->validateOnly($fields,[
                'new_profile_photo'  => 'required',
            ]);
        }
    }
    public function updateProfile(){
        $this->validate([
            'name' => 'required',
            'phone' => 'required|min:11',
            'address'=>'required',
            'country'=>'required',
            'age'=>'required',
            'gender'=>'required|boolean',
        ]);
        if($this->new_profile_photo){
            $this->validate([
                'new_profile_photo'  => 'required',
            ]);
        }
        $user = User::find(Auth::user()->id);
        $user->name    = $this->name;
        $user->age     = $this->age ;
        $user->address = $this->address;
        $user->country = $this->country ;
        $user->gender  = $this->gender;
        $user->phone   =  $this->phone;

        /**
         * delete product old image and save new product image
         */
        if($this->new_profile_photo){
            if($this->profile_photo_path){
                unlink('assets/images/users'.'/'.$this->profile_photo_path);
            }
            $user->profile_photo_path = $this->saveImage($this->new_profile_photo,'users');;
        }

        $user->save();
        session()->flash('edited_profile','You Edit Your Profile Successfully');
    }
    public function render()
    {
        $user = User::find(Auth::user()->id);
        return view('livewire.user-edit-profile-component' ,['user'=>$user])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserChangePasswordComponent extends Component
{
    /**
     * old password
     * @var $current_password
     */
    public $current_password;
    /**
     * new password
     * @var $password
     */
    public $password;
    /**
     *  copy of $password
     * @var $password_confirmation
     */
    public $password_confirmation;

    /**
     *  validation input fields
     * @param $fields
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($fields){
        $this->validateOnly($fields,[
            'current_password' =>'required',
            'password' =>'required|min:8|confirmed|different:current_password',
        ]);
    }

    /**
     * change password delete old pass and create new one
     */
    public function changePassword(){
        $this->validate([
            'current_password' =>'required',
            'password' =>'required|min:8|confirmed|different:current_password',
        ]);
        if(Hash::check($this->current_password,Auth::user()->password)){ //check if user type his password true or not
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password); //encrypt user new password
            $user->save();
            session()->flash('change-pass' , 'You change password successfully');
        }else{
            session()->flash('change-error' , 'Password dose not Match !');
        }

    }

    public function render()
    {
        return view('livewire.user.user-change-password-component')->layout('layouts.base');
    }
}

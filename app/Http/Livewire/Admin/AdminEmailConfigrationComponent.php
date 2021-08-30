<?php

namespace App\Http\Livewire\Admin;

use App\Models\EmailConfiguration;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminEmailConfigrationComponent extends Component
{
    public $driver;
    public $host;
    public $port;
    public $encryption;
    public $user_name;
    public $password;
    public $sender_name;
    public $sender_email;

    public function mount(){
        $emailConfig = EmailConfiguration::find(1);
        $this->user_id = $emailConfig->user_id;
        $this->driver = $emailConfig->driver;
        $this->host = $emailConfig->host;
        $this->port = $emailConfig->port;
        $this->encryption = $emailConfig->encryption;
        $this->user_name = $emailConfig->user_name;
        $this->password = $emailConfig->password;
        $this->sender_name = $emailConfig->sender_name;
        $this->sender_email = $emailConfig->sender_email;
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            "driver"      =>'required',
            "host"        =>'required',
            "port"        =>'required|numeric',
            "encryption"  =>'required',
            "user_name"   =>'required',
            "password"    =>'required|min:8',
            "sender_name" =>'required',
            "sender_email"=>'required|email',
        ]);
    }
    public function storeEmailConfig(){
        $this->validate([
            "driver"      =>'required',
            "host"        =>'required',
            "port"        =>'required|numeric',
            "encryption"  =>'required',
            "user_name"   =>'required',
            "password"    =>'required|min:8',
            "sender_name" =>'required',
            "sender_email"=>'required|email',
        ]);

        $emailConfig = EmailConfiguration::find(1);
        $emailConfig->user_id = Auth::user()->id;
        $emailConfig->driver  = $this->driver;
        $emailConfig->host = $this->host;
        $emailConfig->port = $this->port;
        $emailConfig->encryption = $this->encryption;
        $emailConfig->user_name = $this->user_name;
        $emailConfig->password = $this->password;
        $emailConfig->sender_name =$this->sender_name;
        $emailConfig->sender_email = $this->sender_email;

        $emailConfig->save();


        session()->flash('success_message','You Create Email Configration Successfull');

    }

    public function render()
    {
        return view('livewire.admin.admin-email-configration-component')->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\Setting;
use Livewire\Component;

class ContactComponent extends Component
{
    /**
     * name of user that will contact with us
     * @var strng $name
     */
    public $name;
    /**
     * @var email $email
     */
    public $email;
    /**
     * @var number $phone
     */
    public $phone;
    /**
     * @var text $comment
     * massage content
     */
    public $comment;

    /**
     * validate input fields
     * @param $feilds
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($feilds){
        $this->validateOnly($feilds,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'comment'=>'required'
        ]);
    }

    /**
     * function saveMessage to send message to admin
     * save message in DB and admin can show it
     */
    public function saveMessage(){
        $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'comment'=>'required'
        ]);
        $message = new Contact();
        $message->name = $this->name;
        $message->email = $this->email;
        $message->phone = $this->phone;
        $message->comment = $this->comment;
        $message->save();
        session()->flash('save_message','Message Sent Successfully');
    }

    /**
     * enable users to contact with admins' team
     * @return mixed informations and phones and social contacts
     *
     */
    public function render()
    {
        $setting = Setting::find(1); //show contacts of admins that users can use to contact with them
        return view('livewire.contact-component' , ['setting' => $setting])->layout('layouts.base');
    }
}

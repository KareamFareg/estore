<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class AdminContactComponent extends Component
{
    /**
     * display all contacts messages
     * @return mixed
     */
    public function render()
    {
        $contacts= Contact::orderBy('created_at','DESC')->paginate(10);
        return view('livewire.admin.admin-contact-component',['contacts' => $contacts])->layout('layouts.base');
    }
}

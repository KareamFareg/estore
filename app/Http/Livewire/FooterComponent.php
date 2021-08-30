<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class FooterComponent extends Component
{
    /**
     * return admins team contacts information and social accounts to show it in footer
     */
    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.footer-component',['setting' => $setting]);
    }
}

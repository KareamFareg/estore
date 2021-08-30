<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component
{
    public $sale_date;
    public $status;

    /**
     * select sale data from DB throw it's id
     */
    public function mount(){
        $sale = Sale::find(1);
        $this->sale_date=$sale->sale_date;
        $this->status=$sale->status;
    }

    /**
     * update on sale section
     */
    public function updateSale(){
        $sale = Sale::find(1);
        $sale->sale_date=$this->sale_date;
        $sale->status=$this->status;
        $sale->save();
        session()->flash('success_message','you saved sale successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('layouts.base');
    }
}

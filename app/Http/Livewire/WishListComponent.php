<?php

namespace App\Http\Livewire;
use App\Traits\Cart\wishListTrait;
use Cart;
use Livewire\Component;

class WishListComponent extends Component
{
    use wishListTrait;
    public function removeFromWishList($product_id){
        $this->removeFrom($product_id);
    }
    public function moveFromWishList($rowId){
        $this->moveTo($rowId);
    }
    public function render()
    {
        return view('livewire.wish-list-component')->layout('layouts.base');
    }
}

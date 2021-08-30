<?php

namespace App\Http\Livewire\User;

use App\Models\OrderItem;
use App\Models\Review;
use Livewire\Component;

class UserReviewComponent extends Component
{
    /**
     * reviewed item
     * @var
     */
    public $order_item_id;
    /**
     * rating order from 5 star
     * @var
     */
    public $rating;
    /**
     * review comment
     * @var
     */
    public $comment;

    public function mount($order_item_id){
        $this->order_item_id = $order_item_id ;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'rating'=>'required',
            'comment'=>'required'
        ]);
    }

    /**
     * add review to order item
     * it will be shown in product details page
     * publish this review and other user can see it
     */
    public function addReview(){
        $this->validate([
            'rating'=>'required',
            'comment'=>'required'
        ]);
        $review = new Review();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->order_item_id = $this->order_item_id;
        $orderItem = OrderItem::find($this->order_item_id);
        $orderItem->rstatus = true;
        $review->save();
        $orderItem->save();
        session()->flash('review','You add Review Successfully');
    }
    public function render()
    {
        $orderItem = OrderItem::find($this->order_item_id);
        return view('livewire.user.user-review-component' ,['orderItem'=>$orderItem] )->layout('layouts.base');
    }
}

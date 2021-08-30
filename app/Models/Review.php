<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = "reviews";
    //RELATIONS
    public function OrderItem(){
        return $this->belongsTo(OrderItem::class,'order_item_id');
    }
}

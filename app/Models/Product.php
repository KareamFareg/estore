<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';


    ////relation with category

    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function orderItems(){
        return $this->hasMany(OrderItem::class,'product_id');
    }

}

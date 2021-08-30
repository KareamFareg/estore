<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'categories';
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];
    /**
     * @var array
     */
    protected $hidden=[];
    /**
     * @var bool
     */
    public $timestamps=false;

    public function product(){
        return $this->hasMany(Product::class,'category_id');
    }
}

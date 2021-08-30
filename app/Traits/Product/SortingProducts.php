<?php

namespace App\Traits\Product;

use App\Models\Product;

trait SortingProducts
{
    /**
     * @return mixed
     */
  public static  function sort_Date( ){
      return Product::orderBy('created_at','DESC');
  }

    /**
     * @return mixed
     */
  public static function sort_price_asc(){
     return Product::orderBy('regular_price','ASC');
  }

    /**
     * @return mixed
     */
  public static function sort_price_desc (){
      return Product::orderBy('regular_price','DESC');

  }

    /**
     * @param $sorting
     * @return mixed
     */

  public static function sorting($sorting){

          return static::$sorting();

  }
}
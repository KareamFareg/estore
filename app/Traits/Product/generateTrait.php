<?php
namespace App\Traits\Product;

use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\String_;

trait  generateTrait{

    /**
     * save image
     * @param $photo
     * @param $folder
     * @return string
     */
    public function saveImage($image,$folder,$key=''){
        $file_extension=$image->extension();
        $file_name=time().$key.'.'.$file_extension;
        $image->storeAs($folder,$file_name);
        return $file_name;
    }
    public function geneSlug($name){
        return Str::slug($name,'-');
    }
}

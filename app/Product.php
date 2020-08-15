<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    function bills(){
        return $this->belongsToMany(Bill::class,'details','product_id','bill_id');
    }

}

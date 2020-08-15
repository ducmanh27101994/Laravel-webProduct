<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = 'bills';

    function customer(){
        return $this->belongsTo(Customer::class);
    }

    function products(){
        return $this->belongsToMany(Product::class,'details','bill_id','product_id');
    }
}

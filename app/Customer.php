<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';

    function bills(){
        return $this->hasMany(Bill::class,'customer_id');
    }
}

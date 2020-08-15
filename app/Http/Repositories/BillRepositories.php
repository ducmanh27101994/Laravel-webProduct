<?php


namespace App\Http\Repositories;


use App\Bill;

class BillRepositories
{
    protected $bill;

    function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    function getAll(){
        return $this->bill->select('*')->orderBy('id','desc')->get();
    }

    function save($bill){
        $bill->save();
    }

    function findById($id){
        return $this->bill->findOrFail($id);
    }



}

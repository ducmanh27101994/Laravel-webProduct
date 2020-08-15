<?php


namespace App\Http\Repositories;


use App\Customer;

class CustomerRepositories
{
    protected $customer;

    function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    function getAll(){
        return $this->customer->select('*')->orderBy('id','desc')->get();
    }

    function save($customer){
        $customer->save();
    }

    function findById($id){
        return $this->customer->findOrFail($id);
    }

}

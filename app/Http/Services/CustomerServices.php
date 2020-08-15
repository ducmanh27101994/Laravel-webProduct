<?php


namespace App\Http\Services;


use App\Customer;
use App\Http\Repositories\CustomerRepositories;
use Illuminate\Http\Request;

class CustomerServices
{
    protected $customerRepo;

    function __construct(CustomerRepositories $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    function getAll(){
        return $this->customerRepo->getAll();
    }

    function store(Request $request){
        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;

        $this->customerRepo->save($customer);
    }

    function edit($id){
        return $this->customerRepo->findById($id);
    }

    function update(Request $request,$id){
        $customer = $this->customerRepo->findById($id);

        $customer->customer_name = $request->customer_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;

        $this->customerRepo->save($customer);
    }
}

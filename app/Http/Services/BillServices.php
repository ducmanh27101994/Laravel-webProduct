<?php


namespace App\Http\Services;


use App\Bill;
use App\Http\Repositories\BillRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillServices
{
    protected $billRepo;

    function __construct(BillRepositories $billRepo)
    {
        $this->billRepo = $billRepo;
    }

    function getAll(){
        return $this->billRepo->getAll();
    }

    function edit($id){
        return $this->billRepo->findById($id);
    }

    function store(Request $request,$id){
        $bill = $this->billRepo->findById($id);
        $bill->status = $request->status;

        $this->billRepo->save($bill);
    }

    function showDetailById($id){
      return DB::table('customers')
            ->join('bills','customers.id','bills.customer_id')
            ->join('details','bills.id','details.bill_id')
            ->join('products','details.product_id','products.id')
            ->select('customers.*','bills.*','details.*','products.*')
            ->where('bills.id','=',"$id")
            ->get();

    }

    function update(Request $request,$id){
        $bill = $this->billRepo->findById($id);
        $bill->status = $request->status;

        $this->billRepo->save($bill);
    }



}

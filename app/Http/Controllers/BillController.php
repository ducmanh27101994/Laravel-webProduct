<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Detail;
use App\Http\Services\BillServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    //
    protected $billServices;


    function __construct(BillServices $billServices)
    {
        $this->billServices = $billServices;
    }

    function index(){
        $bills = $this->billServices->getAll();
        return view('details.showDetail',compact('bills'));
    }

    function edit($id){
        $bill = $this->billServices->edit($id);
//        $details = DB::table('details')->select('*')->where('bill_id','=',$id)->get();
        $details = $this->billServices->showDetailById($id);

        return view('details.OrderId',compact('bill','details'));
    }

    function update(Request $request, $id){
        $this->billServices->update($request,$id);
        return redirect()->route('details.index');

    }

    function searchBill(Request $request){
        $keyword = $request->keyword;
        if ($keyword != 'all') {
            $bills = Bill::select('*')->where('status', '=', "$keyword")->orderBy('id','desc')->get();

            return view('details.showDetail', compact('bills'));
        } else {
            $bills = $this->billServices->getAll();
            return view('details.showDetail',compact('bills'));
        }

    }

}

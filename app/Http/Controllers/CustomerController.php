<?php

namespace App\Http\Controllers;

use App\Http\Services\CustomerServices;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    protected $customerServices;

    function __construct(CustomerServices $customerServices)
    {
        $this->customerServices = $customerServices;
    }

    function index(){
      return $this->customerServices->getAll();
    }


}

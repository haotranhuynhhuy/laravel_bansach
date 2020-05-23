<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Bill;
class CustomerController extends Controller
{
    public function getList()
    {
        $bills = Bill::all()->count();
        $customer = Customer::all();
        return view('admin.customer',compact('customer','bills'));
    }
}

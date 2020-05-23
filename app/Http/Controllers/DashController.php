<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Customer;
use App\Sach;
class DashController extends Controller
{
    public function getDash()
    {
        $bills = Bill::all();
        $orders = $bills->count();
        $customers = Customer::all()->count();
        $tongsach = Sach::all()->count();
        $total = 0;
        foreach($bills as $bill)
        {
            $total+= $bill->total;
        }
        return view('admin.dashboard',compact('orders','customers','tongsach','total'));
    }
}
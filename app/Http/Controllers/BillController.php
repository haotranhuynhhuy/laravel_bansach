<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use App\Sach;
use App\Customer;
use Illuminate\Support\Facades\DB;
class BillController extends Controller
{
    public function getList()
    {
        $customer = DB::table('customer')
                         ->join('bill','customer.id','=','bill.id_customer')
                         ->select('customer.*','bill.id as id_bill','bill.total as bill_total','bill.note as bill_note','bill.status as bill_status','bill.payment as payment')
                         ->get();
        return view('admin.list_bills',compact('customer'));
    }
    public function getEdit($id)
    {
        $bills = Bill::find($id);
        return view('admin.edit_bills',compact('bills'));
    }
    public function getDelete($id)
    {
        $bills = Bill::find($id);
        $bills->delete();
        return redirect('admin/bill/list')->with('thongbao','Xóa đơn hàng thành công');
    }

    public function getDetail($id)
    {
       $customerInfo = DB::table('customer')
                       ->join('bill','customer.id','=','bill.id_customer')
                       ->select('customer.*','bill.id as id_bill','bill.total as bill_total','bill.note as bill_note','bill.status as bill_status','bill.payment as payment')
                       ->where('customer.id','=',$id)
                       ->first();
        
       $billInfo = DB::table('bill')
                       ->join('billsdetail','bill.id','=','billsdetail.id_bill')
                       ->leftjoin('sach','billsdetail.id_product','=','sach.id')
                       ->where('bill.id_customer','=',$id)
                       ->select('bill.*','billsdetail.*','sach.name as tensach','sach.unit_price as gia','sach.promotion_price as km')
                       ->get();
       return view('admin.bill_detail',compact('customerInfo','billInfo'));
    }

    public function getUpdate(Request $request, $id)
    {
       $bill = Bill::find($id);
       $bill->status = $request->status;
       $bill->save();
       return redirect('admin/bill/detail/'.$id)->with('thongbao','Xử lý đơn hàng thành công');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSach;
class LoaiSachController extends Controller
{
    public function getList()
    {
        $loaisach = LoaiSach::all();
        return view('admin.list_typebook',compact('loaisach'));
    }

    public function getAdd()
    {
        return view('admin.add_typebook');
    }

    public function postAdd(Request $request)
    {
        $loaisach = new LoaiSach;
        $loaisach->name = $request->tenloaisach;
        $loaisach->description = $request->mota;
        $loaisach->save();
        return redirect('admin/loaisach/add')->with('thongbao','Bạn đã thêm thành công');
    }

    public function getDelete($id)
    {
        $loaisach = LoaiSach::find($id);
        $loaisach->delete();
        return redirect('admin/loaisach/list')->with('thongbao','Bạn đã xóa thành công');
    }
}

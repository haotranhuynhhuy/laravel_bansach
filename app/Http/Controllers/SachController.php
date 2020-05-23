<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSach;
use App\Sach;
class SachController extends Controller
{
    public function getList()
    {
        $listsach = Sach::all();
        return view('admin.list_books',compact('listsach'));
    }
    public function getAdd()
    {
        $loaisach = LoaiSach::all();
        return view('admin.add_book',compact('loaisach'));
    }

    public function postAdd(Request $request)
    {
        $sach = new Sach;
        $sach->name = $request->tensach;
        $sach->id_type = $request->loai;
        $sach->description = $request->mota;
        $sach->unit_price = $request->gia;
        $sach->promotion_price = $request->km;
        $sach->unit = $request->donvi;
        $sach->spmoi = $request->spmoi;
        if($request->hasFile('hinh'))
        {
            $file = $request->file('hinh');
            $filename = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi == 'jpg' || $duoi == 'png' || $duoi == 'jpeg')
            {
                $file->move('upload/sach',$filename);
            }else
            {
                return redirect('admin/sach/add')->with('error','Bạn chỉ được tải lên file ảnh');
            }
        }else
        {
            return redirect('admin/sach/add')->with('error','Bạn chưa thêm file ảnh');
        }
        $sach->image = $filename;
        $sach->save();
        return redirect('admin/sach/add')->with('thongbao','Bạn đã thêm sách thành công');
    }

    public function getEdit($id)
    {
        $suasach = Sach::find($id);
        $loaisach = LoaiSach::all();
        return view('admin.edit_book',compact('suasach','loaisach'));
    }

    public function postEdit(Request $request, $id)
    {
        $sach = Sach::find($id);
        $sach->name = $request->tensach;
        $sach->id_type = $request->loai;
        $sach->description = $request->mota;
        $sach->unit_price = $request->gia;
        $sach->promotion_price = $request->km;
        $sach->unit = $request->donvi;
        $sach->spmoi = $request->spmoi;
        if($request->hasFile('hinh'))
        {
            $file = $request->file('hinh');
            $filename = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension();
            if($duoi == 'jpg' || $duoi == 'png')
            {
                $file->move('upload/sach',$filename);
            }else
            {
                return redirect('admin/sach/edit')->with('thongbao','Bạn chỉ được tải lên file ảnh');
            }
        }else
        {
            return redirect('admin/sach/edit')->with('thongbao','Bạn chưa thêm file ảnh');
        }
        $sach->image = $filename;
        $sach->save();
        return redirect('admin/sach/edit/'.$id)->with('thongbao','Bạn đã sửa thông tin sách thành công');
    }
    public function getDelete($id)
    {
        $sach = Sach::find($id);
        $sach->delete();
        return redirect('admin/sach/list')->with('thongbao','Bạn đã xóa thành công');
    }
}
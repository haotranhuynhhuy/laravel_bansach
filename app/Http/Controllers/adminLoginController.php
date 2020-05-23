<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class adminLoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,
        [
           'email' => 'required',
           'password' => 'required'
        ],
        [
           'email.required' => 'Bạn chưa nhập địa chỉ email',
           'password.required' => 'Bạn chưa nhập mật khẩu'
        ]);
        $email = $request->email;   
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
             
             return redirect('admin/dashboard');
        }
        else{
            return redirect('/login')->with('thongbao','Mật khẩu hoặc email không đúng');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function getChangePass()
    {
        return view('admin.changepass');
    }

    public function postChangePass(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request,
        [
           'newPass' => 'required|min:8|max:20',
           'newPassAgain' => 'required|same:newPass'
        ],
        [
           'newPass.required' => 'Bạn chưa nhập mật khẩu mới',
           'newPass.min' => 'Mật khẩu phải từ 8 đến 20 ký tự',
           'newPass.max' => 'Mật khẩu phải từ 8 đến 20 ký tự',
           'newPassAgain.required' => 'Bạn chưa nhập lại mật khẩu mới',
           'newPassAgain.same' => 'Mật khẩu mới không khớp'
        ]);      
       $user->password = bcrypt($request->newPass);
       $user->save();
       return redirect('admin/change/'.$id)->with('thongbao','Đổi mật khẩu thành công');
    }


    public function getSetting($id)
    {
        $user = User::find($id);
        return view('admin.setting',compact('user'));
    }
}
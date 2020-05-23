<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sach;
use App\LoaiSach;
use Session;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    public function __construct()
    {
        
    }
    public function getLogin()
    {
        return view('pages.login');
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
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('/')->with('thongbao','Đăng nhập thành công');
        }else{
            return redirect('login')->with('fail','Mật khẩu hoặc email không đúng');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getList()
    {
        $sachmoi = Sach::where('spmoi','1')->get();
        $allsach = Sach::orderBy('id','desc')->paginate(10); 
        $loaisach = LoaiSach::all();
        return view('pages.trangchu',['allsach'=>$allsach, 'sachmoi'=>$sachmoi,'loaisach'=>$loaisach]);
    }
    public function getSignup()
    {
        return view('pages.signup');
    }

    public function postSignup(Request $request)
    {
        $user = new User;   
        $this->validate($request,
        [
           'name' => 'required|max:20',
           'email' => 'required|email',
           'password' => 'required|min:5|max:20',
           'passwordAgain' => 'required|same:password',
           'phone' => 'required|min:10',
           'address' => 'required',
        ],
        [
           'name.required' => 'Bạn chưa nhập họ tên',
           'name.max' => 'Họ tên phải ít nhất 10 ký tự',
           'email.required' => 'Bạn chưa nhập địa chỉ email',
           'email.email' => 'Bạn nhập không đúng định dạng email',
           'password.required' => 'Bạn chưa nhập mật khẩu',
           'password.min' => 'Mật khẩu phải từ 5 đến 20 ký tự',
           'password.max' => 'Mật khẩu phải từ 5 đến 20 ký tự',
           'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
           'passwordAgain.same' => 'Nhập lại mật khẩu không khớp',
           'phone.required' => 'Bạn chưa nhập số điện thoại',
           'phone.min' => 'Số điện thoại phải ít nhất 10 số ',
           'address.required' => 'Bạn chưa nhập địa chỉ'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('thongbao','Đăng ký thành công');
    }

    public function getLoaiSach($id)
    {
        $loaisach = LoaiSach::find($id);
        $sach = Sach::where('id_type',$id)->get(); 
        return view('pages.loaisach',['sachtheoloai'=>$sach,'loaisach'=>$loaisach]);
    }

    public function getChangePass()
    {
        return view('pages.changepass');
    }

    public function postChangePass(Request $request,$id)
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
        return redirect()->back()->with('thongbao','Đổi mật khẩu thành công');
        
    }

    public function getDetail($id)
    {
        $chitiet = Sach::find($id);
        $gia = $chitiet->unit_price;
        $km = $chitiet->promotion_price;
        $tietkiem = (int)$gia-(int)$km;
        $splq = Sach::where('id_type',$chitiet->id_type)->get();
        return view('pages.chitiet_sanpham',['chitiet'=>$chitiet,'tietkiem'=>$tietkiem,'splq'=>$splq]);
    }
    public function getCart()
    {
        return view('pages.giohang');
    }

    public function getAddtoCart(Request $request, $id)
    {
        $sach = Sach::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($sach,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back()->with('thongbao','Thêm vào giỏ hàng thành công');
    }
    public function getDeleteItemsCart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

   public function getReduce($id)
   {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart',$cart);
        return redirect()->back();
   }

    public function postCheckout(Request $request)
    {
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender = $request->gt;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment;
        $bill->note = $request->notes;
        $bill->status = $request->status;
        $bill->save();

        foreach($cart->items as $key => $value)
        {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            if($value['promo'])
            {
                $bill_detail->unit_price = $value['promo']/$value['qty'];
            }
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect('/')->with('thongbao','Đặt hàng thành công');
        
    }
    public function getThongTin($id)
    {
        $user = User::find($id);
        return view('pages.thongtin',compact('user'));
    }

    public function getSearch(Request $request)
    {
        $sach = Sach::where('name','like','%'.$request->key.'%')
                     ->orWhere('unit_price',$request->key)
                     ->get();
        return view('pages.search',compact('sach'));
    }

}
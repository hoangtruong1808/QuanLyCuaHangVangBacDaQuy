<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class LoginController extends Controller
{
    public function Login()
    {    
        return view('login');
    }
    public function LoginProcess(Request $request)
    {    

        $taikhoan = $request->taikhoan;
        $password = $request->password;
        if (DB::table('tbl_nhanvien')->where('TaiKhoan', $taikhoan)->where('MatKhau', $password)->exists())
        {
            $user = DB::table('tbl_nhanvien')->where('TaiKhoan', $taikhoan)->first();
            Session::put('id', $user->ID);
            Session::put('chucvu', $user->ChucVu);
            Session::flash('message', 'Sai mật khẩu!');
            return redirect()->route('home');
        }
        else {
            Session::flash('message', 'Sai mật khẩu!');
            return redirect()->route('DangNhap');
        }
    }
    public function Logout()
    {
        Session::put('id', NULL);
        Session::put('chucvu', NULL);
        return redirect()->route('DangNhap');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVienModel;
use Session;
use DB;

class NhanVienController extends Controller
{
    public function LuuNhanVien(Request $request)
    {
        $anhdaidien = $request->file('anhdaidien')->getClientOriginalName();
        $request->file('anhdaidien')->storeAs('public/nhanvien', $anhdaidien);
        $data = $request->all();
        $nhanvien = new NhanVienModel();
        $nhanvien['HoTen'] = $data['hoten'];
        $nhanvien['TaiKhoan'] = $data['taikhoan'];
        $nhanvien['MatKhau'] = bcrypt($data['matkhau']);
        $nhanvien['CMND'] = $data['CMND'];
        $nhanvien['ChucVu'] = $data['chucvu'];
        $nhanvien['DiaChi'] = $data['diachi'];
        $nhanvien['DienThoai'] = $data['dienthoai'];
        $nhanvien['AnhDaiDien'] = $anhdaidien;
        $nhanvien->save();
        Session::flash('message','Thêm nhân viên thành công!');
        //return redirect()->route('DanhSachNhanVien');
    }
    public function DanhSachNhanVien()
    {
        $nhanvien = DB::table('tbl_nhanvien')->get();
        return view('quanlynhanvien.danhsachnhanvien')
            ->with([
                'nhanvien'=>$nhanvien,
            ]);
    }
}

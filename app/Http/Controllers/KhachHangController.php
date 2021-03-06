<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class KhachHangController extends Controller
{
    public function LuuKhachHang(Request $request)
    {
        $anhdaidien = $request->file('anhdaidien')->getClientOriginalName();
        $request->file('anhdaidien')->storeAs('public/khachhang', $anhdaidien);
        DB::table('tbl_khachhang')->insert([
            'HoTen'=>$request->hoten,
            'CMND'=>$request->CMND,
            'NgaySinh'=>$request->ngaysinh,
            'GioiTinh'=>$request->gioitinh,
            'DiaChi'=>$request->diachi,
            'DienThoai'=>$request->dienthoai,
            'AnhDaiDien'=>$anhdaidien,
            'GhiChu'=>$request->ghichu,
        ]);
        Session::flash('message','Thêm khách hàng thành công!');
        return redirect()->route('DanhSachKhachHang');
    }
    public function DanhSachKhachHang()
    {
        $khachhang = DB::table('tbl_khachhang')->get();
        return view('quanlykhachhang.danhsachkhachhang')
            ->with([
                'khachhang'=>$khachhang,
            ]);
    }
    public function TimKiemKhachHang(Request $request)
    {
        $khachhang = DB::table('tbl_khachhang')
                    ->where('HoTen', 'like', '%' . $request->key . '%')
                    ->orWhere('DiaChi', 'like', '%' . $request->key . '%')
                    ->orWhere('CMND', 'like', '%' . $request->key . '%')
                    ->orWhere('DienThoai', 'like', '%' . $request->key . '%')
                    ->get();

        return view('quanlykhachhang.danhsachkhachhang')
            ->with([
                'khachhang'=>$khachhang,
            ]); 
    }
    public function XoaKhachHang($id)
    {
        DB::table('tbl_khachhang')
                ->where('ID', $id)
                ->delete();
        Session::flash('message','Xóa khách hàng thành công!');
    }
    public function SuaKhachHang($id)
    {
        $khachhang = DB::table('tbl_khachhang')
                ->where('ID', $id)
                ->first();
        return view('quanlykhachhang.suakhachhang')
            ->with([
                'khachhang'=>$khachhang,
            ]);
    }
    public function CapNhatKhachHang(Request $request, $id)
    {
        $khachhang = DB::table('tbl_khachhang')
                    ->where('ID', $id)
                    ->first();
        
        if ($request->file('anhdaidien'))
        {
            $anhdaidien = $request->file('anhdaidien')->getClientOriginalName();
            $request->file('anhdaidien')->storeAs('public/khachhang', $anhdaidien);
        }
        else {
            $anhdaidien =  $khachhang->AnhDaiDien;
        }

        DB::table('tbl_khachhang')
        ->where('ID', $id)
        ->update([
            'HoTen'=>$request->hoten,
            'CMND'=>$request->CMND,
            'NgaySinh'=>$request->ngaysinh,
            'GioiTinh'=>$request->gioitinh,
            'DiaChi'=>$request->diachi,
            'DienThoai'=>$request->dienthoai,
            'AnhDaiDien'=>$anhdaidien,
            'GhiChu'=>$request->ghichu,
        ]);
        Session::flash('message','Cập nhật thông tin khách hàng thành công!');
        return redirect()->route('DanhSachKhachHang');
    }
    public function ChiTietKhachHang($id)
    {
        $khachhang = DB::table('tbl_khachhang')
        ->where('ID', $id)
        ->first();
        $sanphammua = DB::table('tbl_chitietphieumuahang')
        ->join('tbl_phieumuahang', 'tbl_chitietphieumuahang.PhieuMuaHangID', '=', 'tbl_phieumuahang.ID')
        ->join('tbl_danhmucsanpham', 'tbl_chitietphieumuahang.SanPhamID', '=', 'tbl_danhmucsanpham.ID')
        ->where('tbl_phieumuahang.KhachHangID', $id)
        ->select('tbl_chitietphieumuahang.*', 'tbl_phieumuahang.NgayLapPhieu', 'tbl_danhmucsanpham.ten as LoaiSanPham')
        ->get();
        $sanphamban = DB::table('tbl_chitietphieubanhang')
        ->join('tbl_phieubamhang', 'tbl_chitietphieubanhang.PhieuBanHangID', '=', 'tbl_phieubamhang.ID')
        ->where('tbl_phieubamhang.KhachHangID', $id)
        ->select('tbl_chitietphieubanhang.*', 'tbl_phieubamhang.NgayLapPhieu')
        ->get();
        return view('quanlykhachhang.chitietkhachhang')
            ->with([
                'data'=>$khachhang,
                'sanphamban'=>$sanphamban,
                'sanphammua'=>$sanphammua,
        ]);
    }
}

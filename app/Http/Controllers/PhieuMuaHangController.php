<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Excel;
use App\Exports\PhieuMuaHangExport;

class PhieuMuaHangController extends Controller
{
    public function LapPhieuMuaHang()
    {
        $khachhang = DB::table('tbl_khachhang')
        ->get();
        $nhanvien = DB::table('tbl_nhanvien')
        ->where('TrangThai',1)
        ->get();
        $danhmuc = DB::table('tbl_danhmucsanpham')
        ->where('TinhTrang',1)
        ->get();
        return view('quanlyphieu.phieumuahang')
            ->with([
                'nhanvien'=>$nhanvien,
                'khachhang'=>$khachhang,
                'danhmuc'=>$danhmuc,
            ]);
    }
    public function LuuPhieuMuaHang(Request $request)
    {
        $tonggiatri = 0;
        $sosanpham = $request->sosanpham;
        for ($i = 0; $i < $sosanpham; $i++){
            $tonggiatri += $request->thanhtien[$i];
        }   
        $PhieuMuaHangID = DB::table('tbl_PhieuMuaHang')->insertGetId([
            'KhachHangID'=>$request->khachhang,
            'NhanVienID'=>$request->nhanvien,
            'TongGiaTri'=>$tonggiatri,
        ]);
        for ($i = 0; $i < $sosanpham; $i++){
            DB::table('tbl_chitietphieumuahang')->insert([
                'PhieuMuaHangID'=>$PhieuMuaHangID,
                'SanPhamID'=>$request->sanpham[$i],
                'SoLuong'=>$request->soluong[$i],
                'DonGia'=>$request->dongia[$i],
                'PhanTram'=>$request->giatri[$i],
                'ThanhTien'=>$request->thanhtien[$i],
            ]);  
        }
        return Excel::download(new PhieuMuaHangExport, 'PhieuMuaHang.xlsx');
    }
    public function InPhieuMuaHang($id)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert($id));
        return $pdf->stream();
    }
    public function convert($id)
    {
        return view('quanlydanhmuc.themdanhmuc');
    }
}

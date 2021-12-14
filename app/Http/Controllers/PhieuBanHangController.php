<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Excel;
use App\Exports\PhieuBanHangExport;
use App\Exports\PhieuBaoHanhExport;

class PhieuBanHangController extends Controller
{
    public function LapPhieuBanHang()
    {
        $khachhang = DB::table('tbl_khachhang')
        ->get();
        $nhanvien = DB::table('tbl_nhanvien')
        ->where('TrangThai',1)
        ->get();
        $danhmuc = DB::table('tbl_danhmucsanpham')
        ->where('TinhTrang',1)
        ->get();
        $sanpham = DB::table('tbl_sanpham')
        ->where('TinhTrang',1)
        ->get();
        return view('quanlyphieu.phieubanhang')
            ->with([
                'nhanvien'=>$nhanvien,
                'khachhang'=>$khachhang,
                'danhmuc'=>$danhmuc,
                'sanpham'=>$sanpham,
            ]);
    }
    public function LuuPhieuBanHang(Request $request)
    {
        $tonggiatri = 0;
        $sosanpham = $request->sosanpham;
        for ($i = 0; $i < $sosanpham; $i++){
            $tonggiatri += $request->thanhtien[$i];
        }   
        $PhieuBanHangID = DB::table('tbl_PhieuBamHang')->insertGetId([
            'KhachHangID'=>$request->khachhang,
            'NhanVienID'=>$request->nhanvien,
            'TongGiaTri'=>$tonggiatri,
        ]);
        $tondaungay = DB::table('tbl_tonquy')
                    ->orderBy('ID','DESC')
                    ->first()
                    ->TonCuoiNgay;

        if (!DB::table('tbl_tonquy')->where('Ngay',date('Y-m-d'))->exists())
        {
            DB::table('tbl_tonquy')->insert([
                'Thang'=>date('m-Y'),
                'Thu'=>0,
                'Chi'=>0,
                'TonDauNgay'=>$tondaungay,
                'TonCuoiNgay'=>$tondaungay,
            ]);
        }
        $tonngay = DB::table('tbl_tonquy')->where('Ngay', date('Y-m-d'))->first()->TonCuoiNgay;
        $thungay = DB::table('tbl_tonquy')->where('Ngay', date('Y-m-d'))->first()->Thu;
        DB::table('tbl_tonquy')->where('Ngay', date('Y-m-d'))->update([
            'Thu'=>$thungay+$tonggiatri,
            'TonCuoiNgay'=>$tonngay+$tonggiatri,
        ]);
        for ($i = 0; $i < $sosanpham; $i++){
            DB::table('tbl_chitietphieubanhang')->insert([
                'PhieuBanHangID'=>$PhieuBanHangID,
                'SanPhamID'=>$request->sanpham[$i],
                'SoLuong'=>$request->soluong[$i],
                'DonGia'=>$request->dongia[$i],
                'ThanhTien'=>$request->thanhtien[$i],
                'MaSanPham'=>$request->masanpham[$i],
            ]);  
            DB::table('tbl_sanpham')
            ->where('MaVach', $request->masanpham[$i])
            ->update([
                'TinhTrang'=>0,
            ]);
        }
        return Excel::download(new PhieuBanHangExport, 'PhieuBanHang.xlsx');
    }
    public function InPhieuBaoHanh()
    {
        return Excel::download(new PhieuBaoHanhExport, 'PhieuBaoHanh.xlsx');
    }
}

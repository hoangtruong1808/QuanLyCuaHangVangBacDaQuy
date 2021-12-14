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
        $chingay = DB::table('tbl_tonquy')->where('Ngay', date('Y-m-d'))->first()->Chi;
        DB::table('tbl_tonquy')->where('Ngay', date('Y-m-d'))->update([
            'Chi'=>$chingay+$tonggiatri,
            'TonCuoiNgay'=>$tonngay-$tonggiatri,
        ]);  
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
            $soluong = DB::table('tbl_sanpham')
            ->where('Loai', $request->sanpham[$i])
            ->count();
            $somavach = $soluong + 1;
            $danhmuc = DB::table('tbl_danhmucsanpham')
                    ->where('ID', $request->sanpham[$i])
                    ->where('TinhTrang','1')
                    ->first();
            $loaimavach = $danhmuc->MaVach;
            $giaban = $danhmuc->GiaBan * $request->giatri[$i] /100;
            DB::table('tbl_sanpham')->insert([
                'MaVach'=>$loaimavach.$somavach,
                'SoLuong'=>$request->soluong[$i],
                'Loai'=>$request->sanpham[$i],
                'GiaNhap'=>$request->thanhtien[$i],
                'GiaBan'=>$giaban,
                'PhieuMuaHangID'=>$PhieuMuaHangID,
                'TinhTrang'=>1,
                'GiaTri'=>$request->giatri[$i],
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

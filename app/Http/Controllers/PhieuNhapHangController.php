<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Excel;
use App\Exports\PhieuNhapHangExport;

class PhieuNhapHangController extends Controller
{
    public function LapPhieuNhapHang()
    {
        $nhacungcap = DB::table('tbl_nhacungcap')
        ->get();
        $nhanvien = DB::table('tbl_nhanvien')
        ->where('TrangThai',1)
        ->get();
        $danhmuc = DB::table('tbl_danhmucsanpham')
        ->where('TinhTrang',1)
        ->get();
        return view('quanlyphieu.phieunhaphang')
            ->with([
                'nhanvien'=>$nhanvien,
                'nhacungcap'=>$nhacungcap,
                'danhmuc'=>$danhmuc,
            ]);
    }
    public function LuuPhieuNhapHang(Request $request)
    {
        $tonggiatri = 0;
        $sosanpham = $request->sosanpham;
        for ($i = 0; $i < $sosanpham; $i++){
            $tonggiatri += $request->thanhtien[$i];
        }   
        $PhieuNhapHangID = DB::table('tbl_PhieuNhapHang')->insertGetId([
            'NhaCungCapID'=>$request->nhacungcap,
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
        $chingay = DB::table('tbl_tonquy')->where('Ngay', date('Y-m-d'))->first()->Chi;
        DB::table('tbl_tonquy')->where('Ngay', date('Y-m-d'))->update([
            'Chi'=>$chingay+$tonggiatri,
            'TonCuoiNgay'=>$tonngay-$tonggiatri,
        ]);  
        for ($i = 0; $i < $sosanpham; $i++){
            DB::table('tbl_chitietphieunhaphang')->insert([
                'PhieuNhapHangID'=>$PhieuNhapHangID,
                'SanPhamID'=>$request->sanpham[$i],
                'SoLuong'=>$request->soluong[$i],
                'DonGia'=>$request->dongia[$i],
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
            $giaban = $danhmuc->GiaBan;
            DB::table('tbl_sanpham')->insert([
                'MaVach'=>$loaimavach.$somavach,
                'SoLuong'=>$request->soluong[$i],
                'Loai'=>$request->sanpham[$i],
                'GiaNhap'=>$request->thanhtien[$i],
                'GiaBan'=>$giaban,
                'PhieuNhapHangID'=>$PhieuNhapHangID,
                'TinhTrang'=>1,
                'GiaTri'=>100,
            ]);
        }
        return Excel::download(new PhieuNhapHangExport, 'PhieuNhapHang.xlsx');
    }
}

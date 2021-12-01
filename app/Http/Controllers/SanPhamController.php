<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class SanPhamController extends Controller
{
    public function ThemSanPham()
    {
        $danhmucsanpham = DB::table('tbl_danhmucsanpham')
                        ->where('TinhTrang','1')
                        ->get();
        return view('quanlysanpham.themsanpham')
                ->with([
                    'danhmucsanpham'=>$danhmucsanpham,
                ]);
    }
    public function SuaSanPham($id)
    {
        $danhmucsanpham = DB::table('tbl_danhmucsanpham')
                        ->where('TinhTrang','1')
                        ->get();
        $sanpham = DB::table('tbl_sanpham')
                        ->where('ID',$id)
                        ->first();
        return view('quanlysanpham.suasanpham')
                ->with([
                    'danhmucsanpham'=>$danhmucsanpham,
                    'sanpham'=>$sanpham,
                ]);
    }
    public function CapNhatSanPham(Request $request, $id)
    {
        $danhmucID = DB::table('tbl_sanpham')
        ->where('ID', $id)
        ->update([
            'MaVach'=>$request->mavach,
            'SoLuong'=>$request->soluong,
            'Loai'=>$request->loai,
            'GiaNhap'=>$request->gianhap,
            'GiaBan'=>$request->giaban,
            'GiaTri'=>$request->giatri,
            'TinhTrang'=>$request->tinhtrang,
        ]);
        Session::flash('message','Cập nhật sản phẩm thành công!');
        return redirect()->route('DanhSachSanPham');
    }
    public function DanhSachSanPham()
    {
        $sanpham = DB::table('tbl_sanpham')
                ->join('tbl_danhmucsanpham', 'tbl_sanpham.loai', '=', 'tbl_danhmucsanpham.ID')
                ->select('tbl_sanpham.*', 'tbl_danhmucsanpham.Ten as loaisanpham')
                ->orderBy('tbl_sanpham.MaVach', 'ASC')
                ->orderBy('tbl_sanpham.TinhTrang', 'DESC')
                ->paginate(15);
        return view('quanlysanpham.danhsachsanpham')
            ->with([
                'sanpham'=>$sanpham,
            ]);
    }
    public function TimKiemSanPham(Request $request)
    {
        $sanpham = DB::table('tbl_sanpham')
                    ->join('tbl_danhmucsanpham', 'tbl_sanpham.loai', '=', 'tbl_danhmucsanpham.ID')
                    ->where('tbl_sanpham.MaVach', 'like', '%' . $request->key . '%')
                    ->orWhere('tbl_danhmucsanpham.Ten', 'like', '%' . $request->key . '%')
                    ->select('tbl_sanpham.*', 'tbl_danhmucsanpham.Ten as loaisanpham')
                    ->orderBy('tbl_sanpham.MaVach', 'ASC')
                    ->orderBy('tbl_sanpham.TinhTrang', 'DESC')
                    ->get();

        return view('quanlysanpham.danhsachsanpham')
            ->with([
                'sanpham'=>$sanpham,
            ]);
    }
    public function ChiTietSanPham($id)
    {
        $sanpham = DB::table('tbl_sanpham')
                ->join('tbl_danhmucsanpham', 'tbl_sanpham.loai', '=', 'tbl_danhmucsanpham.ID')
                ->select('tbl_sanpham.*', 'tbl_danhmucsanpham.Ten as loaisanpham')
                ->where('tbl_sanpham.ID', $id)
                ->first();
        $phieubanhang = DB::table('tbl_chitietphieubanhang')
                ->where('MaSanPham', $sanpham->MaVach)
                ->first();
        if($sanpham->PhieuNhapHangID)
        {
            $thongtinnhaphang = DB::table('tbl_phieunhaphang')
                            ->join('tbl_nhacungcap', 'tbl_phieunhaphang.NhaCungCapID', '=', 'tbl_nhacungcap.ID')
                            ->select('tbl_phieunhaphang.*', 'tbl_nhacungcap.Ten as nhacungcap')
                            ->where('tbl_phieunhaphang.ID', $sanpham->PhieuNhapHangID)
                            ->first();
            $loai = 'phieunhaphang';
        }
        else{
            $thongtinnhaphang = DB::table('tbl_phieumuahang')
                            ->join('tbl_khachhang', 'tbl_phieumuahang.KhachHangID', '=', 'tbl_khachhang.ID')
                            ->select('tbl_phieumuahang.*', 'tbl_khachhang.HoTen as khachhang')
                            ->where('tbl_phieumuahang.ID', $sanpham->PhieuMuaHangID)
                            ->first();
            $loai = 'phieumuahang';
        }
        $thongtinbanhang = [];
        if($phieubanhang)
        {
            $thongtinbanhang = DB::table('tbl_phieubamhang')
                            ->join('tbl_khachhang', 'tbl_phieubamhang.KhachHangID', '=', 'tbl_khachhang.ID')
                            ->select('tbl_phieubamhang.*', 'tbl_khachhang.HoTen as khachhang')
                            ->where('tbl_phieubamhang.ID',  $phieubanhang->PhieuBanHangID)
                            ->first();
            $ngaydasudung = (strtotime(date("Y-m-d")) - strtotime($thongtinbanhang->NgayLapPhieu))/ 86400;
            $thongtinbanhang->ngaybaohanh = 180 - $ngaydasudung;
        }
        return view('quanlysanpham.chitietsanpham')
            ->with([
                'data'=>$sanpham,
                'thongtinnhaphang'=>$thongtinnhaphang,
                'loai'=>$loai,
                'thongtinbanhang'=>$thongtinbanhang,            
        ]);  
    }
}

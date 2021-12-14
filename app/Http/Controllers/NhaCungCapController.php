<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class NhaCungCapController extends Controller
{
    public function LuuNhaCungCap(Request $request)
    {
        $anhdaidien = $request->file('anhdaidien')->getClientOriginalName();
        $request->file('anhdaidien')->storeAs('public/nhacungcap', $anhdaidien);
        DB::table('tbl_nhacungcap')->insert([
            'Ten'=>$request->ten,
            'DienThoai'=>$request->dienthoai,
            'AnhDaiDien'=>$anhdaidien,
            'Gmail'=>$request->gmail,
            'GhiChu'=>$request->ghichu,
        ]);
        Session::flash('message','Thêm nhà cung cấp thành công!');
        return redirect()->route('DanhSachNhaCungCap');
    }
    public function DanhSachNhaCungCap()
    {
        $nhacungcap = DB::table('tbl_nhacungcap')
                ->where('TrangThai', 1)
                ->get();
        return view('quanlynhacungcap.danhsachnhacungcap')
            ->with([
                'nhacungcap'=>$nhacungcap,
            ]);
    }
    public function TimKiemNhaCungCap(Request $request)
    {
        $nhacungcap = DB::table('tbl_nhacungcap')
                    ->where('TrangThai', 1)
                    ->where([['Ten', 'like', '%' . $request->key . '%'], ['TrangThai', 1]])
                    ->orWhere('DienThoai', 'like', '%' . $request->key . '%')
                    ->orWhere('Gmail', 'like', '%' . $request->key . '%')
                    ->get();

        return view('quanlynhacungcap.danhsachnhacungcap')
            ->with([
                'nhacungcap'=>$nhacungcap,
            ]);
    }
    public function XoaNhaCungCap($id)
    {
        DB::table('tbl_nhacungcap')
                ->where('ID', $id)
                ->update([
                    'TrangThai'=>0,
                ]);
        Session::flash('message','Xóa nhà cung cấp thành công!');
    }
    public function SuaNhaCungCap($id)
    {
        $nhacungcap = DB::table('tbl_nhacungcap')
                ->where('ID', $id)
                ->first();
        return view('quanlynhacungcap.suanhacungcap')
            ->with([
                'nhacungcap'=>$nhacungcap,
            ]);
    }
    public function CapNhatNhaCungCap(Request $request, $id)
    {
        $nhacungcap = DB::table('tbl_nhacungcap')
                    ->where('ID', $id)
                    ->first();
        
        if ($request->file('anhdaidien'))
        {
            $anhdaidien = $request->file('anhdaidien')->getClientOriginalName();
            $request->file('anhdaidien')->storeAs('public/nhacungcap', $anhdaidien);
        }
        else {
            $anhdaidien =  $nhacungcap->AnhDaiDien;
        }

        DB::table('tbl_nhacungcap')
        ->where('ID', $id)
        ->update([
            'Ten'=>$request->ten,
            'DienThoai'=>$request->dienthoai,
            'Gmail'=>$request->gmail,
            'AnhDaiDien'=>$anhdaidien,
            'GhiChu'=>$request->ghichu,
        ]);
        Session::flash('message','Cập nhật thông tin nhà cung cấp thành công!');
        return redirect()->route('DanhSachNhaCungCap');
    }
    public function ChiTietNhaCungCap($id)
    {
        $nhacungcap = DB::table('tbl_nhacungcap')
        ->where('ID', $id)
        ->first();
        $sanphamnhap = DB::table('tbl_chitietphieunhaphang')
        ->join('tbl_phieunhaphang', 'tbl_chitietphieunhaphang.PhieuNhapHangID', '=', 'tbl_phieunhaphang.ID')
        ->join('tbl_danhmucsanpham', 'tbl_chitietphieunhaphang.SanPhamID', '=', 'tbl_danhmucsanpham.ID')
        ->where('tbl_phieunhaphang.NhaCungCapID', $id)
        ->select('tbl_chitietphieunhaphang.*', 'tbl_phieunhaphang.NgayLapPhieu', 'tbl_danhmucsanpham.ten as LoaiSanPham')
        ->get();
        return view('quanlynhacungcap.chitietnhacungcap')
            ->with([
                'data'=>$nhacungcap,
                'sanphamnhap'=>$sanphamnhap
        ]);
    }
}

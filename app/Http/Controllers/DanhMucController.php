<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class DanhMucController extends Controller
{
    public function LuuDanhMuc(Request $request)
    {
        $danhmucID = DB::table('tbl_danhmucsanpham')->insertGetId([
            'Ten'=>$request->ten,
            'Loai'=>$request->loai,
            'MaVach'=>$request->ma,
            'TinhTrang'=>1,
            'GiaNhap'=>$request->gianhap,
            'GiaBan'=>$request->giaban,
        ]);
        DB::table('tbl_tygiasanpham')->insert([
            'DanhmucID'=>$danhmucID,
            'GiaNhap'=>$request->gianhap,
            'GiaBan'=>$request->giaban,
        ]);
        Session::flash('message','Thêm danh mục thành công!');
        return redirect()->route('DanhSachDanhMuc');
    }
    public function DanhSachDanhMuc()
    {
        $danhmuc = DB::table('tbl_danhmucsanpham')
                //->join('tbl_tygiasanpham', 'tbl_danhmucsanpham.ID', '=', 'tbl_tygiasanpham.DanhmucID')
                //->select('tbl_danhmucsanpham.*', 'tbl_tygiasanpham.GiaNhap', 'tbl_tygiasanpham.GiaBan')
                ->get();
        return view('quanlydanhmuc.danhsachdanhmuc')
            ->with([
                'danhmuc'=>$danhmuc,
            ]);
    }
    public function SuaDanhMuc($id)
    {
        $danhmuc = DB::table('tbl_danhmucsanpham')
                ->where('ID', $id)
                ->first();
        return view('quanlydanhmuc.suadanhmuc')
            ->with([
                'danhmuc'=>$danhmuc,
            ]);
    }
    public function CapNhatDanhMuc(Request $request, $id)
    {
        $danhmucID = DB::table('tbl_danhmucsanpham')
        ->where('ID', $id)
        ->update([
            'Ten'=>$request->ten,
            'Loai'=>$request->loai,
            'MaVach'=>$request->ma,
            'TinhTrang'=>1,
            'GiaNhap'=>$request->gianhap,
            'GiaBan'=>$request->giaban,
        ]);
        DB::table('tbl_tygiasanpham')->insert([
            'DanhmucID'=>$id,
            'GiaNhap'=>$request->gianhap,
            'GiaBan'=>$request->giaban,
        ]);
        Session::flash('message','Cập nhật danh mục và tỷ giá thành công!');
        return redirect()->route('DanhSachDanhMuc');
    }
    public function XoaDanhMuc($id)
    {
        DB::table('tbl_tygiasanpham')
                ->where('DanhmucID', $id)
                ->delete();
        DB::table('tbl_danhmucsanpham')
                ->where('ID', $id)
                ->delete();
        Session::flash('message','Xóa danh mục sản phẩm thành công!');
    }
    public function LichSuBienDongGia($id)
    {
        $danhmuc = DB::table('tbl_danhmucsanpham')
                      ->where('ID', $id)
                      ->first();
        $tygia = DB::table('tbl_tygiasanpham')
                    ->where('DanhmucID', $id)
                    ->orderby('ID', 'DESC')
                    ->get();
            return view('quanlydanhmuc.lichsubiendonggia')
                ->with([
                    'tygia'=>$tygia,
                    'danhmuc'=>$danhmuc,
                ]);
    }
}

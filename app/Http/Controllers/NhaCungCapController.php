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
            'GhiChu'=>$request->ghichu,
        ]);
        Session::flash('message','Thêm nhà cung cấp thành công!');
        return redirect()->route('DanhSachNhaCungCap');
    }
    public function DanhSachNhaCungCap()
    {
        $nhacungcap = DB::table('tbl_nhacungcap')->get();
        return view('quanlynhacungcap.danhsachnhacungcap')
            ->with([
                'nhacungcap'=>$nhacungcap,
            ]);
    }
    public function XoaNhaCungCap($id)
    {
        DB::table('tbl_nhacungcap')
                ->where('ID', $id)
                ->delete();
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
            'AnhDaiDien'=>$anhdaidien,
            'GhiChu'=>$request->ghichu,
        ]);
        Session::flash('message','Cập nhật thông tin nhà cung cấp thành công!');
        return redirect()->route('DanhSachNhaCungCap');
    }
}

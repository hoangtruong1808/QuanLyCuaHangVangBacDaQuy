<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function LuuSanPham(Request $request)
    {
        /* $anhdaidien = $request->file('anhdaidien')->getClientOriginalName();
        $request->file('anhdaidien')->storeAs('public/nhacungcap', $anhdaidien);
        DB::table('tbl_nhacungcap')->insert([
            'Ten'=>$request->ten,
            'DienThoai'=>$request->dienthoai,
            'AnhDaiDien'=>$anhdaidien,
            'GhiChu'=>$request->ghichu,
        ]);
        Session::flash('message','Thêm nhà cung cấp thành công!');
        return redirect()->route('DanhSachNhaCungCap'); */
    }
}

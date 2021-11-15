<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVienModel;
use Session;
use DB;

class NhanVienController extends Controller
{
    public function LuuNhanVien(Request $request)
    {
        $anhdaidien = $request->file('anhdaidien')->getClientOriginalName();
        $request->file('anhdaidien')->storeAs('public/nhanvien', $anhdaidien);
        $data = $request->all();
        $nhanvien = new NhanVienModel();
        $nhanvien['HoTen'] = $data['hoten'];
        $nhanvien['TaiKhoan'] = $data['taikhoan'];
        $nhanvien['MatKhau'] = bcrypt($data['matkhau']);
        $nhanvien['CMND'] = $data['CMND'];
        $nhanvien['ChucVu'] = $data['chucvu'];
        $nhanvien['DiaChi'] = $data['diachi'];
        $nhanvien['DienThoai'] = $data['dienthoai'];
        $nhanvien['AnhDaiDien'] = $anhdaidien;
        $nhanvien['GhiChu'] = $data['ghichu'];
        $nhanvien['TrangThai']=1;
        $nhanvien->save();
        Session::flash('message','Thêm nhân viên thành công!');
        return redirect()->route('DanhSachNhanVien');
    }
    public function DanhSachNhanVien()
    {
        $nhanvien = DB::table('tbl_nhanvien')
                ->where('TrangThai',1)
                ->get();
        return view('quanlynhanvien.danhsachnhanvien')
            ->with([
                'nhanvien'=>$nhanvien,
            ]);
    }
    public function XoaNhanVien($id)
    {
        DB::table('tbl_nhanvien')
                ->where('ID', $id)
                ->update([
                    'TrangThai'=>0,
                ]);
        Session::flash('message','Xóa nhân viên thành công!');
    }
    public function SuaNhanVien($id)
    {
        $nhanvien = DB::table('tbl_nhanvien')
                ->where('ID', $id)
                ->first();
        return view('quanlynhanvien.suanhanvien')
            ->with([
                'nhanvien'=>$nhanvien,
            ]);
    }

    public function CapNhatNhanVien(Request $request, $id)
    {
        $nhanvien = DB::table('tbl_nhanvien')
                    ->where('ID', $id)
                    ->first();
        
        if ($request->file('anhdaidien'))
        {
            $anhdaidien = $request->file('anhdaidien')->getClientOriginalName();
            $request->file('anhdaidien')->storeAs('public/nhanvien', $anhdaidien);
        }
        else {
            $anhdaidien =  $nhanvien->AnhDaiDien;
        }

        if ($request->matkhau)
        {
            $matkhau = bcrypt($request->matkhau);
        }
        else {
            $matkhau =  $nhanvien->MatKhau;
        }

        DB::table('tbl_nhanvien')
        ->where('ID', $id)
        ->update([
            'HoTen'=>$request->hoten,
            'TaiKhoan'=>$request->taikhoan,
            'MatKhau'=>$matkhau,
            'CMND'=>$request->CMND,
            'ChucVu'=>$request->chucvu,
            'DiaChi'=>$request->diachi,
            'DienThoai'=>$request->dienthoai,
            'AnhDaiDien'=>$anhdaidien,
            'GhiChu'=>$request->ghichu,
        ]);
        Session::flash('message','Cập nhật thông tin nhân viên thành công!');
        return redirect()->route('DanhSachNhanVien');
    }
    public function ChiTietNhanVien($id)
    {
        $nhanvien = DB::table('tbl_nhanvien')
        ->where('ID', $id)
        ->first();
        return view('quanlynhanvien.chitietnhanvien')
            ->with([
                'data'=>$nhanvien,
        ]);
    }
    public function DiemDanhNhanVien()
    {
        $nhanvien = DB::table('tbl_nhanvien')
                ->where('TrangThai','1')
                ->get();
        return view('quanlynhanvien.diemdanhnhanvien')
            ->with([
                'nhanvien'=>$nhanvien,
            ]);
    }
    public function LuuDiemDanh(Request $request, $id)
    {
        //add tbl_diemdanh
        if (DB::table('tbl_diemdanh')->where('NhanvienID',$id)->where('Ngay',date('Y-m-d'))->exists())
        {
            DB::table('tbl_diemdanh')->where('NhanvienID',$id)->where('Ngay',date('Y-m-d'))
            ->update([
                'CaSang'=>$_POST['casang'],
                'CaChieu'=>$_POST['cachieu'],
                'CaToi'=>$_POST['catoi'],
            ]);
        }
        else 
        {
            DB::table('tbl_diemdanh')->insert([
                'NhanvienID'=>$id,
                'CaSang'=>$_POST['casang'],
                'CaChieu'=>$_POST['cachieu'],
                'CaToi'=>$_POST['catoi'],
                'Ngay'=>date('Y-m-d'),
                'Thang'=>date('m'),
            ]);
        }
        //tính tổng số ca
        $SoCaSang = DB::table('tbl_diemdanh')->where('NhanvienID',$id)->where('CaSang',1)->where('Thang',date('m'))->count();
        $SoCaChieu = DB::table('tbl_diemdanh')->where('NhanvienID',$id)->where('CaChieu',1)->where('Thang',date('m'))->count();
        $SoCaToi = DB::table('tbl_diemdanh')->where('NhanvienID',$id)->where('CaToi',1)->where('Thang',date('m'))->count();
        $TongSoCa =  $SoCaSang +  $SoCaChieu + $SoCaToi;
        //tính lương
        $nhanvien =  DB::table('tbl_nhanvien')
                    ->where('ID',$id)
                    ->first();
        $chucvu = $nhanvien->ChucVu;
        if ($chucvu == 'Nhân viên')
        {
            $TongLuong = $TongSoCa * 120000;
        }
        else if ($chucvu == 'Quản lý')
        {
            $TongLuong = $TongSoCa * 160000;
        }

        //add table tính lương
        if (DB::table('tbl_luong')->where('NhanvienID',$id)->where('Thang',date('m'))->exists())
        {
            DB::table('tbl_luong')->where('NhanvienID',$id)->update([
                'SoCa'=>$TongSoCa,
                'TongLuong'=>$TongLuong,
            ]);
        }
        else{
            DB::table('tbl_luong')->insert([
                'NhanvienID'=>$id,
                'Thang'=>date('m'),
                'SoCa'=>$TongSoCa,
                'TongLuong'=>$TongLuong,
            ]);
        }
    }
}

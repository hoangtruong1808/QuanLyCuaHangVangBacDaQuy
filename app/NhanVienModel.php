<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVienModel extends Model
{
    public $timestamp = false;
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = [
        'HoTen', 'TaiKhoan', 'MatKhau', 'CMND', 'ChucVu', 'DiaChi', 'DienThoai', 'AnhDaiDien' ,'GhiChu', 'TrangThai'
    ];
    protected $primaryKey = 'ID';
    protected $table = 'tbl_nhanvien';
}

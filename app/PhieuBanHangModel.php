<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuBanHangModel extends Model
{
    public $timestamp = false;
    protected $fillable = [
       'MaSanPham', 'KhangHangID', 'NhanVienID', 'NgayLapPhieu', 'TongGiaTri'
    ];
    protected $primaryKey = 'ID';
    protected $table = 'tbl_phieubamhang';
}

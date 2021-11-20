<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuMuaHangModel extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'KhangHangID', 'NhanVienID', 'NgayLapPhieu', 'TongGiaTri'
    ];
    protected $primaryKey = 'ID';
    protected $table = 'tbl_phieumuahang';
}

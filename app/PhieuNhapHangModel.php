<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhapHangModel extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'NhaCungCapID', 'NhanVienID', 'NgayLapPhieu', 'TongGiaTri'
    ];
    protected $primaryKey = 'ID';
    protected $table = 'tbl_phieunhaphang';
}

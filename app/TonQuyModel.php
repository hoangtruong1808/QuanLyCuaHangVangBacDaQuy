<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TonQuyModel extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'Ngay', 'Thang', 'Thu', 'Chi', 'TonDauNgay', 'TonCuoiNgay'
    ];
    protected $primaryKey = 'ID';
    protected $table = 'tbl_tonquy';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalGroup extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'physical_id', 'physical_name', 'status',
    ];

    protected $primaryKey = 'id';
    protected $table = 'tbl_physical_property';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'category_id', 'category_name', 'category_parent_id', 'category_status', 'category_slug', 'created_at', 'updated_at'
    ];

    protected $primaryKey = 'STT';
    protected $table = 'tbl_category_product';
}

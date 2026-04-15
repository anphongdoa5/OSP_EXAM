<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DanhMuc extends Model
{
    protected $table = 'danh_muc';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'ten_danh_muc',
    ];

    /**
     * Get the products in this category
     */
    public function sanPhams(): BelongsToMany
    {
        return $this->belongsToMany(
            SanPham::class,
            'sanpham_danhmuc',
            'id_danh_muc',
            'id_san_pham'
        );
    }
}

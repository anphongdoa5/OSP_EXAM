<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SanPham extends Model
{
    protected $table = 'san_pham';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'code',
        'ten_san_pham',
        'gia_ban',
        'hinh_anh',
        'mo_ta',
        'ten_khoa_hoc',
        'ten_thong_thuong',
        'quy_cach_san_pham',
        'do_kho',
        'yeu_cau_anh_sang',
        'nhu_cau_nuoc',
    ];

    /**
     * Get the categories that this product belongs to
     */
    public function danhMucs(): BelongsToMany
    {
        return $this->belongsToMany(
            DanhMuc::class,
            'sanpham_danhmuc',
            'id_san_pham',
            'id_danh_muc'
        );
    }
}

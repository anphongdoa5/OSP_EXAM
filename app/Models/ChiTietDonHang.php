<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_don_hang';
    public $timestamps = false;

    protected $fillable = [
        'ma_don_hang',
        'id_san_pham',
        'so_luong',
        'don_gia',
    ];

    /**
     * Get the order (don_hang)
     */
    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'ma_don_hang');
    }

    /**
     * Get the product (san_pham)
     */
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_san_pham');
    }
}

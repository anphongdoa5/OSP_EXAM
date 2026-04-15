<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'don_hang';
    protected $primaryKey = 'ma_don_hang';
    public $timestamps = false;

    protected $fillable = [
        'ngay_dat_hang',
        'tinh_trang',
        'hinh_thuc_thanh_toan',
        'user_id',
    ];

    protected $casts = [
        'ngay_dat_hang' => 'datetime',
    ];

    /**
     * Get the user that owns the order
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the order details (chi tiet don hang)
     */
    public function chiTiet()
    {
        return $this->hasMany(ChiTietDonHang::class, 'ma_don_hang');
    }
}

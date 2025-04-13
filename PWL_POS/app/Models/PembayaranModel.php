<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranModel extends Model
{
    use HasFactory;

    protected $table = 't_pembayaran';
    protected $primaryKey = 'pembayaran_id';

    protected $fillable = [
        'penjualan_id',
        'metode_pembayaran',
        'jumlah_bayar',
        'kembalian',
        'status_bayar',
        'bayar_tanggal',
    ];

    public function penjualan()
    {
        return $this->belongsTo(PenjualanModel::class, 'penjualan_id', 'penjualan_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokModel extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $table = 't_stok';

    // Mendefinisikan primary key dari tabel yang digunakan 
    protected $primaryKey = 'stok_id';

    protected $fillable = ['barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah'];

    // Relasi dengan model Barang (satu stok berhubungan dengan satu barang)
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id');
    }

    // Relasi dengan model User (satu stok berhubungan dengan satu user)
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}

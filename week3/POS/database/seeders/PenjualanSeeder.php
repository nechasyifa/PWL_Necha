<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) { // 10 transaksi penjualan (data dummy)
            $data[] = [
                'penjualan_id' => $i,
                'user_id' => 1, 
                'pembeli' => 'Customer ' . $i,
                'penjualan_kode' => 'TRX' . str_pad($i, 3, '0', STR_PAD_LEFT), // Membuat kode transaksi yang diformat 3 digit
                'penjualan_tanggal' => now(),
            ];
        }

        DB::table('t_penjualan')->insert($data);
    }
}
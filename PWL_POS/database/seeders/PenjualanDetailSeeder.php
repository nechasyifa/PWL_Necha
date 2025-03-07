<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) { // 10 transaksi penjualan
            for ($j = 1; $j <= 3; $j++) { // tiap transaksi memiliki 3 item barang
                $data[] = [
                    'detail_id' => (($i - 1) * 3) + $j, // Id unik untuk setiap detail transaksi
                    'penjualan_id' => $i,
                    'barang_id' => rand(1, 10),
                    'harga' => rand(5000, 7500000),
                    'jumlah' => rand(1, 5),
                ];
            }
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Food & Beverage
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'B001', 'barang_nama' => 'Roti Gandum', 'harga_beli' => 12000, 'harga_jual' => 18000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'B002', 'barang_nama' => 'Susu Almond', 'harga_beli' => 25000, 'harga_jual' => 35000],
            
            // Beauty & Health
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'B003', 'barang_nama' => 'Face Wash', 'harga_beli' => 20000, 'harga_jual' => 30000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'B004', 'barang_nama' => 'Hand Cream', 'harga_beli' => 15000, 'harga_jual' => 22000],
            
            // Home Care
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'B005', 'barang_nama' => 'Pengharum Ruangan', 'harga_beli' => 18000, 'harga_jual' => 25000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'B006', 'barang_nama' => 'Sabun Pembersih Lantai', 'harga_beli' => 20000, 'harga_jual' => 28000],
            
            // Baby & Kid
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'B007', 'barang_nama' => 'Bubur Bayi', 'harga_beli' => 30000, 'harga_jual' => 40000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'B008', 'barang_nama' => 'Mainan Edukasi', 'harga_beli' => 45000, 'harga_jual' => 60000],
            
            // Sports
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'B009', 'barang_nama' => 'Sepatu Lari', 'harga_beli' => 300000, 'harga_jual' => 450000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'B010', 'barang_nama' => 'Matras Yoga', 'harga_beli' => 150000, 'harga_jual' => 220000],
        ];


        DB::table('m_barang')->insert($data);
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_pembayaran', function (Blueprint $table) {
            $table->id('pembayaran_id'); // Primary Key
            $table->unsignedBigInteger('penjualan_id'); // Foreign Key ke t_penjualan
            $table->string('metode_pembayaran', 20); // Contoh: Tunai, QRIS, Transfer
            $table->integer('jumlah_bayar');
            $table->integer('kembalian')->default(0);
            $table->string('status_bayar', 10); // Lunas / Belum
            $table->datetime('bayar_tanggal');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('penjualan_id')->references('penjualan_id')->on('t_penjualan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pembayaran');
    }
};
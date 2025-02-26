<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration //kelas yang mewarisi Migration untuk menjalankan migrasi database
{
    /**
     * Run the migrations.
     */
    public function up(): void //up() dieksekusi saat migrasi dijalankan
    {
        Schema::create('items', function (Blueprint $table) { //membuat tabel baru bernama items
            $table->id(); //menambahkan kolom id sebagai primary key
            $table->string('name'); //menambahkan kolom nama untuk menyimpan nama item
            $table->text('description'); //menambahkan kolom description bertipe text untuk menyimpan deskripsi item
            $table->timestamps(); //menambahkan kolom yang secara otomatis mencatat waktu pembuatan dan pembaruan data.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //down() dijalankan saat rollback
    {
        Schema::dropIfExists('items'); //untuk menghapus tabel items
    }
};

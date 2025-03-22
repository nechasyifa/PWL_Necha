<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);

// Route::get('/user', [UserController::class, 'index']);
// Route::get('/', [HomeController::class, 'home']);

Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodbeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyhealth']);
    Route::get('/home-care', [ProductController::class, 'homecare']);
    Route::get('/baby-kid', [ProductController::class, 'babykid']);
});

// Route::get('/user/{id}/name/{name}', [UserController::class, 'user']);

Route::get('/penjualan', [PenjualanController::class, 'penjualan']);

Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::post('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

//Barang
Route::get('/barang', [BarangController::class, 'index']);
 Route::get('/barang/create', [BarangController::class, 'create']);
 Route::post('/barang', [BarangController::class, 'store']);
 Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
 Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
 Route::post('/barang/delete/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

 Route::get('/', [WelcomeController::class,'index']);

//User
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);           // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);       // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);    // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);          // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);        // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);   // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);      // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);  // menghapus data user
});
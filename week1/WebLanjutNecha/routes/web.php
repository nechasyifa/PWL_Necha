<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController; //menggunakan ItemController untuk menangani permintaan terkait item
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;

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

// Route::get('/', function () {
//     return view('welcome'); //menampilkan halaman welcome.blade.php saat pengguna mengakses URL utama "/"
// });

Route::resource('items', ItemController::class); //membuat rute CRUD otomatis untuk resource 'items'

Route::get('/hello', [WelcomeController::class,'hello']);

// Route::get('/', [PageController::class,'index']);
// Route::get('/about', [PageController::class,'about']);
// Route::get('/articles/{id}', [PageController::class,'articles']);

Route::get('/', HomeController::class);
Route::get('/about', AboutController::class);
Route::get('/articles/{id}', ArticleController::class);

Route::resource('photos', PhotoController::class);

Route::get('/world', function () {
    return 'World';
}); //menampilkan "World" ketika diakses melalui URL "/world"

// Route::get('/', function () {
//     return ('Selamat Datang');
// }); //menampilkan halaman "Selamat Datang" saat pengguna mengakses URL utama "/"

// Route::get('/about', function () {
//     return ("NIM: 2341720167 <br> Nama: Necha Syifa Syafitri");
// }); //menampilkan halaman "NIM: 2341720167 dan Nama: Necha Syifa Syafitri" saat pengguna mengakses URL "/about"

Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

// Route::get('/articles/{id}', function ($id) {
//     return 'Halaman Artikel dengan ID ' . $id;
// });

// Route::get('/user/{name?}', function ($name=null) {
//     return 'Nama saya '.$name;
// });

Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
    });

// Route::get('/greeting', function () {
//     return view('hello', ['name' => 'Necha']);
//     });

// Route::get('/greeting', function () {
//     return view('blog.hello', ['name' => 'Necha']);
//     });
        
Route::get('/greeting', [WelcomeController::class, 'greeting']);
    

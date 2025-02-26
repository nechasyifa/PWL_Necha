<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
         // tambah data user dengan Eloquent Model
         $data = [
            // 'username' => 'customer-1',
            'nama' => 'Pelanggan Pertama',
            // 'password' => Hash::make('12345'),
            // 'level_id' => 5
        ];
        UserModel::where('username', 'customer-1')->update($data); // update data user
        // UserModel::insert($data); // tambahkan data ke tabel m_user

        // coba akses model UserModel
        $user = UserModel::all(); // ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }
    // public function user($id, $name)
    // {   
    //     return view('user', ['id' => $id, 'name' => $name]);
    // }
}

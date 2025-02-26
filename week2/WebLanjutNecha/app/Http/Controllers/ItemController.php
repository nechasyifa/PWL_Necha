<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        //mengambil semua data item dari database
        $items = Item::all();
        //menampilkan halaman index dengan data item
        return view('items.index', compact('items')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //menampilkan halaman form tambah item
        return view('items.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input untuk memastikan name dan description harus diisi
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

    //Hanya masukkan atribut yang diizinkan
    Item::create($request->only(['name','description'])); //menyimpan data item yang diinput pengguna ke database
    return redirect()->route('items.index')->with('success','Item added successfully.'); //redirect ke halaman daftar item dengan memunculkan pesan sukses
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //menampilkan halaman detail item
        return view('items.show', compact('item')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //menampilkan halaman edit item dengan data item yang akan diedit
        return view('items.edit', compact('item')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //validasi input untuk memastikan name dan description harus diisi
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        //memperbarui data item dengan input dari pengguna
        $item->update($request->only(['name','description']));
        //redirect ke halaman daftar item dengan memunculkan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item updated successfully,');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //menghapus item dari database
        $item->delete();
        //redirect ke halaman daftar item dengan memunculkan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item deleted successfully');
    }
}

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title> <!-- menentukan judul halaman di tab browser -->
</head>
<body>
    <h1>Edit Item</h1> <!-- menampilkan judul halaman -->

    <form action="{{ route('items.update', $item) }}" method="POST"> 
        <!-- formulir untuk mengedit item, data dikirim ke route 'items.update' dengan metode POST -->
        
        @csrf <!-- token keamanan untuk mencegah serangan CSRF (Cross-Site Request Forgery) -->
        @method('PUT') <!-- mengubah metode HTTP menjadi PUT, yang digunakan untuk memperbarui data -->

        <label for="name">Name:</label> <!-- label untuk input nama item -->
        <input type="text" name="name" value="{{ $item->name }}" required> 
        <!-- input teks untuk nama item, sudah terisi dengan data item yang sedang diedit, wajib diisi -->

        <br> <!-- memberikan jarak antar elemen -->

        <label for="description">Description:</label> <!-- label untuk input deskripsi item -->
        <textarea name="description" required>{{ $item->description }}</textarea> 
        <!-- area teks untuk deskripsi item, sudah terisi dengan data item yang sedang diedit, wajib diisi -->

        <br> <!-- memberikan jarak antar elemen -->

        <button type="submit">Update Item</button> <!-- tombol untuk mengirim formulir dan memperbarui item -->
    </form>

    <a href="{{ route('items.index') }}">Back to List</a> <!-- link untuk kembali ke halaman daftar item -->
</body>
</html>

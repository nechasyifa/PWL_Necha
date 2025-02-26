<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title> <!-- menentukan judul halaman di tab browser -->
</head>
<body>
    <h1>Add Item</h1> <!-- menampilkan judul halaman -->

    <form action="{{ route('items.store') }}" method="POST"> <!-- formulir untuk menambahkan item baru, data akan dikirim ke 'items.store' dengan metode POST -->
        @csrf <!-- token keamanan untuk mencegah serangan CSRF (Cross-Site Request Forgery) -->

        <label for="name">Name:</label> <!-- label untuk input nama item -->
        <input type="text" name="name" required> <!-- input teks untuk nama item, wajib diisi -->

        <br> <!-- memberikan jarak antar elemen -->

        <label for="description">Description:</label> <!-- label untuk input deskripsi item -->
        <textarea name="description" required></textarea> <!-- area teks untuk deskripsi item, wajib diisi -->

        <br> <!-- memberikan jarak antar elemen -->

        <button type="submit">Add Item</button> <!-- tombol untuk mengirim formulir dan menambahkan item -->
    </form>

    <a href="{{ route('items.index') }}">Back to List</a> <!-- link untuk kembali ke halaman daftar item -->
</body>
</html>

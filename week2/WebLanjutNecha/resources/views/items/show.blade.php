<!DOCTYPE html>
<html>
<head>
    <title>Item List</title> <!-- menentukan judul halaman yang akan ditampilkan di tab browser -->
</head>
<body>
    <h1>Items</h1> <!-- menampilkan judul utama halaman -->

    @if(session('success')) <!-- mengecek apakah ada pesan sukses yang tersimpan dalam session -->
        <p>{{ session('success') }}</p> <!-- jika ada, akan ditampilkan pesan sukses -->
    @endif

    <a href="{{ route('items.create') }}">Add Item</a> <!-- tombol untuk menambahkan item baru, mengarah ke halaman tambah item -->

    <ul>
        @foreach ($items as $item) <!-- melakukan perulangan untuk menampilkan setiap item yang ada -->
            <li>
                {{ $item->name }} - <!-- menampilkan nama item -->

                <a href="{{ route('items.edit', $item) }}">Edit</a> <!-- link untuk mengedit item -->

                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf <!-- menambahkan token keamanan CSRF untuk mencegah serangan CSRF -->
                    @method('DELETE') <!-- mengubah metode pengiriman form menjadi DELETE untuk menghapus item -->
                    <button type="submit">Delete</button> <!-- tombol untuk menghapus item -->
                </form>
            </li>
        @endforeach <!-- mengakhiri perulangan -->
    </ul>
</body>
</html>

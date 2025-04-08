# Laporan Praktikum Week 7 - Authentication dan Authorization di Laravel 

## Praktikum 1 - Implementasi Authentication
Tampilan Halaman Awal Login ke Aplikasi 
<br>![image](https://github.com/user-attachments/assets/b70d35a5-d19b-4d7e-bcd7-04a7cc24b0a6)

Tampilan Berhasil Login (sebagai admin)
<br>![image](https://github.com/user-attachments/assets/98376dea-d6db-4f00-8fd3-c94071a10145)

## Tugas 1 - Implementasi Authentication
### 1. Silahkan implementasikan proses login pada project kalian masing-masing
Tampilan Halaman Login
<br>![image](https://github.com/user-attachments/assets/b70d35a5-d19b-4d7e-bcd7-04a7cc24b0a6)

Tampilan Berhasil Login
<br>![image](https://github.com/user-attachments/assets/98376dea-d6db-4f00-8fd3-c94071a10145)

### 2. Silahkan implementasi proses logout pada halaman web yang kalian buat
Tombol Logout Pada Sidebar
<br>![image](https://github.com/user-attachments/assets/0dddd242-1fbc-44a5-a7a6-de33894b7ff1)

Tampilan Konfirmasi Logout
<br>![image](https://github.com/user-attachments/assets/98df00f8-700f-4b3e-ad01-1bea14ab2358)

Berhasil Logout
<br>![image](https://github.com/user-attachments/assets/aa66ba78-164c-47f9-91c9-19b251eeab8f)

### 3. Amati dan jelaskan tiap tahapan yang kalian kerjakan, dan jabarkan dalam laporan
Menambahkan kode pada bagian layouts/sidebar.blade.php
<br>![image](https://github.com/user-attachments/assets/0cf7d278-4c7a-4b73-83a3-e5ae8753da6f)

Membuat tombol logout di bagian sidebar
<br>![image](https://github.com/user-attachments/assets/ecc8dfb7-2529-46c5-9d1a-ff0df0719fe9)

Membuat fungsi logout agar saat tombol diklik akan muncul konfirmasi menggunakan SweetAlert. Jika pengguna setuju, maka pengguna akan diarahkan ke URL logout
<br>![image](https://github.com/user-attachments/assets/1fa323db-490a-464d-86d8-f3ccaf899726)

<br>1. Menampilkan Konfirmasi
<li>Swal.fire({...}): memunculkan dialog SweetAlert dengan judul "Konfirmasi!" dan pesan "Apakah Anda yakin untuk keluar?"
<li>Ada dua tombol: Logout (merah) dan Kembali (batal).</li>

<br>2. Jika Pengguna Menekan "Logout"
<li>result.isConfirmed: mengecek apakah pengguna memilih "Logout".</li>
<li>Menampilkan SweetAlert baru dengan pesan sukses: "Anda berhasil keluar!".</li>

<br>3. Mengarahkan ke URL Logout
<li>Setelah pengguna menekan OK, browser diarahkan ke 'logout'.</li>

### 4. Submit kode untuk implementasi Authentication pada repository github kalian. 

## Praktikum 2 - Implementasi Authorizaton di Laravel dengan Middleware
Login Sebagai Manager (user selain admin)
<br>![image](https://github.com/user-attachments/assets/be22a596-81a1-4ffa-90ef-5b306747dc50)

Hasilnya tidak bisa mengakses level
<br>![image](https://github.com/user-attachments/assets/43f7a212-b5ab-4d07-8638-a9658b20f8cd)

## Tugas 2 – Implementasi Authoriization
### 1. Apa yang kalian pahami pada praktikum 2 ini?
Yang saya pahami adalah tentang pengaturan hak akses, jadi kita mencoba memproteksi halaman agar hanya pengguna tertentu yang bisa mengakses sesuai rolenya. Misalnya, hanya admin yang bisa melihat halaman level, sedangkan user lain seperti manager tidak bisa.

### 2. Amati dan jelaskan tiap tahapan yang kalian kerjakan, dan jabarkan dalam laporan
<br>![image](https://github.com/user-attachments/assets/244fb928-515b-4d17-b00c-1fefd4927d93)
<li>Middleware ini nantinya digunakan untuk mengatur izin akses user terhadap fitur tertentu</li>

<br>![image](https://github.com/user-attachments/assets/de76a0f7-a01a-45dc-96c9-7b1b32f0d197)
<li>Fungsi ini menangani request sebelum masuk ke controller, $role adalah parameter tambahan yang nanti bisa diisi saat memanggil middleware di route (misalnya 'authorize:ADM').</li>

<br>![image](https://github.com/user-attachments/assets/4a52048d-d072-4568-a983-d8cae0593574)
<li>Mengambil nama role dari relasi level user</li>

<br>![image](https://github.com/user-attachments/assets/2d422fd0-d410-4f2d-a689-bd7f10542f4f)
<li>Untuk mengecek apakah user memiliki kode role tertentu, contohnya: 'admin', 'kasir', dll.</li>

<br>![image](https://github.com/user-attachments/assets/8f66464f-680f-44c5-9451-ad558da3ff51)
<li>Hanya user dengan level_kode admin/ADM yang bisa mengakses halaman level</li>

### 3. Submit kode untuk implementasi Authorization pada repository github kalian.

## Praktikum 3 - Implementasi Multi-Level Authorizaton di Laravel dengan Middleware
Login Sebagai Manager
<br>![image](https://github.com/user-attachments/assets/f52b1a07-252d-4fc5-ad67-d954a05c05f3)

Dapat Mengakses Halaman Barang
<br>![image](https://github.com/user-attachments/assets/644475d8-301f-42b5-9cdd-1280c79454fb)

## Tugas 3 – Implementasi Multi-Level Authorization
### 1. Silahkan implementasikan multi-level authorization pada project kalian masing-masing 
### 2. Amati dan jelaskan tiap tahapan yang kalian kerjakan, dan jabarkan dalam laporan 
<br>![image](https://github.com/user-attachments/assets/2a493074-5f18-4d17-acfa-013aa9f314d2)
<li>Mengganti parameter $role menjadi $roles agar middleware ini bisa menerima lebih dari satu role (misal: ['ADM','MNG']) dalam satu route.</li>

<br>![image](https://github.com/user-attachments/assets/51cfd174-650e-4725-9032-d1cb686ab6ca)
<li>Method ini berfungsi untuk mengambil role dari user yang sedang login</li>

<br>![image](https://github.com/user-attachments/assets/20f83a1b-9691-4d37-b806-4244f6de416d)
<li>Middleware ini akan mengecek dahulu apakah user yang sedang login adalah salah satu dari role tersebut (ADM atau MNG) sebelum mengizinkan akses ke route di dalamnya.</li>

### 3. Implementasikan multi-level authorization untuk semua Level/Jenis User dan Menu menu yang sesuai dengan Level/Jenis User 
<br>Role dan Hak Akses Menu sebagai berikut:
<li>ADM	Admin	=> Semua fitur (user, level, supplier, dll)</li>
<li>MNG	Manager =>	barang, kategori, supplier</li>
<li>STF	Staff / Kasir	=> barang, kategori</li>
<li>CUS	Customer / Pelanggan =>	hanya bisa melihat list barang</li>

### 4. Submit kode untuk implementasi Authorization pada repository github kalian.

## Tugas 4 – Implementasi Form Registrasi
### 1. Silahkan implementasikan form untuk registrasi user. 
### 2. Screenshot hasil yang kalian kerjakan 
Tampilan pada Halaman Login yang Telah Terdapat Register Jika Belum Memiliki Akun
<br>![image](https://github.com/user-attachments/assets/d9d25d61-6f18-4ecb-98c0-589786e0fa00)

Tampilan Form Registrasi User
<br>![image](https://github.com/user-attachments/assets/b76f2793-a5d3-4192-96af-d8147bade27b)

Mengisi Form Registrasi User
<br>![image](https://github.com/user-attachments/assets/2435d061-b5cb-4577-ad48-7c6217e72e28)

Berhasil Register
<br>![image](https://github.com/user-attachments/assets/987ad971-ec38-4a27-94fe-dbd0e0d783b8)

Data Berhasil Tersimpan Dalam Database
<br>![image](https://github.com/user-attachments/assets/a0a7e6f2-a53a-4b2e-b378-199e6dda70ca)

### 3. Commit dan push hasil tugas kalian ke masing-masing repo github kalian
<br>![image](https://github.com/user-attachments/assets/d6dc6f97-34c0-4ec3-80a5-f2c95eb135b8)

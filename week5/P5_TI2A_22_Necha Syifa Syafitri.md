# Laporan Praktikum Week 5 - Blade View, Web Templating(AdminLTE), Datatables

## Praktikum 1 - Integrasi Laravel dengan AdminLte3

Tampilan Halaman Awal
<br>![image](https://github.com/user-attachments/assets/288bf0eb-6a89-4e22-92a1-a912a92d7802)

## Praktikum 2 - Integrasi dengan DataTables

Menambahkan beberapa data ke table kategori
<br>![image](https://github.com/user-attachments/assets/bac1f3a6-6775-4607-92bc-2764eb5fbf83)

Data yang ditambahkan
<br>![image](https://github.com/user-attachments/assets/674f1c76-323d-4c5a-838e-715faf784cd9)

Keseluruhan data
<br>![image](https://github.com/user-attachments/assets/b49d4b4a-167c-4b2c-a27a-b4d0137d96af)

## Praktikum 3 - Membuat form kemudian menyimpan data dalam database

Halaman Create
<br>![image](https://github.com/user-attachments/assets/9e8ef225-36cf-414f-9c62-9abd6a4fbd97)

Tampilan sebelum menambahkan data baru
<br>![image](https://github.com/user-attachments/assets/0e3d6636-3eef-40e0-80e6-ab6029e1cd61)

Menambahkan data kategori baru
<br>![image](https://github.com/user-attachments/assets/43f44584-e736-4cc4-a7d8-f386de9b0fc8)

Hasil setelah ditambahkan
<br>![image](https://github.com/user-attachments/assets/88979781-c815-4fec-a95d-c65c481073a7)

## TUGAS
#### 1. Tambahkan button Add di halam manage kategori, yang mengarah ke create kategori baru
<br> Menambahkan kode pada index.blade.php
<br>![image](https://github.com/user-attachments/assets/ab801c97-17b2-48e1-9c00-a02efe4e8ff0)
<br> href="{{ url(path: 'kategori/create') }}" → untuk mengarahkan pengguna ke URL kategori/create, yaitu halaman untuk menambah kategori baru 

<br> Hasil
<br>![image](https://github.com/user-attachments/assets/ad0b6a00-7e4a-4c93-bc39-9cc047cd96c2)


<br> Ketika button add diklik akan mengarah ke create kategori
<br>![image](https://github.com/user-attachments/assets/116e032c-a941-406c-84b5-aa03a1445ed7)


#### 2. Tambahkan menu untuk halaman manage kategori, di daftar menu navbar
<br> Menambahkan kode pada adminlte.php
<br>![image](https://github.com/user-attachments/assets/99abc0b8-b660-4d63-9dbd-cb9efc0c938c)
<br> 'text' => 'Manage Kategori' → teks yang akan muncul di navbar, yaitu "Manage Kategori".
<br> 'url' => '/kategori' → saat menu "Manage Kategori" diklik, pengguna akan diarahkan ke halaman kategori.
<br> 'topnav' => true → agar menu ini ditampilkan di navbar atas (top navigation bar).

<br> Hasil
<br>![image](https://github.com/user-attachments/assets/34533e46-faa2-4bc3-bb8d-4ca89833f36b)

<br> Ketika button add diklik akan mengarah ke kategori
<br>![image](https://github.com/user-attachments/assets/e84c72a1-e495-4e39-b242-bc077f39f775)


#### 3. Tambahkan action edit di datatables dan buat halaman edit serta controllernya 
<br> Menambahkan kode pada KategoriDataTable.php
<br>![image](https://github.com/user-attachments/assets/e3bc46c2-9cec-4db1-9ace-3eaa6cc87ad8)
<br>![image](https://github.com/user-attachments/assets/f501eeb9-b367-4d80-a70f-f8487b7f97ca)

<br> Menambahkan edit.blade.php
<br>![image](https://github.com/user-attachments/assets/a64de0b6-4e40-41c5-a277-a2373c3f5138)

<br> Menambahkan kode pada KategoriController
<br>![image](https://github.com/user-attachments/assets/b9b4bd49-f976-4744-90ef-45b50d73c419)

<br> Menambahkan route di web.php
<br>![image](https://github.com/user-attachments/assets/6931b9af-46f5-48a7-8440-cc5beafd13ac)

<br> Hasil
<br>![image](https://github.com/user-attachments/assets/ea4eae7a-057f-4e9f-94a6-76da96c3860b)

<br> Data sebelum diedit
<br>![image](https://github.com/user-attachments/assets/82e2a503-7f5a-4b29-abfb-a643a7389d6a)

<br> Mengedit data camilan menjadi makanan ringan
<br>![image](https://github.com/user-attachments/assets/fbeea08e-fc9f-4342-aaa0-1daa0e89e871)
<br>![image](https://github.com/user-attachments/assets/fd050abe-a892-4294-8fb3-4d836d44185d)

<br> Data setelah berhasil diedit
<br>![image](https://github.com/user-attachments/assets/6b49060b-b873-4623-82d2-73ee37e59588)


#### 4. Tambahkan action delete di datatables serta controllernya
<br> Menambahkan kode pada KategoriDataTable.php
<br>![image](https://github.com/user-attachments/assets/ee6f2739-527c-4fcc-9672-be27fa8c6c81)


<br> Menambahkan kode pada KategoriController
<br>![image](https://github.com/user-attachments/assets/b98b0465-2ebe-49ee-8826-14ea433a2fc8)


<br> Menambahkan route di web.php
<br>![image](https://github.com/user-attachments/assets/e7cc1b14-9ed6-43ab-89b9-6c10715a667f)

<br> Hasil
<br>![image](https://github.com/user-attachments/assets/e7e530a9-c912-479a-8ab6-93a775dfab3f)

<br> Data sebelum dihapus
<br> ![image](https://github.com/user-attachments/assets/b1b9564d-042a-4ec0-a358-2a9164a32ffa)

<br> Menghapus data kucing
<br>![image](https://github.com/user-attachments/assets/4ecf10f8-648f-4fec-a127-a3b996c0a03c)

<br> Data setelah berhasil dihapus
<br>![image](https://github.com/user-attachments/assets/83bc36f6-0ea2-40a1-997c-2d26ab3c9029)


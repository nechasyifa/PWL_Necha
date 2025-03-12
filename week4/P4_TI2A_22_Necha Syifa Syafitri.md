# Laporan Praktikum Week 4 - MODEL dan ELOQUENT ORM

## Praktikum 1
### $fillable
3. Simpan kode program Langkah 1 dan 2, dan jalankan perintah web server
<br>![image](https://github.com/user-attachments/assets/69c41b04-9f7a-4053-8da0-5b63ea4d4c80)

6. Simpan kode program Langkah 4 dan 5. Kemudian jalankan pada browser dan amati apa yang terjadi.
   <br>-> Yang terjadi jika kolom password dihilangkan, maka akan error seperti berikut ini:
<br>![image](https://github.com/user-attachments/assets/1b6d2538-5f12-4f4b-83fe-c5fc2493236a)

## Praktikum 2.1
### Retrieving Single Models
3. Simpan kode program Langkah 1 dan 2. Kemudian jalankan pada browser dan amati apa yang terjadi
   <br>-> Yang terjadi adalah kode tersebut mengambil data user dengan id = 1 dari database menggunakan Eloquent ORM (UserModel::find(1)).
<br>![image](https://github.com/user-attachments/assets/25728055-1387-4508-bd59-91188277d2a3)

5. Simpan kode program Langkah 4. Kemudian jalankan pada browser dan amati apa yang terjadi
   <br>-> Yang terjadi sama seperti sebelumnya yaitu mengambil data user dengan id = 1. Namun, penggunaan where('level_id', 1)->first() digunakan untuk mencari berdasarkan kategori tertentu.
<br>![image](https://github.com/user-attachments/assets/db00f24c-8e78-46c4-98e0-ba320ea409d5)

7. Simpan kode program Langkah 6. Kemudian jalankan pada browser dan amati apa yang terjadi
   <br>-> Yang terjadi sama seperti sebelumnya yaitu mengambil data user dengan id = 1. Namun, penggunaan firstWhere digunakan untuk mengambil data pertama saja, bukan keseluruhan data.
<br>![image](https://github.com/user-attachments/assets/1f0c9ad7-47e0-4456-878e-dfa7b5625f23)

9. Simpan kode program Langkah 8. Kemudian pada browser dan amati apa yang terjadi
   <br>-> Yang terjadi adalah sama seperti sebelumnya yaitu mengambil data user dengan id = 1. Namun, penggunaan findOr pada kode tersebut tidak memanggil kolom ID sehingga ID tidak ditampilkan, yang dipanggil hanya username dan nama.
<br>![image](https://github.com/user-attachments/assets/03f032cb-9c01-429a-8ce2-c0d962d7936b)

11. Simpan kode program Langkah 10. Kemudian jalankan pada browser dan amati apa yang terjadi
    <br>-> Yang terjadi adalah 404 not found karena data user dengan id = 20 tidak ada, sehingga findOr akan menjalankan abort(404).
<br>![image](https://github.com/user-attachments/assets/b5a286f7-37a4-421e-999e-daee7affad88)

## Praktikum 2.2
### Not Found Exceptions
2. Simpan kode program Langkah 1. Kemudian jalankan pada browser dan amati apa yang terjadi
   <br>-> findOrFail akan otomatis menjalankan error 404 jika data user yang dicari tidak ditemukan. Namun, disini data yang dicari yaitu id = 1 tersedia, maka tidak terjadi error 404.
<br>![image](https://github.com/user-attachments/assets/ada7c8e1-4dcb-450d-8b98-0f0d458fc90c)

4. Simpan kode program Langkah 3. Kemudian jalankan pada browser dan amati apa yang terjadi
   <br>-> Yang terjadi adalah 404 not found karena data manager9 tidak ada, sehingga method firstOrFail akan otomatis mengabort dengan kode 404. (seharusnya method tersebut bisa mengambil data pertama dari ketentuan yang dicari, jika data tersebut tersedia).
<br>![image](https://github.com/user-attachments/assets/b5a286f7-37a4-421e-999e-daee7affad88)

## Praktikum 2.3
### Retreiving Aggregrates
2. Simpan kode program Langkah 1. Kemudian jalankan pada browser dan amati apa yang terjadi
   <br>-> Yang terjadi adalah kode tersebut menampilkan data yang dimasukkan ke dalam parameter
   <br>![image](https://github.com/user-attachments/assets/0a5b1e85-52dc-40c5-8951-609f7ad891ec)

   
4. Buat agar jumlah script pada langkah 1 bisa tampil pada halaman browser
<br>Kode untuk controller
<br>![image](https://github.com/user-attachments/assets/8ab20408-3bb8-4db6-9f38-a4c74b8842bf)

<br>Kode untuk view user.blade.php
<br>![image](https://github.com/user-attachments/assets/55829070-6791-4d66-b085-8087122ce244)

<br>Hasil:
<br>![image](https://github.com/user-attachments/assets/1cbda0bf-a5c2-4200-96aa-93c198b1f3df)

## Praktikum 2.4
### Retreiving or Creating Models
3. Simpan kode program Langkah 1 dan 2. Kemudian jalankan pada browser dan amati
<br>-> Yang terjadi adalah kode tersebut memanggil data sesuai dengan parameter yang diinputkan, jika data yang dicari tidak ada, maka method akan membuat data baru sesuai dengan parameter tersebut.
<br>![image](https://github.com/user-attachments/assets/a2a65b69-3ccd-4d34-9023-960fb120caf0)

5. Simpan kode program Langkah 4. Kemudian jalankan pada browser dan amati apa yang terjadi dan cek juga pada phpMyAdmin pada tabel m_user
<br>-> Hasilnya terjadi error, karena di dalam user model tidak terdapat parameter password di dalam variabel fillable, sedangkan tabel user di dalam database membutuhkan inputan password untuk membuat user baru.
<br>![image](https://github.com/user-attachments/assets/5feb4dba-0468-4db8-8d6f-76d7073b513d)

<br>Tampilan pada database:
<br>![image](https://github.com/user-attachments/assets/daa72ef3-f7e4-4e9f-883a-939ff44ae65e)

7. Simpan kode program Langkah 6. Kemudian jalankan pada browser dan amati apa yang terjadi 
<br>-> Hasilnya berhasil memanggil data sesuai dengan yang parameter yang diinputkan yaitu data manager.
<br>![image](https://github.com/user-attachments/assets/78a91229-fc5e-4ac0-aab7-04d68bb685ec)

9. Simpan kode program Langkah 8. Kemudian jalankan pada browser dan amati apa yang terjadi dan cek juga pada phpMyAdmin pada tabel m_user
<br>-> Yang terjadi adalah data hanya ditampilkan di view saja dan belum tersimpan di database. 
<br>![image](https://github.com/user-attachments/assets/8760d87a-76c5-4e5b-b8d7-4f4aa70344ea)

<br>Tampilan pada database:
<br>![image](https://github.com/user-attachments/assets/daa72ef3-f7e4-4e9f-883a-939ff44ae65e)

11. Simpan kode program Langkah 9. Kemudian jalankan pada browser dan amati apa yang terjadi dan cek juga pada phpMyAdmin pada tabel m_user
<br>-> Hasilnya error karena karena di dalam user model tidak terdapat parameter password di dalam variabel fillable.
<br>![image](https://github.com/user-attachments/assets/6a7fb6ff-f6f9-4c08-b6e6-1681ed47c93b)

<br> Berikut adalah hasil setelah ditambahkan parameter password di dalam variabel fillable.
<br>![image](https://github.com/user-attachments/assets/6153793f-9c0b-4366-b887-9f2ed947e8c6)

<br>Tampilan pada database:
<br>![image](https://github.com/user-attachments/assets/b25004c1-8497-463f-8afc-a4b9f246ac73)

<br>-> Data berhasil ditampilkan dan ditambahkan ke dalam database karena ada method save().

## Praktikum 2.5
### Attribute Changes
2. Simpan kode program Langkah 1. Kemudian jalankan pada browser dan amati apa yang terjadi
<br>-> Kode tersebut menampilkan hasil false seperti berikut ini. Hal tersebut terjadi karena data yang dirubah tadi di telah save, sehingga method isDirty() menjadi false karena tidak ada perubahan lagi.
<br>![image](https://github.com/user-attachments/assets/296c8baf-2b08-4d64-a6e4-b8ea791f4303)

4. Simpan kode program Langkah 3. Kemudian jalankan pada browser dan amati apa yang terjadi
<br>-> Kode tersebut menampilkan hasil true seperti berikut ini. Hal tersebut terjadi karena data yang dirubah tadi di telah save. Berbeda dengan sebelumnya, method wasChanged() menampilkan perubahan yang terakhir kali terjadi (tidak mereset).
<br>![image](https://github.com/user-attachments/assets/0ba7f86f-7b4b-49a1-8a8d-69e649bd0227)

## Praktikum 2.6
### Create, Read, Update, Delete (CRUD)
3. Simpan kode program Langkah 1 dan 2. Kemudian jalankan pada browser dan amati apa yang terjadi
<br>-> Yang terjadi adalah menampilkan crud semua data yang dipanggil dengan method all().
<br>![image](https://github.com/user-attachments/assets/8fe4d9e1-9ac3-4a09-8bb9-adc5eadade55)

7. Simpan kode program Langkah 4 s/d 6. Kemudian jalankan pada browser dan klik link “+ Tambah User” amati apa yang terjadi
<br>-> Hanya menampilkan form tambah data, namun saat mencoba memnambahkan data masih tidak bisa, karena belum ada fungsi untuk menyimpan data di user controller.
<br>![image](https://github.com/user-attachments/assets/36249624-c6cd-4ca0-9487-1cab12e281e6)
<br>![image](https://github.com/user-attachments/assets/c80c5126-8fb2-49af-974c-99354e7025ce)

10. Simpan kode program Langkah 8 dan 9. Kemudian jalankan link pada browser dan input formnya dan simpan, kemudian amati apa yang terjadi
<br>-> Data telah berhasil ditambahkan, karena sudah ditambahkan fungsi untuk menyimpan data di user controller. (menambahkan data necha)
<br>![image](https://github.com/user-attachments/assets/aa7afd3d-c9a1-499d-9ba8-7d47c837f90c)

14. Simpan kode program Langkah 11 sd 13. Kemudian jalankan pada browser dan klik link “Ubah” amati apa yang terjadi
<br>-> Hanya menampilkan form ubah data, namun saat mencoba mengubah data masih tidak bisa, karena belum ada fungsi untuk mengubah data di user controller.
<br>![image](https://github.com/user-attachments/assets/1c1d5c3f-3ada-402a-95d4-6403bf33ef69)
<br>![image](https://github.com/user-attachments/assets/e1e55c78-9ba1-4516-9a89-f31ac979080f)

17. Simpan kode program Langkah 15 dan 16. Kemudian jalankan link pada browser dan ubah input formnya dan klik tombol ubah, kemudian amati apa yang terjadi
<br>-> Data telah berhasil diubah, karena sudah ditambahkan fungsi untuk mengubah data di user controller. (mengubah username menjadi syifa)
<br>![image](https://github.com/user-attachments/assets/10b768a1-7b03-4923-b836-ad5d39408118)

20. Simpan kode program Langkah 18 dan 19. Kemudian jalankan pada browser dan klik tombol hapus, kemudian amati apa yang terjadi
<br>-> Data berhasil dihapus. (menghapus data necha)
<br>![image](https://github.com/user-attachments/assets/7b648dde-3694-4ed8-a193-a3471c1a628d)

## Praktikum 2.7
### Relationships
3. Simpan kode program Langkah 2. Kemudian jalankan link pada browser, kemudian amati apa yang terjadi
<br>-> Menampilkan data relasi tabel user dengan tabel level dengan menggunakan Eloquent ORM
<br>![image](https://github.com/user-attachments/assets/0f01d9a7-abf2-4577-a899-56c48ad3a5e7)

6. Simpan kode program Langkah 4 dan 5. Kemudian jalankan link pada browser, kemudian amati apa yang terjadi
<br>-> Menampilkan data relasi ke dalam view user. 
<br>![image](https://github.com/user-attachments/assets/dbb116d5-e81b-4d3e-9240-e6191c3faf09)

<br>Tambah User
<br>![image](https://github.com/user-attachments/assets/52e59074-be97-46b4-97f4-f8f5b2e69049)

<br>Update User
<br>![image](https://github.com/user-attachments/assets/313a33c2-2391-4d87-af34-38d450a2ea07)


<br>Delete User
<br>![image](https://github.com/user-attachments/assets/4b13b566-82f6-445f-bd36-4d6d8a9ece4a)


















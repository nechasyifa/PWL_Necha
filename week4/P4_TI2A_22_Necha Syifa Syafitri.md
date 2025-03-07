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
   <br>-> Yang terjadi adalah
   <br>
   
4. Buat agar jumlah script pada langkah 1 bisa tampil pada halaman browser
<br>







# Laporan Praktikum Week 4 - MODEL dan ELOQUENT ORM

## Praktikum 1
### $fillable
3. Simpan kode program Langkah 1 dan 2, dan jalankan perintah web server
![image](https://github.com/user-attachments/assets/69c41b04-9f7a-4053-8da0-5b63ea4d4c80)

6. Simpan kode program Langkah 4 dan 5. Kemudian jalankan pada browser dan amati apa yang terjadi.
   -> Yang terjadi jika kolom password dihilangkan, maka akan error seperti berikut ini:
![image](https://github.com/user-attachments/assets/1b6d2538-5f12-4f4b-83fe-c5fc2493236a)

## Praktikum 2.1
### Retrieving Single Models
3. Simpan kode program Langkah 1 dan 2. Kemudian jalankan pada browser dan amati apa yang terjadi
   -> Yang terjadi adalah kode tersebut mengambil data user dengan id = 1 dari database menggunakan Eloquent ORM (UserModel::find(1)).
![image](https://github.com/user-attachments/assets/25728055-1387-4508-bd59-91188277d2a3)

5. Simpan kode program Langkah 4. Kemudian jalankan pada browser dan amati apa yang terjadi
   -> Yang terjadi sama seperti sebelumnya yaitu mengambil data user dengan id = 1. Namun, penggunaan where('level_id', 1)->first() digunakan untuk mencari berdasarkan kategori tertentu.
![image](https://github.com/user-attachments/assets/db00f24c-8e78-46c4-98e0-ba320ea409d5)

7. Simpan kode program Langkah 6. Kemudian jalankan pada browser dan amati apa yang terjadi
![image](https://github.com/user-attachments/assets/1f0c9ad7-47e0-4456-878e-dfa7b5625f23)








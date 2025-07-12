*Praktikum 1: PHP Framework (Codeigniter)*

Tujuan
1. Mahasiswa mampu memahami konsep dasar Framework.
2. Mahasiswa mampu memahami konsep dasar MVC.
3. Mahasaswa mampu membuat program sederhana menggunakan Framework Codeigniter4.
Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buat folder baru dengan nama lab11_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
   
*Langkah-langkah Praktikum*

*Persiapan*

Sebelum memulai menggunakan Framework Codeigniter, perlu dilakukan konfigurasi pada
webserver. Beberapa ekstensi PHP perlu diaktifkan untuk kebutuhan pengembangan
Codeigniter 4.

Berikut beberapa ekstensi yang perlu diaktifkan:

• php-json ekstension untuk bekerja dengan JSON;
• php-mysqlnd native driver untuk MySQL;
• php-xml ekstension untuk bekerja dengan XML;
• php-intl ekstensi untuk membuat aplikasi multibahasa;
• libcurl (opsional), jika ingin pakai Curl.

Untuk mengaktifkan ekstentsi tersebut, melalu XAMPP Control Panel, pada bagian Apache
klik Config -> PHP.ini

![image](https://github.com/user-attachments/assets/1471658a-10fc-4b95-99dd-0f099e9b368a)

Pada bagian extention, hilangkan tanda ; (titik koma) pada ekstensi yang akan diaktifkan.
Kemudian simpan kembali filenya dan restart Apache web server.

![image](https://github.com/user-attachments/assets/0ac26a31-fddf-4cb7-af96-1d27aa95ad8c)



Instalasi Codeigniter 4

Untuk melakukan instalasi Codeigniter 4 dapat dilakukan dengan dua cara, yaitu cara manual
dan menggunakan composer. Pada praktikum ini kita menggunakan cara manual.

• Unduh Codeigniter dari website https://codeigniter.com/download
• Extrak file zip Codeigniter ke direktori htdocs/lab11_ci.
• Ubah nama direktory framework-4.x.xx menjadi ci4.
• Buka browser dengan alamat http://localhost/lab11_ci/ci4/public/

![image](https://github.com/user-attachments/assets/4c0948b6-b6c8-4cc4-b1fd-5431877f9de3)


Menjalankan CLI (Command Line Interface)

Codeigniter 4 menyediakan CLI untuk mempermudah proses development. Untuk mengakses
CLI buka terminal/command prompt.

<img width="493" height="227" alt="image" src="https://github.com/user-attachments/assets/4b941d90-0a47-4f43-9405-eae67f91c018" />




Arahkan lokasi direktori sesuai dengan direktori kerja project dibuat

(xampp/htdocs/lab11_php_ci/ci4/)
Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter adalah:
php spark

<img width="752" height="458" alt="image" src="https://github.com/user-attachments/assets/48a5bf4a-c707-43fe-85aa-ad5143319302" />



Mengaktifkan Mode Debugging

Codeigniter 4 menyediakan fitur debugging untuk memudahkan developer untuk mengetahui
pesan error apabila terjadi kesalahan dalam membuat kode program.
Secara default fitur ini belum aktif. Ketika terjadi error pada aplikasi akan ditampilkan pesan
kesalahan seperti berikut.

![image](https://github.com/user-attachments/assets/f48de0f6-8a1f-446a-b0e3-8e8228c994e3)


Semua jenis error akan ditampilkan sama. Untuk memudahkan mengetahui jenis errornya,
maka perlu diaktifkan mode debugging dengan mengubah nilai konfigurasi pada environment
variable CI_ENVIRINMENT menjadi development.

![image](https://github.com/user-attachments/assets/81ddb77e-157a-4c3e-a4a4-88fa541501ce)


Ubah nama file env menjadi .env kemudian buka file tersebut dan ubah nilai variable
CI_ENVIRONMENT menjadi development.

![image](https://github.com/user-attachments/assets/e4e7888b-1d4c-449c-8cff-d7946ba1ad8b)

Contoh error yang terjadi. Untuk mencoba error tersebut, ubah kode pada file
app/Controller/Home.php hilangkan titik koma pada akhir kode.

Struktur Direktori

Untuk lebih memahami Framework Codeigniter 4 perlu mengetahui struktur direktori dan file
yang ada.
Buka pada Windows Explorer atau dari Visual Studio Code -> Open Folder.
Terdapat beberapa direktori dan file yang perlu dipahami fungsi dan kegunaannya.

• .github folder ini kita butuhkan untuk konfigurasi repo github, seperti konfigurasi untuk
build dengan github action;

• app folder ini akan berisi kode dari aplikasi yang kita kembangkan;

• public folder ini berisi file yang bisa diakses oleh publik, seperti file index.php, robots.txt,
favicon.ico, ads.txt, dll;

• tests folder ini berisi kode untuk melakukan testing dengna PHPunit;

• vendor folder ini berisi library yang dibutuhkan oleh aplikasi, isinya juga termasuk kode
core dari system CI.

• writable folder ini berisi file yang ditulis oleh aplikasi. Nantinya, kita bisa pakai untuk
menyimpan file yang di-upload, logs, session, dll.

Sedangkan file-file yang berada pada root direktori CI sebagai berikut.
• .env adalah file yang berisi variabel environment yang dibutuhkan oleh aplikasi.

• .gitignore adalah file yang berisi daftar nama file dan folder yang akan diabaikan oleh Git.

• build adalah script untuk mengubah versi codeigniter yang digunakan. Ada versi release
(stabil) dan development (labil).

• composer.json adalah file JSON yang berisi informasi tentang proyek dan daftar library
yang dibutuhkannya. File ini digunakan oleh Composer sebagai acuan.

• composer.lock adalah file yang berisi informasi versi dari libraray yang digunakan aplikasi.
• license.txt adalah file yang berisi penjelasan tentang lisensi Codeigniter;

• phpunit.xml.dist adalah file XML yang berisi konfigurasi untuk PHPunit.

• README.md adalah file keterangan tentang codebase CI. Ini biasanya akan dibutuhkan
pada repo github atau gitlab.

• spark adalah program atau script yang berfungsi untuk menjalankan server, generate kode,
dll.

![image](https://github.com/user-attachments/assets/7e2cf65f-94e6-424c-819d-6a2f673deb69)


Fokus kita pada folder app, dimana folder tersebut adalah area kerja kita untuk membuat
aplikasi. Dan folder public untuk menyimpan aset web seperti css, gambar, javascript, dll.
Memahami Konsep MVC

Codeigniter menggunakan konsep MVC. 

MVC merupakan singkatan dari Model-View-Controller. 
MVC merupakan konsep arsitektur yang umum digunakan dalam pengembangan aplikasi.
Konsep MVC adalah memisahkan kode program berdasarkan logic proses, data, dan tampilan. 
Untuk logic proses diletakkan pada direktori Contoller, Objek data diletakkan pada
direktori Model, dan desain tampilan diletakkan pada direktori View.
Codeigniter menggunakan konsep pemrograman berorientasi objek dalam mengimplementasikan konsep MVC.

Model merupakan kode program yang berisi pemodelan data. 
Data dapat berupa database ataupun sumber lainnya.
View merupakan kode program yang berisi bagian yang menangani terkait tampilan user
interface sebuah aplikasi. didalam aplikasi web biasanya pasti akan berhubungan dengan html dan css.
Controller merupakaan kode program yang berkaitan dengan logic proses yang
menghubungkan antara view dan model.
Controller berfungsi untuk menerima request dan data
dari user kemudian diproses dengan menghubungkan bagian model dan view.

Routing dan Controller

Routing merupakan proses yang mengatur arah atau rute dari request untuk menentukan
fungsi/bagian mana yang akan memproses request tersebut. Pada framework CI4, routing
bertujuan untuk menentukan Controller mana yang harus merespon sebuah request. Controller
adalah class atau script yang bertanggung jawab merespon sebuah request.
Pada Codeigniter, request yang diterima oleh file index.php akan diarahkan ke Router untuk
meudian oleh router tesebut diarahkan ke Controller.
Router terletak pada file app/config/Routes.php

![image](https://github.com/user-attachments/assets/1e89abf4-820f-4ef2-82ba-654df3ce9041)


Pada file tersebut kita dapat mendefinisikan route untuk aplikasi yang kita buat.

Membuat Route Baru.

Tambahkan kode berikut di dalam Routes.php

![image](https://github.com/user-attachments/assets/233d69c5-35cf-4cde-8b02-c8146dab9bce)


Untuk mengetahui route yang ditambahkan sudah benar, buka CLI dan jalankan perintah
berikut.

![image](https://github.com/user-attachments/assets/237de081-fa83-48fe-b592-67a79059560f)


![image](https://github.com/user-attachments/assets/44bfede1-f9ae-46e0-b960-2f6be3d21fdc)



Selanjutnya coba akses route yang telah dibuat dengan mengakses alamat url
http://localhost:8080/about

![image](https://github.com/user-attachments/assets/66c9c69f-bfa0-4f51-ab6f-4674284b4284)


Ketika diakses akan mucul tampilan error 404 file not found, itu artinya file/page tersebut tidak
ada. Untuk dapat mengakses halaman tersebut, harus dibuat terlebih dahulu Contoller yang
sesuai dengan routing yang dibuat yaitu Contoller Page.
Membuat Controller
Selanjutnya adalah membuat Controller Page. Buat file baru dengan nama page.php pada
direktori Controller kemudian isi kodenya seperti berikut.

![image](https://github.com/user-attachments/assets/0555dff0-6981-4c06-96d0-be8bfea15c8a)


Selanjutnya refresh Kembali browser, maka akan ditampilkan hasilnya yaotu halaman sudah
dapat diakses.

![image](https://github.com/user-attachments/assets/156444e3-ba8e-48b6-b0b7-398dcd7a3781)

Auto Routing
Secara default fitur autoroute pada Codeiginiter sudah aktif. Untuk mengubah status autoroute
dapat mengubah nilai variabelnya. Untuk menonaktifkan ubah nilai true menjadi false.

![image](https://github.com/user-attachments/assets/cb52b1ae-dc90-4d72-81d6-291cb541d837)

Tambahkan method baru pada Controller Page seperti berikut.

![image](https://github.com/user-attachments/assets/d522985e-7adc-4543-88c8-4f196fd500e8)


Membuat View
Selanjutnya adalam membuat view untuk tampilan web agar lebih menarik. Buat file baru
dengan nama about.php pada direktori view (app/view/about.php) kemudian isi kodenya
seperti berikut.

![image](https://github.com/user-attachments/assets/63af2b16-728d-44b2-b005-424544d6ead8)


Ubah method about pada class Controller Page menjadi seperti berikut:

![image](https://github.com/user-attachments/assets/f2a5d768-5d8e-430f-beef-58d5e7421278)

Kemudian lakukan refresh pada halaman tersebut.

![image](https://github.com/user-attachments/assets/6891d6d3-d19f-4b3b-9679-5375cfbf3ba2)

Membuat Layout Web dengan CSS

Pada dasarnya layout web dengan css dapat diimplamentasikan dengan mudah pada
codeigniter. Yang perlu diketahui adalah, pada Codeigniter 4 file yang menyimpan asset css
dan javascript terletak pada direktori public.
Buat file css pada direktori public dengan nama style.css (copy file dari praktikum
lab4_layout. Kita akan gunakan layout yang pernah dibuat pada praktikum 4.

![image](https://github.com/user-attachments/assets/3f3ecd05-9395-423b-8833-be50dc0a3807)


Kemudian buat folder template pada direktori view kemudian buat file header.php dan
footer.php
File app/view/template/header.php

![image](https://github.com/user-attachments/assets/f088de18-4493-412c-be74-5297d75830d5)



File app/view/template/footer.php

![image](https://github.com/user-attachments/assets/bdafacd5-06a8-4ca4-b964-1c5c53df8a5a)


Kemudian ubah file app/view/about.php seperti berikut.

![image](https://github.com/user-attachments/assets/87a5c08e-5c30-4b35-aa18-797759a5aa52)


Selanjutnya refresh tampilan pada alamat http://localhost:8080/about

![image](https://github.com/user-attachments/assets/fb4c7ee1-fcda-4f27-8ff6-61843d9a5fe1)


*Pertanyaan dan Tugas*
Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua
link pada navigasi header dapat menampilkan tampilan dengan layout yang sama.

*Laporan Praktikum*
1. Buatlah repository baru dengan nama Lab7Web.
2. Kerjakan semua latihan yang diberikan sesuai urutannya.
3. Screenshot setiap perubahannya.
4. Buatlah file README.md dan tuliskan penjelasan dari setiap langkah praktikum beserta
screenshotnya.
5. Commit hasilnya pada repository masing-masing.
6. Kirim URL repository pada e-learning ecampus

---
---

*Praktikum 2: Framework Lanjutan (CRUD)*

Tujuan
1. Mahasiswa mampu memahami konsep dasar Model.
2. Mahasiswa mampu memahami konsep dasar CRUD.
3. Mahasaswa mampu membuat program sederhana menggunakan Framework Codeigniter4.
Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
Langkah-langkah Praktikum
Persiapan.
Untuk memulai membuat aplikasi CRUD sederhana, yang perlu disiapkan adalah database
server menggunakan MySQL. Pastikan MySQL Server sudah dapat dijalankan melalui
XAMPP.
Membuat Database: Studi Kasus Data Artikel
CREATE DATABASE lab_ci4;

![image](https://github.com/user-attachments/assets/ac5427bd-dece-45a7-b002-a80a89030ccd)


Konfigurasi koneksi database
Selanjutnya membuat konfigurasi untuk menghubungkan dengan database server. Konfigurasi
dapat dilakukan dengan du acara, yaitu pada file app/config/database.php atau menggunakan
file .env. Pada praktikum ini kita gunakan konfigurasi pada file .env.
 
![image](https://github.com/user-attachments/assets/d260fd01-ef10-4fae-9c15-a19d83faf166)


Membuat Model
Selanjutnya adalah membuat Model untuk memproses data Artikel. Buat file baru pada
direktori app/Models dengan nama ArtikelModel.php

![image](https://github.com/user-attachments/assets/1f660298-f298-443f-a8bb-539fe46fc020)


Membuat Controller
Buat Controller baru dengan nama Artikel.php pada direktori app/Controllers.

![image](https://github.com/user-attachments/assets/f625b8a5-baca-4558-8438-7f464523bbaf)


Membuat View
Buat direktori baru dengan nama artikel pada direktori app/views, kemudian buat file baru
dengan nama index.php.

![image](https://github.com/user-attachments/assets/c3c9b37d-cf83-4cfd-95f2-184a6400e936)


Selanjutnya buka browser kembali, dengan mengakses url http://localhost:8080/artikel

![image](https://github.com/user-attachments/assets/790b96f8-3d62-4aad-99b9-34f9e6d2bae3)


Belum ada data yang diampilkan. Kemudian coba tambahkan beberapa data pada database agar
dapat ditampilkan datanya.

![image](https://github.com/user-attachments/assets/d65b118d-7e7b-4593-a109-0d052376009d)


Refresh kembali browser, sehingga akan ditampilkan hasilnya.

![image](https://github.com/user-attachments/assets/8cca29ca-77cd-4c9d-bcc1-da914e521aa2)


Membuat Tampilan Detail Artikel
Tampilan pada saat judul berita di klik maka akan diarahkan ke halaman yang berbeda.
Tambahkan fungsi baru pada Controller Artikel dengan nama view().

![image](https://github.com/user-attachments/assets/763f1913-9b6a-49bd-b757-b81b49104203)


Membuat View Detail
Buat view baru untuk halaman detail dengan nama app/views/artikel/detail.php.

 ![image](https://github.com/user-attachments/assets/52d8a4ca-f40c-4673-9be2-014982564fcf)


Membuat Routing untuk artikel detail
Buka Kembali file app/config/Routes.php, kemudian tambahkan routing untuk artikel detail.
 
![image](https://github.com/user-attachments/assets/6d0ee55d-49cb-4e6c-b0a3-455c2e0a3ed0)


![image](https://github.com/user-attachments/assets/da271a2b-8077-4303-9d0d-a5922bf5c98a)



![image](https://github.com/user-attachments/assets/3dfb7e59-02d4-43ee-b799-f1a37062fbcf)


Membuat Menu Admin
Menu admin adalah untuk proses CRUD data artikel. Buat method baru pada Controller
Artikel dengan nama admin_index().

 ![image](https://github.com/user-attachments/assets/1806c0f0-2092-48b5-907d-b3e44ae45aba)


Selanjutnya buat view untuk tampilan admin dengan nama admin_index.php

 ![image](https://github.com/user-attachments/assets/22469552-0204-4e85-8e53-80b8ae9a967c)


Tambahkan routing untuk menu admin seperti berikut:
 
![image](https://github.com/user-attachments/assets/63e4e5b0-2232-4771-b41f-0d06c42cc564)


Akses menu admin dengan url http://localhost:8080/admin/artikel

![image](https://github.com/user-attachments/assets/cdf93297-52e9-4bf3-874c-2d433cd98dbe)


Menambah Data Artikel
Tambahkan fungsi/method baru pada Controller Artikel dengan nama add().

 ![image](https://github.com/user-attachments/assets/eb5ea5c0-6dc6-4a1a-9add-64cca00fdcae)


Kemudian buat view untuk form tambah dengan nama form_add.php
 
 ![image](https://github.com/user-attachments/assets/f2e64661-2f10-4776-8b3d-16fc41b11190)


Lihat hasil outputnya.

![image](https://github.com/user-attachments/assets/1ceb3311-2d2e-4d7e-aff3-f70ec2912cc8)


Mengubah Data
Tambahkan fungsi/method baru pada Controller Artikel dengan nama edit().
 
![image](https://github.com/user-attachments/assets/5fbe8cf9-c700-4b42-a797-e027353493d9)
)

Menghapus Data
Tambahkan fungsi/method baru pada Controller Artikel dengan nama delete().
![image](https://github.com/user-attachments/assets/288e1d55-a300-417e-a35c-a790c9f25071)


*Pertanyaan dan Tugas*

Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan improvisasi.

Laporan Praktikum
1. Melanjutkan praktikum sebelumnya pada repository dengan nama Lab7Web.
2. Kerjakan semua latihan yang diberikan sesuai urutannya.
3. Screenshot setiap perubahannya.
4. Update file README.md dan tuliskan penjelasan dari setiap langkah praktikum beserta
screenshotnya.
5. Commit hasilnya pada repository masing-masing.
6. Kirim URL repository pada e-learning ecampus

---

---

*Praktikum 3: View Layout dan View Cell*

Tujuan
Setelah menyelesaikan praktikum ini, mahasiswa diharapkan dapat:
1. Memahami konsep View Layout di CodeIgniter 4.
2. Menggunakan View Layout untuk membuat template tampilan.
3. Memahami dan mengimplementasikan View Cell dalam CodeIgniter 4.
4. Menggunakan View Cell untuk memanggil komponen UI secara modular.
   
Instruksi Praktikum

1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
   
Langkah-langkah Praktikum
Persiapan.

Pada praktikum sebelumnya kita telah menggunakan template layout dengan konsep parsial atau memecah bagian template menjadi beberapa bagian untuk kemudian di include pada view yang lain.
Praktikum kali ini kita akan mengunakan konsep View Layout dan View Cell untuk memudahkan dalam penggunaan layout.

Membuat Layout Utama
Buat folder layout di dalam app/Views/
Buat file main.php di dalam folder layout dengan kode berikut

![image](https://github.com/user-attachments/assets/6b0324a9-3518-46da-95f5-c8081633ce06)


Modifikasi File View
Ubah app/Views/home.php agar sesuai dengan layout baru:

![image](https://github.com/user-attachments/assets/6c22129a-31a4-4414-901b-9924130ab685)


Sesuaikan juga untuk halaman lainnya yang ingin menggunakan format layout yang baru

Menampilkan Data Dinamis dengan View Cell
View Cell adalah fitur yang memungkinkan pemanggilan tampilan dalam bentuk komponen
yang dapat digunakan ulang. Cocok digunakan untuk elemen-elemen yang sering muncul di
berbagai halaman seperti sidebar, widget, atau menu navigasi.

Membuat Class View Cell
Buat folder Cells di dalam app/
Buat file ArtikelTerkini.php di dalam app/Cells/ dengan kode berikut:

![image](https://github.com/user-attachments/assets/575a12b1-e4d1-4671-98c7-c267600ec1a3)


Membuat View untuk View Cell
Buat folder components di dalam app/Views/
Buat file artikel_terkini.php di dalam app/Views/components/ dengan kode berikut

![image](https://github.com/user-attachments/assets/b86b7838-8429-45e7-b754-d798bc7e7ea9)



*Pertanyaan Dan Tugas*

• Sesuaikan data dengan praktikum sebelumnya, perlu melakukan perubahan field pada
database dengan menambahkan tanggal agar dapat mengambil data artikel terbaru.

• Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan
improvisasi.

• Apa manfaat utama dari penggunaan View Layout dalam pengembangan aplikasi?
View Layout adalah fondasi penting dalam desain UI aplikasi karena memastikan antarmuka terstruktur, adaptif, dan mudah dirawat, yang pada akhirnya meningkatkan kualitas dan pengalaman pengguna aplikasi.

• Jelaskan perbedaan antara View Cell dan View biasa.
View: Komponen UI biasa (seperti Label, Button, dll.) digunakan langsung dalam layout.

ViewCell: Wadah khusus untuk View, digunakan dalam list (seperti ListView) untuk menampilkan item data.

Kesimpulan:
View = untuk tampilan umum.
ViewCell = untuk tampilan item dalam daftar.

• Ubah View Cell agar hanya menampilkan post dengan kategori tertentu.



Laporan Praktikum
1. Melanjutkan praktikum sebelumnya pada repository dengan nama Lab7Web.
2. Kerjakan semua latihan yang diberikan sesuai urutannya.
3. Screenshot setiap perubahannya.
4. Update file README.md dan tuliskan penjelasan dari setiap langkah praktikum beserta
screenshotnya.
5. Commit hasilnya pada repository masing-masing.
6. Kirim URL repository pada e-learning ecampus

---

---

*Praktikum 4: Framework Lanjutan (Modul Login)*

Tujuan

1. Mahasiswa mampu memahami konsep dasar Auth dan Filter.
2. Mahasiswa mampu memahami konsep dasar Login System.
3. Mahasaswa mampu membuat modul login menggunakan Framework Codeigniter 4.
   
Instruksi Praktikum

1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
   
Langkah-langkah Praktikum
Persiapan.

Untuk memulai membuat modul Login, yang perlu disiapkan adalah database server
menggunakan MySQL. Pastikan MySQL Server sudah dapat dijalankan melalui XAMPP.
Membuat Tabel: User Login
![image](https://github.com/user-attachments/assets/2514d6c6-9372-420e-b1cf-84d9bb736a93)

Membuat Tabel User

![image](https://github.com/user-attachments/assets/36ed2f2a-6d98-4e3c-bfb5-4c84054b3141)

Membuat Model User

![image](https://github.com/user-attachments/assets/27040a0a-d955-44a3-ae01-6e3bc339cd43)

Selanjutnya adalah membuat Model untuk memproses data Login. Buat file baru pada direktori
app/Models dengan nama UserModel.php
 
Membuat Controller User

Buat Controller baru dengan nama User.php pada direktori app/Controllers. Kemudian
tambahkan method index() untuk menampilkan daftar user, dan method login() untuk proses
login.

 ![image](https://github.com/user-attachments/assets/b2d6025c-bcc6-4bb2-8080-d5ddb2b8693b)

Membuat View Login

Buat direktori baru dengan nama user pada direktori app/views, kemudian buat file baru dengan nama login.php.

 ![image](https://github.com/user-attachments/assets/6db59224-a52c-4778-9ec0-917368ad870f)

Membuat Database Seeder

Database seeder digunakan untuk membuat data dummy. Untuk keperluan ujicoba modul
login, kita perlu memasukkan data user dan password kedaalam database.
Untuk itu buat database seeder untuk tabel user.
Buka CLI, kemudian tulis perintah berikut:

 ![image](https://github.com/user-attachments/assets/dac8b9db-68be-4c25-91ea-bf5f8f47c90f)

Selanjutnya, buka file UserSeeder.php yang berada di lokasi direktori
/app/Database/Seeds/UserSeeder.php kemudian isi dengan kode berikut:

 ![image](https://github.com/user-attachments/assets/7255734e-0f75-4e29-8cdd-8e80350fa23f)

Selanjutnya buka kembali CLI dan ketik perintah berikut:

 ![image](https://github.com/user-attachments/assets/72024936-42b5-4000-8378-c31125917478)

Uji Coba Login
Selanjutnya buka url http://localhost:8080/user/login seperti berikut:
 
![image](https://github.com/user-attachments/assets/62cdf579-ba73-457a-8cdb-da1ea490cafb)


Menambahkan Auth Filter
Selanjutnya membuat filer untuk halaman admin. Buat file baru dengan nama Auth.php pada
direktori app/Filters.

 ![image](https://github.com/user-attachments/assets/9eb64fc1-2f1e-4869-84a8-a65b883e2912)

Selanjutnya buka file app/Config/Filters.php tambahkan kode berikut:
 
 ![image](https://github.com/user-attachments/assets/7f74fbd0-b067-49fa-ad11-0669f0dfba92)

![image](https://github.com/user-attachments/assets/649b1396-017a-4298-94ca-c1c66814e2cb)

Selanjutnya buka file app/Config/Routes.php dan sesuaikan kodenya.

 ![image](https://github.com/user-attachments/assets/1ccfec77-fd2b-44a8-9f95-39baabc84381)

Percobaan Akses Menu Admin

Buka url dengan alamat http://localhost:8080/admin/artikel ketika alamat tersebut diakses
maka, akan dimuculkan halaman login.
 
![image](https://github.com/user-attachments/assets/8ce2e976-83e1-4c7d-b406-5b78f0e7cc63)

Fungsi Logout

![image](https://github.com/user-attachments/assets/bb3174ae-a4f9-42eb-8cfa-24b6379f3593)

Tambahkan method logout pada Controller User seperti berikut:
 
*Pertanyaan dan Tugas*

Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan improvisasi.

Laporan Praktikum

1. Melanjutkan praktikum sebelumnya pada repository dengan nama Lab7Web.
2. Kerjakan semua latihan yang diberikan sesuai urutannya.
3. Screenshot setiap perubahannya.
4. Update file README.md dan tuliskan penjelasan dari setiap langkah praktikum beserta
screenshotnya.
5. Commit hasilnya pada repository masing-masing.
6. Kirim URL repository pada e-learning ecampus

---

---

*Praktikum 5: Pagination dan Pencarian*

Tujuan

1. Mahasiswa mampu memahami konsep dasar Pagination.
2. Mahasiswa mampu memahami konsep dasar Pencarian.
3. Mahasaswa mampu membuat Paging dan Pencarian menggunakan Framework
Codeigniter 4.
Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
Langkah-langkah Praktikum
Membuat Pagination
Pagination merupakan proses yang digunakan untuk membatasi tampilan yang panjang
dari data yang banyak pada sebuah website. Fungsi pagination adalah memecah tampilan
menjadi beberapa halaman tergantung banyaknya data yang akan ditampilkan pada
setiap halaman.
Pada Codeigniter 4, fungsi pagination sudah tersedia pada Library sehingga cukup mudah
menggunakannya.
Untuk membuat pagination, buka Kembali Controller Artikel, kemudian modifikasi kode
pada method admin_index seperti berikut.

 ![image](https://github.com/user-attachments/assets/15572fc6-b465-4816-96d5-18468a33e370)

Kemudian buka file views/artikel/admin_index.php dan tambahkan kode berikut
dibawah deklarasi tabel data.

 ![image](https://github.com/user-attachments/assets/efb35ad5-a14f-42fa-b2b3-b797dc50da3a)

Selanjutnya buka kembali menu daftar artikel, tambahkan data lagi untuk melihat
hasilnya.

 ![image](https://github.com/user-attachments/assets/89d51c47-3409-4a01-83e2-9bb74f85057b)

Membuat Pencarian

Pencarian data digunakan untuk memfilter data.
Untuk membuat pencarian data, buka kembali Controller Artikel, pada method
admin_index ubah kodenya seperti berikut:

 ![image](https://github.com/user-attachments/assets/ed718436-eda2-4463-ae45-3ad23d579d4c)

Kemudian buka kembali file views/artikel/admin_index.php dan tambahkan form
pencarian sebelum deklarasi tabel seperti berikut:

 ![image](https://github.com/user-attachments/assets/042768c8-ebda-4c9f-a30c-19eaea87798b)

Dan pada link pager ubah seperti berikut.

 ![image](https://github.com/user-attachments/assets/8ad20e41-087a-4e3e-b442-c0f74a25f64c)

Selanjutnya ujicoba dengan membuka kembali halaman admin artikel, masukkan kata
kunci tertentu pada form pencarian.

 ![image](https://github.com/user-attachments/assets/a9fc5dc6-b645-4b30-ac2a-1b73392fb9c1)

*Pertanyaan dan Tugas*

Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan
improvisasi.

Laporan Praktikum

1. Melanjutkan praktikum sebelumnya pada repository dengan nama Lab7Web.
2. Kerjakan semua latihan yang diberikan sesuai urutannya.
3. Screenshot setiap perubahannya.
4. Update file README.md dan tuliskan penjelasan dari setiap langkah praktikum
beserta screenshotnya.
5. Commit hasilnya pada repository masing-masing.
6. Kirim URL repository pada e-learning ecampus

---

---

*Praktikum 6: Upload File Gambar*

Tujuan

1. Mahasiswa mampu memahami konsep dasar File Upload.
2. Mahasaswa mampu membuat File Upload menggunakan Framework Codeigniter 4.
Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
Langkah-langkah Praktikum
Upload Gambar pada Artikel
Menambahkan fungsi unggah gambar pada tambah artikel.
Buka kembali Controller Artikel pada project sebelumnya, sesuaikan kode pada method
add seperti berikut:

 ![image](https://github.com/user-attachments/assets/0523bb8b-3238-4760-9c64-110a1910ab7f)

Kemudian pada file views/artikel/form_add.php tambahkan field input file seperti
berikut.

 ![image](https://github.com/user-attachments/assets/e4e5b012-9ccc-42c9-bd90-02af216f1b3e)

Dan sesuaikan tag form dengan menambahkan ecrypt type seperti berikut.

 ![image](https://github.com/user-attachments/assets/0e8756e1-5db7-4a91-88cb-83271ec76d07)

Ujicoba file upload dengan mengakses menu tambah artikel.

 ![image](https://github.com/user-attachments/assets/5684a6c8-3427-431d-b8c4-0ac1da237677)

Pertanyaan dan Tugas

Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan
improvisasi.

Laporan Praktikum

1. Melanjutkan praktikum sebelumnya pada repository dengan nama Lab11Web.
2. Kerjakan semua latihan yang diberikan sesuai urutannya.
3. Screenshot setiap perubahannya.
4. Update file README.md dan tuliskan penjelasan dari setiap langkah praktikum
beserta screenshotnya.
5. Commit hasilnya pada repository masing-masing.
6. Kirim URL repository pada e-learning ecampus

---

---

*Praktikum 7: Relasi Tabel dan Query Builder*

Tujuan

1. Mahasiswa mampu memahami konsep relasi antar tabel dalam database.
2. Mahasiswa mampu mengimplementasikan relasi One-to-Many.
3. Mahasiswa mampu melakukan query dengan join tabel menggunakan Query Builder.
4. Mahasiswa mampu menampilkan data dari tabel yang berelasi.
   
Instruksi Praktikum

1. Persiapkan text editor (VSCode).
2. Buka kembali folder proyek lab7_php_ci.
3. Ikuti langkah-langkah praktikum berikut:
   
Relasi Tabel dan Query Builder
Praktikum ini merupakan kelanjutan dari praktikum sebelumnya, dimana kita akan
memperdalam pemahaman tentang Model, Relasi Tabel dan Joining, serta penggunaan Query Builder dalam CodeIgniter 4.

• Model: Dalam CodeIgniter, Model adalah bagian dari arsitektur MVC (Model-View-
Controller) yang bertugas untuk berinteraksi dengan database. Model menyediakan cara

untuk mengambil, menyimpan, mengubah, dan menghapus data dari database.
• Relasi Tabel: Relasi tabel digunakan untuk menghubungkan data antar tabel dalam
database. Dalam praktikum ini, kita akan fokus pada relasi One-to-Many, di mana satu kategori dapat memiliki banyak artikel.

• Query Builder: Query Builder adalah fitur yang disediakan oleh CodeIgniter untuk
membuat query database dengan cara yang lebih mudah dan aman. Dengan Query Builder,
kita dapat melakukan join tabel, memfilter data, dan mengurutkan hasil tanpa harus menulis query SQL secara manual. Dengan memahami konsep-konsep ini, Anda akan mampu membangun aplikasi web yang lebih kompleks dan efisien.

Langkah-langkah Praktikum
1. Persiapan
   
Pastikan MySQL Server sudah berjalan, dan buka database `lab_ci4

2. Membuat Tabel Kategori
Kita akan membuat tabel baru bernama kategori untuk mengkategorikan artikel.
Struktur Tabel kategori:

 ![image](https://github.com/user-attachments/assets/45b41d8c-beb9-42d7-9b92-dd43a11875bb)

Jalankan query berikut:

 ![image](https://github.com/user-attachments/assets/60625592-3180-454c-90ed-1714dbb9a87e)

3. Mengubah Tabel Artikel
Tambahkan foreign key id_kategori pada tabel artikel untuk membuat relasi dengan tabel
kategori.
Query untuk menambahkan foreign key:

 ![image](https://github.com/user-attachments/assets/af669284-5981-4d60-b2e2-714a44540015)

4. Membuat Model Kategori
Buat file model baru di app/Models dengan nama KategoriModel.php:

 ![image](https://github.com/user-attachments/assets/dd38d233-4d15-417e-a3a7-88c111c59965)

5. Memodifikasi Model Artikel
Modifikasi ArtikelModel.php untuk mendefinisikan relasi dengan KategoriModel:

 ![image](https://github.com/user-attachments/assets/ca640741-124d-40e7-a75f-fac7ab10702d)

Menambahkan method getArtikelDenganKategori() untuk mengambil data artikel beserta
nama kategorinya menggunakan join.
6. Memodifikasi Controller Artikel
Modifikasi Artikel.php untuk menggunakan model baru dan menampilkan data relasi:

 ![image](https://github.com/user-attachments/assets/928a0b90-3c86-4cc2-b5b7-539b03f29dcd)

7. Memodifikasi View
Buka folder view/artikel sesuaikan masing-masing view.
index.php

 ![image](https://github.com/user-attachments/assets/365a427e-69c1-497b-be1c-05bdcba18712)

admin_index.php

 ![image](https://github.com/user-attachments/assets/b50b139e-a580-48f9-9bd5-bed5e5f33267)

form_add.php

 ![image](https://github.com/user-attachments/assets/896fb81d-c8b5-48bd-a2b9-7c43568599b1)

form_edit.php

 ![image](https://github.com/user-attachments/assets/2edba617-3baf-4448-9de0-8114f38605b6)

8. Testing
Lakukan uji coba untuk memastikan semua fungsi berjalan dengan baik:
• Menampilkan daftar artikel dengan nama kategori.
• Menambah artikel baru dengan memilih kategori.
• Mengedit artikel dan mengubah kategorinya.
• Menghapus artikel.

1.	Tampilan daftar artikel dengan nama kategori.

 ![image](https://github.com/user-attachments/assets/8f3e1dc7-770e-45a7-83b9-36fcfc93cc10)

2.	Menambah artikel baru dengan memilih kategori.

![image](https://github.com/user-attachments/assets/349c577a-01fe-4501-a6a3-73b88e3f94d6)

3.	Mengedit artikel dan mengubah kategorinya.

 ![image](https://github.com/user-attachments/assets/08abf016-071b-4f89-be9e-7c89bc73acf1)

4.	Menghapus artikel.
 


*Pertanyaan dan Tugas*

1. Selesaikan semua langkah praktikum di atas.
2. Modifikasi tampilan detail artikel (artikel/detail.php) untuk menampilkan nama kategori
artikel.
3. Tambahkan fitur untuk menampilkan daftar kategori di halaman depan (opsional).
4. Buat fungsi untuk menampilkan artikel berdasarkan kategori tertentu (opsional).

Laporan Praktikum

1. Lanjutkan praktikum pada repository Lab7Web.
2. Kerjakan semua latihan sesuai urutan.
3. Screenshot setiap perubahan.
4. Update file README.md dengan penjelasan dan screenshot.
5. Commit hasil praktikum.
6. Kirim URL repository.

---

---

*Praktikum 8: AJAX*

Tujuan

1. Memahami konsep AJAX dan cara kerjanya.
2. Mampu mengimplementasikan AJAX pada aplikasi web dengan CodeIgniter 4.
3. Melatih kemampuan problem solving dan debugging.
   
Instruksi Praktikum

1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
   
Apa itu AJAX?

AJAX merupakan singkatan dari Asynchronous JavaScript and XML. Meskipun
kepanjangannya menyebutkan XML, pada praktiknya AJAX tidak terbatas pada
penggunaan XML saja. AJAX adalah kumpulan teknik pengembangan web yang
memungkinkan aplikasi web bekerja secara asynchronous (tidak langsung).
Dengan kata lain, AJAX memungkinkan aplikasi web untuk memperbarui dan
menampilkan data dari server tanpa harus melakukan reload halaman secara
keseluruhan. Hal ini membuat aplikasi web terasa lebih responsif dan dinamis.

Cara Kerja AJAX

AJAX bekerja dengan cara berikut:

1. Event Trigger:
Pengguna melakukan suatu aksi di halaman web, misalnya menekan tombol atau
mengetikkan sesuatu pada formulir.

3. Request Dikirim:
JavaScript di browser akan membuat request HTTP ke server. Request ini biasanya
berupa request GET atau POST, dan bisa membawa data tambahan jika diperlukan.

4. Server Memproses Request:
   
Server menerima request dan memprosesnya sesuai dengan kebutuhan. Server bisa
mengambil data dari database, melakukan kalkulasi tertentu, atau melakukan aksi
lainnya.

5. Respon Dikembalikan:
   
Server mengirimkan respon kembali ke browser. Respon ini biasanya berupa data
dalam format JSON (JavaScript Object Notation) atau format lainnya.

6. Data Ditampilkan:
   
JavaScript di browser menerima respon dari server. JavaScript kemudian memproses
data tersebut dan memperbarui bagian tertentu dari halaman web tanpa perlu
melakukan reload keseluruhan.

Keuntungan menggunakan AJAX:

• Meningkatkan User Experience (UX): Hal ini karena halaman web tidak perlu
dimuat ulang setiap kali ada interaksi pengguna, sehingga membuat aplikasi web
terasa lebih responsif dan dinamis.

• Menghemat Bandwidth: Hanya data yang dibutuhkan yang dikirimkan antara
browser dan server, sehingga menghemat bandwidth dan mempercepat loading
halaman.

• Mempertahankan State Aplikasi: Dengan AJAX, state aplikasi (misalnya data yang
sedang diedit) bisa dipertahankan walaupun halaman tidak di-reload.

Contoh Penggunaan AJAX:

• Live chat applications

• Autocomplete suggestions

• Real-time updates (misalnya pada papan skor pertandingan olahraga)

• Validasi formulir secara real-time

• Dan masih banyak lagi
Dengan memahami konsep dan cara kerja AJAX, Anda dapat membuat aplikasi web yang
lebih interaktif dan menarik bagi pengguna.

Langkah-langkah Praktikum

Persiapan

Buka Kembali project sebelumnya, kemudian kita tambahkan Pustaka yang dibutuhkan
pada project tersebut.

Menambahkan Pustaka jQuery.

Kita akan menggunakan pustaka jQuery untuk mempermudah proses AJAX. Download
pustaka jQuery versi terbaru dari https://jquery.com dan ekstrak filenya.

Salin file jquery-3.6.0.min.js ke folder public/assets/js.

Membuat Model.

Pada modul sebelumnya sudah dibuat ArtikelModel, pada modul ini kita akan
memanfaatkan model tersebut agar dapat diakses melalui AJAX.

Membuat AJAX Controller

![image](https://github.com/user-attachments/assets/af3bc43d-ff00-4fab-9c14-26fff09057c9)


Membuat View

 ![image](https://github.com/user-attachments/assets/17894dd1-5346-49fc-84b1-7f47b75f688c)

ajax_list.php

![image](https://github.com/user-attachments/assets/afb14103-bfcc-4460-a498-cdc464c1b653)

*Pertanyaan dan Tugas*

Selesaikan programnya sesuai Langkah-langkah yang ada. Tambahkan fungsi untuk
tambah dan ubah data. Anda boleh melakukan improvisasi.

Laporan Praktikum

1. Melanjutkan praktikum sebelumnya pada repository dengan nama Lab7Web.
2. Kerjakan semua latihan yang diberikan sesuai urutannya.
3. Screenshot setiap perubahannya.
4. Update file README.md dan tuliskan penjelasan dari setiap langkah praktikum
beserta screenshotnya.
5. Commit hasilnya pada repository masing-masing.
6. Kirim URL repository pada e-learning ecampus

---

---

*Praktikum 9: Implementasi AJAX Pagination dan Search*

Tujuan

1. Mahasiswa mampu memahami konsep dasar AJAX untuk pagination dan search.
2. Mahasiswa mampu mengimplementasikan pagination dan search menggunakan AJAX
dalam CodeIgniter 4.
3. Mahasiswa mampu meningkatkan performa dan User Experience (UX) aplikasi web.
   
Instruksi Praktikum

1. Persiapkan text editor (VSCode).
2. Buka kembali folder proyek lab7_php_ci.
3. Ikuti langkah-langkah praktikum berikut.
Langkah-langkah Praktikum

1. Persiapan
   
* Pastikan MySQL Server sudah berjalan.
* Buka database lab_ci4.
* Pastikan tabel artikel dan kategori sudah ada dan terisi data.
* Pastikan library jQuery sudah terpasang atau dapat diakses melalui CDN.
  
2. Modifikasi Controller Artikel
  
Ubah method admin_index() di Artikel.php untuk mengembalikan data dalam format
JSON jika request adalah AJAX. (Sama seperti modul sebelumnya)

 ![image](https://github.com/user-attachments/assets/bc13c92b-dadd-4af5-bc4c-92a4ae982bec)

3. Modifikasi View (admin_index.php)
   
* Ubah view admin_index.php untuk menggunakan jQuery.
* Hapus kode yang menampilkan tabel artikel dan pagination secara langsung.
* Tambahkan elemen untuk menampilkan data artikel dan pagination dari AJAX.
* Tambahkan kode jQuery untuk melakukan request AJAX.

 ![image](https://github.com/user-attachments/assets/d43b2585-812c-487d-8d74-df60a6806f5c)

*Pertanyaan dan Tugas*

1. Selesaikan semua langkah praktikum di atas.
2. Modifikasi tampilan data artikel dan pagination sesuai kebutuhan desain.
3. Tambahkan indikator loading saat data sedang diambil dari server.
4. Implementasikan fitur sorting (mengurutkan artikel berdasarkan judul, dll.) dengan AJAX.
   
Laporan Praktikum

1. Lanjutkan praktikum pada repository Lab7Web.
2. Kerjakan semua latihan sesuai urutan.
3. Screenshot setiap perubahan dan hasil uji coba.
4. Update file README.md dengan penjelasan dan screenshot.
5. Commit hasil praktikum.
6. Kirim URL repository.

---

---

Praktikum 10: API

Tujuan

1. Mahasiswa mampu memahami konsep dasar API.
2. Mahasiswa mampu memahami konsep dasar RESTFull.
3. Mahasaswa mampu membuat API menggunakan Framework Codeigniter 4.
   
Instruksi Praktikum

1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
4. 
Apa itu REST API?

Representational State Transfer (REST) adalah salah satu desain arsitektur Application
Programming Interface (API). API sendiri merupakan interface yang menjadi perantara
yang menghubungkan satu aplikasi dengan aplikasi lainnya.

REST API berisi aturan untuk membuat web service dengan membatasi hak akses client
yang mengakses API. Kenapa harus demikian? Jika dianalogikan sebagai restoran, REST API adalah daftar menu. Pelanggan hanya bisa
memesan sesuai daftar menu meskipun si koki (server) bisa membuatkan pesanan tersebut.

REST API bisa diakses atau dihubungkan dengan aplikasi lain. Oleh sebab itu, pembatasan
dilakukan untuk melindungi database/resource yang ada di server.

Cara kerja REST API menggunakan prinsip REST Server dan REST Client.
REST Server bertindak sebagai penyedia data/resource, sedangkan REST Client akan
membuat HTTP request pada server dengan URI atau global ID. Nantinya, server akan
memberikan response dengan mengirim kembali HTTP request yang diminta client.
Nah, data yang dikirim maupun diterima ini biasanya berformat JSON. Itulah kenapa REST
API mudah diintegrasikan dengan berbagai platform dengan bahasa pemrograman
ataupun framework yang berbeda.
Misalnya, Anda membuat backend project menggunakan REST API dengan bahasa
pemrograman PHP. Nantinya, REST API tersebut bisa dihubungkan dengan frontend yang
menggunakan Vue js.
Pengembangan aplikasi tentu lebih cepat dan efisien, kan? Apalagi, cara membuat REST
API juga mudah. Anda bisa menggunakan framework PHP seperti CodeIgniter.
Kebetulan, di artikel ini kami akan menjelaskan cara membuat web service dengan
CodeIgniter. Yuk, simak selengkapnya!

Langkah-langkah Praktikum

Persiapan

Periapan awal adalah mengunduh aplikasi REST Client, ada banyak aplikasi yang dapat digunakan untuk
keperluan tersebut. Salah satunya adalah Postman. Postman – Merupakan aplikasi yang berfungsi
sebagai REST Client, digunakan untuk testing REST API. Unduh apliasi Postman dari tautan berikut:
https://www.postman.com/downloads/

Membuat Model.

Pada modul sebelumnya sudah dibuat ArtikelModel, pada modul ini kita akan memanfaatkan model
tersebut agar dapat diakses melalui API.

Membuat REST Controller

Pada tahap ini, kita akan membuat file REST Controller yang berisi fungsi untuk menampilkan,
menambah, mengubah dan menghapus data. Masuklah ke direktori app\Controllers dan buatlah file
baru bernama Post.php. Kemudian, salin kode di bawah ini ke dalam file tersebut:
 
![image](https://github.com/user-attachments/assets/c9fa898f-7f75-4d82-8ef6-bc66b7fb8aab)

Kode diatas berisi 5 method, yaitu:

• index() – Berfungsi untuk menampilkan seluruh data pada database.

• create() – Berfungsi untuk menambahkan data baru ke database.

• show() – Berfungsi untuk menampilkan suatu data spesifik dari database.

• update() – Berfungsi untuk mengubah suatu data pada database.

• delete() – Berfungsi untuk menghapus data dari database.

Membuat Routing REST API

Untuk mengakses REST API CodeIgniter, kita perlu mendefinisikan route-nya terlebih dulu.
Caranya, masuklah ke direktori app/Config dan bukalah file Routes.php. Tambahkan kode
di bawah ini:

 ![image](https://github.com/user-attachments/assets/434ccb50-c93d-4a90-b39e-8eb330997f6a)

Untuk mengecek route nya jalankan perintah berikut:

php spark routes

Selanjutnya akan muncul daftar route yang telah dibuat.
 
![image](https://github.com/user-attachments/assets/80b07f37-cf4f-4ab5-9c6f-46b78bb6f9c8)

Seperti yang terlihat, satu baris kode routes yang di tambahkan akan menghasilkan banyak
Endpoint.

Selanjutnya melakukan uji coba terhadap REST API CodeIgniter.

Testing REST API CodeIgniter

![image](https://github.com/user-attachments/assets/de3338e0-522f-486b-859d-e10f24743e34)

Buka aplikasi postman dan pilih create new → HTTP Request
 
Menampilkan Semua Data

Pilih method GET dan masukkan URL berikut:
http://localhost:8080/post

Lalu, klik Send. Jika hasil test menampilkan semua data artikel dari database, maka pengujian
berhasil.

 ![image](https://github.com/user-attachments/assets/73574d4b-e8d1-4c6b-9973-e54bb72070b2)

Menampilkan Data Spesifik

Masih menggunakan method GET, hanya perlu menambahkan ID artikel di belakang URL
seperti ini:
http://localhost:8080/post/2

Selanjutnya, klik Send. Request tersebut akan menampilkan data artikel yang memiliki ID
nomor 2 di database.

![image](https://github.com/user-attachments/assets/25fe6b92-ed40-4e21-a56e-a09af01c6708)

 
Mengubah Data

Untuk mengubah data, silakan ganti method menjadi PUT. Kemudian, masukkan URL artikel
yang ingin diubah. Misalnya, ingin mengubah data artikel dengan ID nomor 2, maka masukkan
URL berikut:
http://localhost:8080/post/2

Selanjutnya, pilih tab Body. Kemudian, pilih x-www-form-uriencoded. Masukkan nama
atribut tabel pada kolom KEY dan nilai data yang baru pada kolom VALUE. Kalau sudah,
klik Send.

 ![image](https://github.com/user-attachments/assets/d973b0dc-7bb4-4ed6-8eda-6ae5e64a28c8)

Menghapus Data

Pilih method DELETE untuk menghapus data. Lalu, masukkan URL spesifik data mana yang
ingin di hapus. Misalnya, ingin menghapus data nomor 4, maka URL-nya seperti ini:
http://localhost:8080/post/4

Langsung saja klik Send, maka akan mendapatkan pesan bahwa data telah berhasil dihapus dari
database.

 ![image](https://github.com/user-attachments/assets/e03ad00f-6357-478a-b77c-9f0bcc922bd1)

Pertanyaan dan Tugas

Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan
improvisasi.

Laporan Praktikum

1. Melanjutkan praktikum sebelumnya pada repository dengan nama Lab7Web.
2. Kerjakan semua latihan yang diberikan sesuai urutannya.
3. Screenshot setiap perubahannya.
4. Update file README.md dan tuliskan penjelasan dari setiap langkah praktikum
beserta screenshotnya.
5. Commit hasilnya pada repository masing-masing.
6. Kirim URL repository pada e-learning ecampus

---

---

Praktikum 11: VueJS

Tujuan

1. Mahasiswa mampu memahami konsep dasar API.
2. Mahasiswa mampu memahami konsep dasar Framework VueJS.
3. Mahasaswa mampu membuat Frontend API menggunakan Framework VueJS 3.
4. 
Instruksi Praktikum

1. Persiapkan text editor misalnya VSCode.
2. Buat folder dengan nama lab8_vuejs pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.
   
Apa itu VueJS?

VuesJS merupakan sebuah framework JavaScript untuk membangun aplikasi web atau
tampilan interface website agar lebih interaktif. VueJS dapat digunakan untuk membangun aplikasi berbasis user interface, seperti halaman web, aplikasi mobile, dan aplikasi desktop.

Framework ini juga menawarkan berbagai fitur, seperti reactive data binding, component-based architecture, dan tools untuk membangun aplikasi skalabel. Fitur utamanya adalah rendering dan komposisi elemen, sehingga bila pengguna hendak membuat aplikasi yang lebih kompleks akan membutuhkan routing, state management, template, build-tool, dan lain sebagainya.
Adapun library VueJS berfokus pada view layer sehingga framework ini mudah untuk
diimplementasikan dan diintegrasikan dengan library lain. Selain itu, VueJS juga terkenal mudah digunakan karena memiliki sintaksis yang sederhana dan intuitif, memungkinkan pengembang untuk membangun aplikasi web dengan mudah.
Untuk lebih lengkapnya dapat dipelajari pada dokumentasinya pada websitenya
https://vuejs.org/guide/introduction

Langkah-langkah Praktikum

Persiapan

Untuk memulai penggunaan framework Vuejs, dapat dialkukan dengan menggunakan npm,
atau bisa juga dengan cara manual. Untuk praktikum kali ini kita akan gunakan cara manual.
Yang diperlukan adalah library Vuejs, Axios untuk melakukan call API REST. Menggunakan
CDN.

 ![image](https://github.com/user-attachments/assets/dff203c4-cc6d-41e5-8564-d7ab3bbed16f)

![image](https://github.com/user-attachments/assets/7c4c2aaa-b3e6-469b-906c-8b0f623a81ea)

Menampilkan data

File index.html

 ![image](https://github.com/user-attachments/assets/88f0a368-a3a4-4f53-a91f-42aad959dbf9)

File apps.js

 ![image](https://github.com/user-attachments/assets/ccbce0cd-335e-4d31-9b11-8049e664a01e)

Hasil outpunya.
 
![image](https://github.com/user-attachments/assets/295e8c35-3856-4e3b-9d05-556b993b98e8)

File app.js lengkapi kodenya.

 ![image](https://github.com/user-attachments/assets/1cafae06-5a34-4db4-8bdd-944eadf93cd3)

File style.css

 ![image](https://github.com/user-attachments/assets/9a25165d-bb88-463d-a229-a94cf2917418)

Hasil Outputnya

 ![image](https://github.com/user-attachments/assets/5cdab98b-93cb-4596-a733-a3b038820be0)

Pertanyaan dan Tugas
Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan
improvisasi.

Laporan Praktikum

1. Melanjutkan praktikum sebelumnya pada repository dengan nama
Lab11Web_VueJS.
2. Kerjakan semua latihan yang diberikan sesuai urutannya.
3. Screenshot setiap perubahannya.
4. Update file README.md dan tuliskan penjelasan dari setiap langkah praktikum
beserta screenshotnya.
5. Commit hasilnya pada repository masing-masing.
6. Kirim URL repository pada e-learning ecampus

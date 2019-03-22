#Dokumentasi e-Pilketos SMK PGRI 1 Cimahi

##Deskripsi
<hr>
Ini adalah salah satu aplikasi pemilihan ketua osis, berbasis laravel dan sql.

##Fitur
<hr>
Pada Aplikasi ini tersedia beberapa fitur diantaranya
<li>Role Users</li>
<li>Pengaturan Waktu dalam pemilihan</li>
<li>Sistem Vote</li>
<li>Aktivasi Akun</li>
<li>Export Import data dengan file Excel</li>
<li>Tampilan yang responsive untuk web maupun mobile (HP)</li>

##Kebutuhan Sistem
<hr>
1. PHP 5.5 ++
2. MySql or Postgresql
3. Git Bash (For linux using terminal)
4. Composer (last update)

##Instalasi
<hr>
1. Pertama pastikan anda telah mendownload atau clone repository ini. (bagi yang belum daftar ssh keygen gunakan link https untuk mengclone berikut command nya "<code>git clone https://github.com/tsaninashrullah/e-pilketos.git</code>", dan untuk yang sudah mendaftarkan ssh keygennya bisa menggunakan command "<code>git clone git@github.com:tsaninashrullah/e-pilketos.git</code>" pada git bash atau terminal).
2. Setelah proses clone atau download repository beres masukkan command "<code>composer install</code>" pada git bash atau terminal untuk menginstall semua vendor yang diperlukan oleh e-Pilketos ini, tunggu hingga proses selesai.
3. Pastikan semua vendor terinstall, langkah selanjutnya adalah menambahkan file .env sebagai konfigurasi untuk local server kita (contoh ada pada file .env.example).
4. Save file .env dan masukkan command "<code>php artisan key:generate</code>" untuk menggenerate kan APP_KEY pada .env kita.
5. Setelah itu buatlah database di Mysql atau postgresql sesuai dengan nama yang telah kita daftarkan pada .env kita.
6. Pastikan nama database sesuai dengan nama database pada .env kita.
7. Gunakan command "<code>php artisan migrate</code>" untuk menambahkan migrasi/menggenerate kan tabel yang ada pada aplikasi ini.
8. Setelah selesai proses migrasi tabel selanjutnya jalankan command "<code>php artisan db:seed</code>" untuk menambahkan data master.
9. Setelah selesai semua proses diatas jalankan command "<code>php artisan serve</code>" untuk menyiapkan server local untuk aplikasi e-Pilketos ini.
10. Masuk lah dengan link "<code>localhost:8000</code>"

*Catatan :
<li>Proses ini harus menggunakan koneksi internet</li>
<li>Semua command dijalankan di terminal(linux) atau di git bash(windows/macos)</li>
<li>Jika anda akan mengclone projek ini pastikan anda telah mendapat permission dari user yang membuat repository ini/bisa langsung contact ke tsani.nashrullah@gmail.com</li>

##Thanks to
[Laravel](http://laravel.com/docs)
[Git](https://git-scm.com/)
[PHP](https://php.net)
[Composer](https://getcomposer.org/)

Best Regards,



e-Pilketos Team
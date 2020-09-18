# laravel-apixjwt
REST APIs resource full CRUD with Authentication and Authorization using JSON Web Token (JWT) for Laravel

# Installation
Pastikan di komputernya terinstall Composer. Dibuat di Environment Laravel Valet.

Clone repository ke desktop

Jalankan perintah composer install d root directory aplikasinya (tunggu hingga selesai)

ubah nama file .env.example jadi .env

Setting database di .env

Jalankan perintah 'php artisan key:generate'

Jalankan perintah 'php artisan migrate'

Jalankan perintah 'php artisan jwt:secret' untuk membuat secret key JWT

Buka aplikasi postman sebagai tool untuk API tester

Masukan link http://namahost/api/auth/register pada address bar aplikasi postman

Setting headers seperti pada umumnya kemudian pada tab body isikan field name, email, password, password_confirmation dengan value bebas

Jangan lupa HTTP method menggunakan POST method yaa

Langusng Send and yaaaa access_token will be generate and user information has been created on the database.

# License
The Laravel framework is open-sourced software licensed under the MIT license.

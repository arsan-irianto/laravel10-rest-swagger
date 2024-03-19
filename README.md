<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## {JSON} Placeholder API

Ini adalah Sample REST API menggunakan framework laravel versi 10 yang dilengkapi dengan Swagger sebagai dokumentasi API. 
Silahkan ikuti langkah-langkah di bawah setelah and melakukan clone repository untuk menjalankan demo aplikasi:

### Requirement
- PHP 8.1
- PostgreSQL Database

### Installation

- Clone Repository dan masuk ke direktori laravel10-rest-swagger
- Jalankan command ```composer install```
- Buat Database baru di environtment lokal anda
- Copy file .env.example dan rename menjadi .env, lalu sesuaikan koneksi dengan database PostgreSQL anda pada file .env
- Jalankan command ```php artisan key:generate```
- Jalankan command ```php artisan migrate:fresh --seed```
- Jalankan command ```php artisan serve```
- Setelah muncul info Server running, buka di browser anda dan masukkan url http://localhost:8000/api/documentation

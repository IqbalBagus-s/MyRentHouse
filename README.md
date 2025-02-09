<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).


## Cara penggunaan 
1. Pastikan Dependency Terinstall
Jalankan perintah berikut untuk menginstal semua dependency yang diperlukan:
```
composer install
npm install && npm run build
```

2. Buat File .env
Jika file .env belum ada, buat dengan cara:
```
cp .env.example .env
```

3. Generate Application Key
Laravel membutuhkan APP_KEY agar dapat berjalan, jadi jalankan:
```
php artisan key:generate
```

4. Konfigurasi Database
Buka file .env lalu sesuaikan konfigurasi database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

6. Storage Link
Jika aplikasi menggunakan fitur upload file, jalankan:
```
php artisan storage:link
```

8. Konfigurasi Filament 
Karena aplikasi menggunakan Filament Admin Panel, pastikan akun admin tersedia. Kamu bisa membuat user admin dengan perintah:
```
php artisan make:filament-user
```

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Installation Final Project
Repo ini di bangun untuk bekerja dan berkolaborasi dengan team untuk mengerjakan final project dari Sanbercode

* Masuk ke direktori project, lalu clone repo ini
```bash
$ cd project
```

* Masuk ke direktori project, lalu clone repo ini
```bash
$ git clone https://github.com/rpratama94/final-project.git
```

* jalankan perintah composer install untuk mendownload direktori vendor
```bash
$ composer install
```
* buat file .env lalu isi file tersebut dengan seluruh isi dari file .env.example (copy isi dari .env.example lalu paste di file .env)

* jalankan perintah php artisan key generate
```bash
$ php artisan key:generate
```

* Tambahan: Untuk pengerjaan di laptop/PC masing-masing, sesuaikan nama database, username dan password nya di file .env dengan database kalian. 

Setelah itu kalian sudah bisa lanjut mengerjakan soal berikutnya. jangan lupa untuk menjalankan server laravel
```bash
$ php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

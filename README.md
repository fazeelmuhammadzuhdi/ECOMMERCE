<h1 align="center">Selamat datang di Aplikasi E Commerce👋</h1>

<p float="left">
  <img src="https://raw.githubusercontent.com/fazeelmuhammadzuhdi/ECOMMERCE/main/public/screenshoot/hasil1.png"/>
  <img src="https://raw.githubusercontent.com/fazeelmuhammadzuhdi/ECOMMERCE/main/public/screenshoot/hasil2.png"/>
  <img src="https://raw.githubusercontent.com/fazeelmuhammadzuhdi/ECOMMERCE/main/public/screenshoot/hasil3.png"/>
  <img src="https://raw.githubusercontent.com/fazeelmuhammadzuhdi/ECOMMERCE/main/public/screenshoot/hasil4.png"/>
</p>



### 🤔 Apa itu E Commerce?
Web E Commerce Sederhana Open Source yang dibuat oleh <a href="https://github.com/fazeelmuhammadzuhdi"> Fazeel Muhammad Zuhdi. </a> **E-Commerce adalah Website proses terjadinya transaksi jual beli yang dalam prakteknya dilakukan secara online melalui media elektronik.** Aplikasi Ini dibuat untuk memudahkan proses Pembelian Product dengan mudah.

### 🎉 Kenapa dibuat Open Source?
Untuk Bahan Belajar Saya Dan Juga Teman Teman Yang Ingin mempelajari Framework Laravel.
Aplikasi Ini Juga Menggunakan Laravel Breeze dan Package Laratrust. Laratrust is an easy and flexible way to add roles, permissions and teams authorization to Laravel.
### 📆 <a href="#">Release Date</a>
- 12 September 2023

------------

## 💻 Install

1. **Clone Repository**
```bash
git clone https://github.com/fazeelmuhammadzuhdi/ECOMMERCE.git
cd ecommerce
composer install
npm install
copy .env.example .env
```

2. **Buka ```.env``` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai, karena di project ini menggunakan Mysql jadi saya kasih contoh seperti berikut, dan jika kamu ingin menggunakan PostgreSQL atau lainnya tinggal sesuaikan.**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=
```

3. **Instalasi website**
```bash
php artisan key:generate
php artisan db:fresh (Karena Saya Menggunakan Fitur Migration Dari Laravel yang Mana Migration adalah sebuah fitur yang ada pada laravel, migration merupakan Control Version System untuk database. )
php artisan storage:link
```

4. **Cara Menjalankan Laravel**
```command
php artisan serve
```

## 🧑 Author

👤 **Fazeel Muhammad Zuhdi**
- LinkedIn : <a href="https://www.linkedin.com/in/fazeel-muhammad-zuhdi/"> Fazeel Muhammad Zuhdi</a>

## 🤝 Contributing
Saya Sangat Berterima Kasih Bagi Yang Ingin Berkontribusi. **Karena Project ini saya selesaikan sendiri, tapi apabila anda ingin berkontribusi sangat dipersilahkan ya.**


## 📝 License
- Copyright © 2023 Fazeel Muhammad Zuhdi.
- **E-Commerce is Open-Sourced software licensed under the MIT license.**

------------



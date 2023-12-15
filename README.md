<p align="center"><a href="https://laravel.com" target="_blank"><img src="" width="400" alt="Shidqia Logo"></a></p>


# Selamat Datang di Shidqia Website - Penghitung EOQ

Aplikasi ini memudahkan pengguna menghitung Economic Order Quantity (EOQ), metode optimal untuk menentukan jumlah pemesanan barang dengan biaya persediaan terendah.

## Fitur Aplikasi
- Perhitungan EOQ Otomatis: Input biaya pemesanan, biaya penyimpanan, dan permintaan tahunan untuk mendapatkan EOQ secara instan.
- Safety Stock: Hitung stok pengaman untuk mengatasi fluktuasi permintaan tak terduga.
- Reorder Point (ROP): Tentukan level persediaan di mana pesanan baru diperlukan untuk menghindari kehabisan stok.
- Riwayat Perhitungan: Pantau hasil perhitungan EOQ, Safety Stock, dan ROP untuk analisis historis dan perencanaan efisien.

Shidqia Website, solusi lengkap untuk manajemen persediaan yang efisien. Gunakan aplikasi kami dan tingkatkan kinerja rantai pasok Anda!


# Setup Process

## Prerequisite

Sebelum memulai, pastikan Anda telah menginstal perangkat lunak berikut pada mesin Anda:

- Versi PHP minimal `8.1.6`
- Versi composer minimal `2.5.1`
- MySQL Database

## Installation

1. Cloning repositori ini:
```
git clone https://github.com/Cahzello/aplikasi-eoq.git
```

2. Arahkan ke direktori repositori:
```
cd aplikasi-eoq
```

3. Menginstal Composer:
```
composer install
```

4. Buat salinan file `.env.example` dan ganti namanya menjadi `.env`:

```
cp .env.example .env
```
5. Membuat kunci enkripsi aplikasi:

```
php artisan key:generate
```

6. Buat database MySQL untuk aplikasi, dengan nama `cahzello_blog`.

<br>

7. Perbarui file `.env` dengan kredensial basis data MySQL Anda (seperti koneksi basis data).

<br>

8. Memigrasikan basis data:

```
php artisan migrate
```


## Usage

Untuk menjalankan shidqia website, gunakan perintah berikut:

```
php artisan serve
```

<br>
Sekarang shidqia website siap digunakan dalam local development.


# License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
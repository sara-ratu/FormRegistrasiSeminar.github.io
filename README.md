# Registrasi Seminar IT PNM Summit

Aplikasi pendaftaran seminar berbasis Laravel 12. Formulir menggunakan Blade, menyimpan data peserta melalui Eloquent ke SQLite, dan memvalidasi setiap pendaftaran di server.

## Kebutuhan

- PHP 8.2 atau lebih baru dengan ekstensi PDO SQLite
- Composer

## Menjalankan secara lokal

Dari folder proyek, jalankan di PowerShell:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
New-Item -ItemType File -Path database\database.sqlite -Force
php artisan migrate
php artisan serve
```

Buka URL yang ditampilkan oleh `artisan serve` (biasanya `http://127.0.0.1:8000`).

## Pengembangan

Jalankan pengujian dengan `php artisan test`. Pengujian memakai SQLite in-memory, sehingga tidak mengubah database lokal.

Pendaftaran memerlukan nama, email unik, tanggal lahir pada atau sebelum 31 Desember 2006, dan nomor HP Indonesia 8–13 digit. Formulir tidak meminta kata sandi karena pendaftaran seminar ini tidak membuat akun pengguna.

Informasi acara di tampilan masih mengikuti data sumber (21 Maret 2025). Perbarui tanggal, waktu, lokasi, dan pembicara sebelum memakai aplikasi untuk seminar baru.

Laravel memerlukan hosting yang mendukung PHP dan mengarahkan document root ke folder `public`. GitHub Pages hanya melayani file statis dan tidak dapat menjalankan aplikasi Laravel.

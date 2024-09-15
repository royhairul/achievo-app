# Achievo

Achievo adalah aplikasi web yang dirancang untuk melacak dan mengelola pencapaian pribadi atau tim secara efisien. Aplikasi ini dibangun menggunakan Laravel sebagai kerangka backend dan Tailwind CSS untuk desain UI yang modern dan responsif.

---

## Daftar Isi

1. [Fitur](#fitur)
2. [Persyaratan](#persyaratan)
3. [Panduan Instalasi](#panduan-instalasi)
    - [Langkah 1: Clone Repository](#langkah-1-clone-repository)
    - [Langkah 2: Install Dependencies PHP](#langkah-2-install-dependencies-php)
    - [Langkah 3: Install Dependencies JavaScript](#langkah-3-install-dependencies-javascript)
    - [Langkah 4: Pengaturan Lingkungan (Environment)](#langkah-4-pengaturan-lingkungan-environment)
    - [Langkah 5: Jalankan Migrasi](#langkah-5-jalankan-migrasi)
    - [Langkah 6: Bangun Asset Front-end](#langkah-6-bangun-asset-front-end)
    - [Langkah 7: Jalankan Aplikasi](#langkah-7-jalankan-aplikasi)
4. [Aturan Git dan GitHub](#aturan-git-dan-github)
    - [Strategi Branching](#strategi-branching)
    - [Membuat Branch Fitur atau Perbaikan](#membuat-branch-fitur-atau-perbaikan)
    - [Aturan Merging](#aturan-merging)
    - [Aturan Commit](#aturan-commit)
    - [Tagging Rilis](#tagging-rilis)
5. [Pengujian](#pengujian)
6. [Panduan Kontribusi](#panduan-kontribusi)
7. [Lisensi](#lisensi)

---

## Fitur

-   Autentikasi dan otorisasi pengguna
-   Pelacakan pencapaian dan kategorisasi
-   Dashboard dinamis dengan Tailwind CSS
-   Dukungan RESTful API
-   UI yang responsif dan ramah seluler

---

## Persyaratan

Sebelum memulai instalasi Achievo, pastikan sistem Anda memenuhi persyaratan berikut:

-   PHP >= 8.1
-   Composer
-   Node.js & NPM
-   MySQL atau database lain yang didukung
-   Laravel 10.x
-   Tailwind CSS
-   Git

---

## Panduan Instalasi

### Langkah 1: Clone Repository

Clone repository dari GitHub:

```bash
git clone https://github.com/your-username/achievo.git
cd achievo
```

### Langkah 2: Install Dependencies PHP

Jalankan perintah berikut untuk menginstall semua dependency PHP:

```bash
composer install
```

### Langkah 3: Install Dependencies JavaScript

Jalankan perintah ini untuk menginstall dependency JavaScript:

```bash
npm install
```

### Langkah 4: Pengaturan Lingkungan (Environment)

Salin file `.env.example` dan beri nama baru `.env`, lalu generate application key dan konfigurasikan database Anda:

```bash
cp .env.example .env
php artisan key:generate
```

Atur koneksi database di file `.env` sesuai konfigurasi lokal:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=achievo
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Langkah 5: Jalankan Migrasi

Setelah mengkonfigurasi database, jalankan migrasi untuk membuat tabel di database:

```bash
php artisan migrate
```

### Langkah 6: Bangun Asset Front-end

Jalankan perintah ini untuk membangun asset front-end dengan Tailwind CSS:

```bash
npm run dev
```

### Langkah 7: Jalankan Aplikasi

Sekarang, Anda bisa menjalankan aplikasi menggunakan server pengembangan Laravel:

```bash
php artisan serve
```

Aplikasi dapat diakses melalui `http://127.0.0.1:8000`.

---

## Aturan Git dan GitHub

### Strategi Branching

-   **Branch utama (`main`)**: Berisi versi stabil terbaru.
-   **Branch pengembangan (`develop`)**: Semua fitur baru dan perbaikan bug harus digabungkan ke branch ini sebelum masuk ke `main`.

### Membuat Branch Fitur atau Perbaikan

1. **Buat branch dari `develop`**:

```bash
git checkout develop
git pull origin develop
git checkout -b fitur/nama-fitur-anda
```

2. **Commit perubahan Anda**:

Pastikan pesan commit mengikuti format yang bermakna:

```
<type>(<scope>): <pesan>
```

Dimana:

-   `type` bisa berupa `feat`, `fix`, `docs`, `style`, `refactor`, `test`, atau `chore`.
-   `scope` adalah bagian dari kode yang terpengaruh (opsional).
-   `pesan` adalah deskripsi singkat dari perubahan.

Contoh:

```bash
git commit -m "feat(auth): menambahkan fitur login"
```

3. **Push branch ke GitHub**:

```bash
git push origin fitur/nama-fitur-anda
```

4. **Buat Pull Request (PR)**:
    - Buka PR untuk menggabungkan branch fitur Anda ke `develop`.
    - Tugaskan reviewer yang relevan dan tunggu persetujuan sebelum merge.

### Aturan Merging

-   Semua kode harus ditinjau sebelum digabungkan ke `develop` atau `main`.
-   Pull request harus lolos pengujian dan mengikuti standar kode yang telah ditetapkan.
-   Gunakan opsi **Squash and merge** untuk menjaga kebersihan riwayat commit.

### Aturan Commit

-   Commit harus bersifat atomik dan merepresentasikan satu unit kerja.
-   Sebelum commit, pastikan kode diformat dan dilinting dengan benar.
-   Pesan commit harus mengikuti standar [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/).

### Tagging Rilis

-   Gunakan [Semantic Versioning](https://semver.org/) untuk menandai rilis.
-   Format tagging: `v<MAJOR>.<MINOR>.<PATCH>`
-   Contoh: `git tag -a v1.0.0 -m "Rilis awal"`
-   Push tag ke GitHub dengan: `git push origin --tags`

---

## Pengujian

Untuk menjalankan pengujian:

```bash
php artisan test
```

Pastikan semua pengujian lolos sebelum mengajukan pull request.

---

## Panduan Kontribusi

-   Fork repository dan buat branch baru untuk perubahan apapun.
-   Ikuti standar penulisan kode dan panduan commit yang telah ditetapkan.
-   Ajukan pull request untuk setiap tambahan atau perbaikan bug.

---

## Lisensi

Achievo adalah proyek open-source yang dilisensikan di bawah [Lisensi MIT](https://opensource.org/licenses/MIT).

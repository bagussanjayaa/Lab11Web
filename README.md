# Nama: Bagus Sanjaya

# Kelas: TI.24.A.5

# NIM: 312410505

# LAB11_PHP_OOP

Praktikum ini bertujuan untuk memahami **PHP OOP Lanjutan** dengan penerapan:
- Modularisasi
- Routing
- CRUD (Create, Read, Update, Delete)
- Template layout (header, sidebar, footer)
- Pemisahan CSS untuk styling

## Struktur Folder
```
LAB11_PHP_OOP/
├── .htaccess
├── config.php
├── index.php
│
├── class/
│   ├── database.php
│   └── form.php
│
├── module/
│   └── artikel/
│       ├── index.php   # Read
│       ├── tambah.php  # Create
│       ├── ubah.php    # Update
│       └── hapus.php   # Delete
│
├── template/
│   ├── header.php
│   ├── sidebar.php
│   └── footer.php
│
└── assets/
    └── css/
        └── style.css
```

## Langkah Praktikum

### 1. Konfigurasi Database
- Buat database `latihan_oop`.
- Buat tabel `artikel`:
```sql
CREATE TABLE artikel (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(100),
  isi TEXT
);
```
- Simpan pengaturan koneksi di `config.php`.

### 2. Routing dengan `.htaccess` dan `index.php`
- Tambahkan file `.htaccess` untuk URL rewrite.
- `index.php` membaca path dari `$_SERVER['PATH_INFO']` lalu memanggil file modul sesuai URL.
- Contoh:
  - `/artikel/index` → `module/artikel/index.php`
  - `/artikel/tambah` → `module/artikel/tambah.php`

### 3. Class `Database`
- Buat class `Database` di `class/database.php`.
- Method utama:
  - `query()` → menjalankan SQL.
  - `get()` → ambil data tunggal.
  - `insert()` → tambah data.
  - `update()` → ubah data.

Tujuannya agar query SQL lebih terstruktur dan reusable.

### 4. Template Layout
- `header.php` → Navbar + membuka layout.
- `sidebar.php` → Menu navigasi (Lihat Data, Tambah Data).
- `footer.php` → Tutup layout + footer.
- Semua modul dipanggil di dalam layout ini.


### 5. Styling dengan CSS
- Buat folder `assets/css/` berisi `style.css`.
- Atur tampilan sidebar, konten, dan footer agar lebih menarik.
- Pisahkan CSS dari PHP untuk maintainability.

### 6. CRUD Modul Artikel
#### a. Read (`index.php`)
- Menampilkan daftar artikel dalam tabel.
- Tombol **Edit** dan **Hapus** tersedia di setiap baris.

#### b. Create (`tambah.php`)
- Form input judul dan isi artikel.
- Data disimpan ke database dengan method `insert()`.

#### c. Update (`ubah.php`)
- Form edit dengan data lama sudah terisi.
- Data diupdate ke database dengan method `update()`.

#### d. Delete (`hapus.php`)
- Menghapus data artikel berdasarkan `id`.
- Redirect kembali ke daftar artikel.

## ✨ Hasil
- Sidebar kiri untuk navigasi.

![foto](pict/01.png)

- Konten kanan berganti sesuai modul CRUD.

![foto](pict/01.png)

![foto](pict/02.png)

![foto](pict/03.png)

- Footer tampil di bawah dengan identitas praktikum.

![foto](pict/04.png)

# WEB Pencatatan Data Mahasiswa

Tugas ini adalah web sederhana untuk mengelola data mahasiswa yang dibuat sebagai tugas mata kuliah **Pemrograman Web**. Web ini dibangun menggunakan PHP Native (PDO) dan Bootstrap 5 untuk antarmuka yang responsif.

## Identitas Mahasiswa

- **Nama:** Zaky Ramadhan
- **NIM:** 2411082024
- **Kelas:** TRPL 2C
- **Dosen Pengampu:** Yori Adi Atma, S.Pd., M.Kom

---

## Teknologi yang Digunakan

- **Bahasa Pemrograman:** PHP 8.4.7
- **Database:** MySQL 8.0.30
- **Frontend Framework:** Bootstrap 5.3.8
- **Database Driver:** PDO (PHP Data Objects)

---

## Fitur Aplikasi

1. **Create:** Menambahkan data mahasiswa baru (NIM, Nama, Tanggal Lahir, Alamat).
2. **Read:** Menampilkan daftar mahasiswa dalam format tabel yang rapi.
3. **Update:** Mengedit data mahasiswa yang sudah ada.
4. **Delete:** Menghapus data mahasiswa dengan konfirmasi keamanan.
5. **Autentikasi:** Sistem login dan register untuk keamanan akses data.
6. **Responsif:** Tampilan kompatibel dengan perangkat _mobile_ dan _desktop_.

---

## Struktur Folder

```text
/pencatatan-data-mahasiswa
│
├── layout/             # Template layout (Header & Footer)
│   ├── header.php
│   └── footer.php
│
├── mahasiswa/          # Manajemen Data Mahasiswa
│   ├── index.php       # Daftar mahasiswa
│   ├── home.php        # Halaman utama mahasiswa
│   ├── tambah.php      # Form tambah mahasiswa
│   ├── edit.php        # Form edit mahasiswa
│   ├── hapus.php       # Proses hapus mahasiswa
│   └── proses.php      # Logika proses CRUD mahasiswa
│
├── prodi/              # Manajemen Data Program Studi
│   ├── index.php       # Daftar program studi
│   ├── home.php        # Halaman utama program studi
│   ├── tambah.php      # Form tambah prodi
│   ├── edit.php        # Form edit prodi
│   ├── hapus.php       # Proses hapus prodi
│   └── proses.php      # Logika proses CRUD prodi
│
├── koneksi.php         # Konfigurasi koneksi database
├── index.php           # Halaman Dashboard
├── login.php           # Halaman login
├── register.php        # Halaman register
└── README.md           # Dokumentasi proyek
```

---

## Setup Database

```sql
CREATE DATABASE IF NOT EXISTS db_akademik;
USE db_akademik;

CREATE TABLE `pengguna` (
  `id` int NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(50) NOT NULL
);

ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `pengguna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

CREATE TABLE `program_studi` (
  `id` int NOT NULL,
  `nama_prodi` varchar(50) DEFAULT NULL,
  `jenjang` enum('D2','D3','D4','S2') DEFAULT NULL,
  `akreditas` varchar(12) DEFAULT NULL,
  `keterangan` text,
  `pengguna_id` int NOT NULL
);

ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

ALTER TABLE `program_studi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text,
  `program_studi_id` int DEFAULT NULL,
  `pengguna_id` int NOT NULL
);

ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `program_studi_id` (`program_studi_id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;


```

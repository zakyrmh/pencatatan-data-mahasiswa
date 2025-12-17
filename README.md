# WEB Pencatatan Data Mahasiswa

Tugas ini adalah web sederhana untuk mengelola data mahasiswa yang dibuat sebagai tugas mata kuliah **Pemrograman Web**. Web ini dibangun menggunakan PHP Native (PDO) dan Bootstrap 5 untuk antarmuka yang responsif.

## 👨‍🎓 Identitas Mahasiswa

- **Nama:** Zaky Ramadhan
- **NIM:** 2411082024
- **Kelas:** TRPL 2C
- **Dosen Pengampu:** Yori Adi Atma, S.Pd., M.Kom

---

## 🛠️ Teknologi yang Digunakan

- **Bahasa Pemrograman:** PHP 8.4.7
- **Database:** MySQL 8.0.30
- **Frontend Framework:** Bootstrap 5.3.8
- **Database Driver:** PDO (PHP Data Objects)

---

## 🚀 Fitur Aplikasi

1. **Create:** Menambahkan data mahasiswa baru (NIM, Nama, Tanggal Lahir, Alamat).
2. **Read:** Menampilkan daftar mahasiswa dalam format tabel yang rapi.
3. **Update:** Mengedit data mahasiswa yang sudah ada.
4. **Delete:** Menghapus data mahasiswa dengan konfirmasi keamanan.
5. **Responsif:** Tampilan kompatibel dengan perangkat _mobile_ dan _desktop_.

---

## 📂 Struktur Folder

```text
/pencatatan-data-mahasiswa
│
├── layout/             # Template layout (Header & Footer)
│   ├── header.php
│   └── footer.php
│
├── mahasiswa/          # Manajemen Data Mahasiswa
│   ├── index.php       # Daftar mahasiswa
│   ├── tambah.php      # Form tambah mahasiswa
│   ├── edit.php        # Form edit mahasiswa
│   ├── hapus.php       # Proses hapus mahasiswa
│   └── proses.php      # Logika proses CRUD mahasiswa
│
├── prodi/              # Manajemen Data Program Studi
│   ├── index.php       # Daftar program studi
│   ├── tambah.php      # Form tambah prodi
│   ├── edit.php        # Form edit prodi
│   ├── hapus.php       # Proses hapus prodi
│   └── proses.php      # Logika proses CRUD prodi
│
├── koneksi.php         # Konfigurasi koneksi database
├── index.php           # Halaman Dashboard
└── README.md           # Dokumentasi proyek
```

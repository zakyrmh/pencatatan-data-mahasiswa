# WEB Pencatatan Data Mahasiswa

Tugas ini adalah web sederhana untuk mengelola data mahasiswa yang dibuat sebagai tugas mata kuliah **Pemrograman Web**. Web ini dibangun menggunakan PHP Native (PDO) dan Bootstrap 5 untuk antarmuka yang responsif.

## 👨‍🎓 Identitas Mahasiswa
* **Nama:** Zaky Ramadhan
* **NIM:** 2411082024
* **Kelas:** TRPL 2C
* **Dosen Pengampu:** Yori Adi Atma, S.Pd., M.Kom

---

## 🛠️ Teknologi yang Digunakan
* **Bahasa Pemrograman:** PHP 8.4.7
* **Database:** MySQL 8.0.30
* **Frontend Framework:** Bootstrap 5.3.8
* **Database Driver:** PDO (PHP Data Objects)

---

## 🚀 Fitur Aplikasi
1. **Create:** Menambahkan data mahasiswa baru (NIM, Nama, Tanggal Lahir, Alamat).
2. **Read:** Menampilkan daftar mahasiswa dalam format tabel yang rapi.
3. **Update:** Mengedit data mahasiswa yang sudah ada.
4. **Delete:** Menghapus data mahasiswa dengan konfirmasi keamanan.
5. **Responsif:** Tampilan kompatibel dengan perangkat *mobile* dan *desktop*.

---

## 📂 Struktur Folder
```text
/pencatatan-data-mahasiswa
│
├── koneksi.php    # Konfigurasi koneksi ke database MySQL
├── index.php      # Halaman utama (Menampilkan data)
├── tambah.php     # Form tambah data
├── edit.php       # Form edit data
├── hapus.php      # Proses penghapusan data
└── README.md      # Dokumentasi proyek
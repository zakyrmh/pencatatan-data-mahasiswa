<?php
include '../koneksi.php';

$aksi = $_GET['aksi'] ?? '';

if ($aksi == 'tambah') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nim = $_POST['nim'];
        $nama_mhs = $_POST['nama_mhs'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $program_studi_id = $_POST['program_studi_id'];

        try {
            $sql = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, program_studi_id, alamat) VALUES (:nim, :nama_mhs, :tgl_lahir, :program_studi_id, :alamat)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'nim' => $nim,
                'nama_mhs' => $nama_mhs,
                'tgl_lahir' => $tgl_lahir,
                'program_studi_id' => $program_studi_id,
                'alamat' => $alamat
            ]);

            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} elseif ($aksi == 'edit') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nim = $_POST['nim'];
        $nama_mhs = $_POST['nama_mhs'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $program_studi_id = $_POST['program_studi_id'];
        $alamat = $_POST['alamat'];

        try {
            $sql = "UPDATE mahasiswa SET nama_mhs = :nama, tgl_lahir = :tgl_lahir, program_studi_id = :program_studi_id, alamat = :alamat WHERE nim = :nim";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'nama' => $nama_mhs,
                'tgl_lahir' => $tgl_lahir,
                'program_studi_id' => $program_studi_id,
                'alamat' => $alamat,
                'nim' => $nim
            ]);

            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} elseif ($aksi == 'hapus') {
    $nim = $_GET['nim'] ?? null;

    if ($nim) {
        try {
            $stmt = $pdo->prepare("DELETE FROM mahasiswa WHERE nim = :nim");
            $stmt->execute(['nim' => $nim]);
        } catch (PDOException $e) {
            echo "Gagal menghapus: " . $e->getMessage();
            exit();
        }
    }
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}

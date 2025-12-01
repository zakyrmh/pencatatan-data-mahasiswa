<?php
include 'koneksi.php';

$pesan = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    try {
        $sql = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat) VALUES (:nim, :nama_mhs, :tgl_lahir, :alamat)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nim' => $nim,
            'nama_mhs' => $nama_mhs,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat
        ]);

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        $pesan = "Error: " . $e->getMessage();
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Tambah Data Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($pesan): ?>
                            <div class="alert alert-danger"><?= $pesan ?></div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label>NIM</label>
                                <input type="text" name="nim" class="form-control" required placeholder="Contoh: 2024001">
                            </div>
                            <div class="mb-3">
                                <label>Nama Mahasiswa</label>
                                <input type="text" name="nama_mhs" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
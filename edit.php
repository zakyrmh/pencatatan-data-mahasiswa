<?php
include 'koneksi.php';

$nim = $_GET['nim'] ?? null;

if (!$nim) {
    header("Location: index.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE nim = :nim");
$stmt->execute(['nim' => $nim]);
$data = $stmt->fetch();

if (!$data) {
    die("Data tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    try {
        $sql = "UPDATE mahasiswa SET nama_mhs = :nama, tgl_lahir = :tgl_lahir, alamat = :alamat WHERE nim = :nim";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nama' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'nim' => $nim
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
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning">
                        <h4 class="mb-0">Edit Data Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label>NIM (Tidak bisa diubah)</label>
                                <input type="text" name="nim" class="form-control bg-light" value="<?= htmlspecialchars($data['nim']) ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Nama Mahasiswa</label>
                                <input type="text" name="nama_mhs" class="form-control" value="<?= htmlspecialchars($data['nama_mhs']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="<?= $data['tgl_lahir'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3"><?= htmlspecialchars($data['alamat']) ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="index.php" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
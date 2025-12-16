<?php
include '../koneksi.php';

$pesan = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $akreditas = $_POST['akreditas'];
    $keterangan = $_POST['keterangan'];

    try {
        $sql = "INSERT INTO program_studi (nama_prodi, jenjang, akreditas, keterangan) VALUES (:nama_prodi, :jenjang, :akreditas, :keterangan)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nama_prodi' => $nama_prodi,
            'jenjang' => $jenjang,
            'akreditas' => $akreditas,
            'keterangan' => $keterangan
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
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Data Program Studi</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($pesan): ?>
                            <div class="alert alert-danger"><?= $pesan ?></div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label>Nama Prodi</label>
                                <input type="text" name="nama_prodi" class="form-control" required placeholder="Contoh: Teknologi Rekayasa Perangkat Lunak">
                            </div>
                            <div class="mb-3">
                                <label>Jenjang</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenjang" value="D2">
                                        <label class="form-check-label">D2</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenjang" value="D3">
                                        <label class="form-check-label">D3</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenjang" value="D4">
                                        <label class="form-check-label">D4</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenjang" value="S2">
                                        <label class="form-check-label">S2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Akreditasi</label>
                                <input type="text" name="akreditas" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include 'koneksi.php';

$stmt = $pdo->query('SELECT * FROM mahasiswa');
$mahasiswa = $stmt->fetchAll();
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pencatatan Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Daftar Mahasiswa</h4>
                <a href="tambah.php" class="btn btn-light btn-sm fw-bold">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Tgl Lahir</th>
                                <th>Alamat</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($mahasiswa) > 0): ?>
                                <?php foreach ($mahasiswa as $mhs): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($mhs['nim']) ?></td>
                                        <td><?= htmlspecialchars($mhs['nama_mhs']) ?></td>
                                        <td><?= date('d-m-Y', strtotime($mhs['tgl_lahir'])) ?></td>
                                        <td><?= htmlspecialchars($mhs['alamat']) ?></td>
                                        <td>
                                            <a href="edit.php?nim=<?= $mhs['nim'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="hapus.php?nim=<?= $mhs['nim'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data mahasiswa.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
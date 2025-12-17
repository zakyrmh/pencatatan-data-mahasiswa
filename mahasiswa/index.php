<?php
include '../koneksi.php';

$sql = "SELECT mahasiswa.*, program_studi.nama_prodi 
        FROM mahasiswa 
        LEFT JOIN program_studi ON mahasiswa.program_studi_id = program_studi.id";
$stmt = $pdo->query($sql);
$mahasiswa = $stmt->fetchAll();

$title = "Daftar Mahasiswa";
include '../layout/header.php';
?>

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
                        <th>Prodi</th>
                        <th>Alamat</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($mahasiswa) > 0): ?>
                        <?php foreach ($mahasiswa as $mhs): ?>
                            <tr>
                                <td>
                                    <?= $mhs['nim'] ?>
                                </td>
                                <td>
                                    <?= $mhs['nama_mhs'] ?>
                                </td>
                                <td>
                                    <?= $mhs['tgl_lahir'] ?>
                                </td>
                                <td>
                                    <?= $mhs['nama_prodi'] ?? '-' ?>
                                </td>
                                <td>
                                    <?= $mhs['alamat'] ?>
                                </td>
                                <td>
                                    <a href="edit.php?nim=<?= $mhs['nim'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="proses.php?aksi=hapus&nim=<?= $mhs['nim'] ?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data mahasiswa.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
// 5. Panggil Footer
include '../layout/footer.php';
?>
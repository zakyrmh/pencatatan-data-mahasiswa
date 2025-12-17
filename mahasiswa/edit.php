<?php
include '../koneksi.php';

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
}

$title = "Edit Data Mahasiswa";
include '../layout/header.php';
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary">
                <h4 class="mb-0 text-white">Edit Data Mahasiswa</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="proses.php?aksi=edit">
                    <div class="mb-3">
                        <label>NIM (Tidak bisa diubah)</label>
                        <input type="text" name="nim" class="form-control bg-light"
                            value="<?= htmlspecialchars($data['nim']) ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" class="form-control"
                            value="<?= htmlspecialchars($data['nama_mhs']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" value="<?= $data['tgl_lahir'] ?>"
                            required>
                    </div>
                    <!-- Program Studi -->
                    <div class="mb-3">
                        <label>Program Studi</label>
                        <select name="program_studi_id" class="form-select">

                            <?php
                            $sql = "SELECT * FROM program_studi";
                            $stmt = $pdo->query($sql);
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="' . $row['id'] . '" ' . ($row['id'] == $data['program_studi_id'] ? 'selected' : '') . '>' . $row['nama_prodi'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control"
                            rows="3"><?= htmlspecialchars($data['alamat']) ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include '../layout/footer.php';
?>
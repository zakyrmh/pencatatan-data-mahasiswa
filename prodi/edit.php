<?php
include '../koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM program_studi WHERE id = :id");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch();

if (!$data) {
    die("Data tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $akreditas = $_POST['akreditas'];
    $keterangan = $_POST['keterangan'];

    try {
        $sql = "UPDATE program_studi SET nama_prodi = :nama_prodi, jenjang = :jenjang, akreditas = :akreditas, keterangan = :keterangan WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nama_prodi' => $nama_prodi,
            'jenjang' => $jenjang,
            'akreditas' => $akreditas,
            'keterangan' => $keterangan,
            'id' => $id
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
    <title>Edit Data Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0">Edit Data Program Studi</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label>Nama Program Studi</label>
                                <input type="text" name="nama_prodi" class="form-control" value="<?= htmlspecialchars($data['nama_prodi']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Jenjang</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenjang" value="D2" <?= $data['jenjang'] == 'D2' ? 'checked' : '' ?>>
                                        <label class="form-check-label">D2</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenjang" value="D3" <?= $data['jenjang'] == 'D3' ? 'checked' : '' ?>>
                                        <label class="form-check-label">D3</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenjang" value="D4" <?= $data['jenjang'] == 'D4' ? 'checked' : '' ?>>
                                        <label class="form-check-label">D4</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenjang" value="S2" <?= $data['jenjang'] == 'S2' ? 'checked' : '' ?>>
                                        <label class="form-check-label">S2</label>
                                    </div>
                                </div>
                                <div class="form-check">
                                </div>
                                <div class="mb-3">
                                    <label>Akreditas</label>
                                    <textarea name="akreditas" class="form-control" rows="3"><?= htmlspecialchars($data['akreditas']) ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="3"><?= htmlspecialchars($data['keterangan']) ?></textarea>
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
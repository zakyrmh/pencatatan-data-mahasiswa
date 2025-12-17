<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? $title : 'Sistem Akademik'; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/pencatatan-data-mahasiswa/index.php">
                Data Akademik
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pencatatan-data-mahasiswa/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pencatatan-data-mahasiswa/mahasiswa/index.php">Data
                            Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pencatatan-data-mahasiswa/prodi/index.php">Data Prodi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5 flex-grow-1">
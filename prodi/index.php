<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit;
}

include '../koneksi.php';

$stmt = $pdo->query('SELECT * FROM program_studi');
$prodi = $stmt->fetchAll();

$title = "Daftar Program Studi";

include '../layout/header.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        include 'home.php';
        break;
    case 'tambah':
        include 'tambah.php';
        break;
    case 'edit':
        include 'edit.php';
        break;
    case 'hapus':
        include 'hapus.php';
        break;
    default:
        include 'home.php';
        break;
}

include '../layout/footer.php';

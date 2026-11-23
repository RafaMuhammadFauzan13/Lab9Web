<?php
$judulHalaman = $judulHalaman ?? 'Data Barang';

// $page dari router bisa berupa array (misal ?page[]=x), jadi pastikan string dulu
$halamanAktif = (isset($page) && is_string($page)) ? $page : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($judulHalaman); ?> - Aplikasi CRUD Modular</title>
    <base href="<?= e($baseUrl); ?>">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
    <header>
    <h1>Aplikasi CRUD Modular</h1>
    <p>Tantangan Mandiri</p>
    </header>
    <nav>
    <?php if (sudahLogin()): ?>
    <a href="barang/list" class="<?= menuAktif('barang/list', $halamanAktif); ?>">Data Barang</a>
    <a href="barang/add" class="<?= menuAktif('barang/add', $halamanAktif); ?>">Tambah Barang</a>
    <form method="post" action="index.php?page=auth/logout" style="display:inline">
    <span>Masuk sebagai <strong><?= e($_SESSION['user']['username']); ?></strong></span>
    <button type="submit">Logout</button>
    </form>
    <?php else: ?>
    <a href="auth/login" class="<?= menuAktif('auth/login', $halamanAktif); ?>">Login</a>
    <?php endif; ?>
    </nav>
    <main>
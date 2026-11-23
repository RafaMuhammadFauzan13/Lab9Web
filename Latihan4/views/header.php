<?php
$judulHalaman = $judulHalaman ?? 'Data Barang';
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php echo e($judulHalaman); ?> - Aplikasi CRUD Modular</title>
 <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
 <header>
 <h1>Aplikasi CRUD Modular</h1>
 <p>Latihan 4 - Refactoring CRUD</p>
 </header>
 <nav>
 <a href="index.php?page=barang/list">Data Barang</a>
 <a href="index.php?page=barang/add">Tambah Barang</a>
 </nav>
 <main>
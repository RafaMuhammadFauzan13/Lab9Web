<?php
$judulHalaman = $judulHalaman ?? 'Latihan 3';
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php echo e($judulHalaman); ?> - Aplikasi PHP Modular</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
 <header>
 <h1>Aplikasi PHP Modular</h1>
 <p>Latihan 3 - Router aman</p>
 </header>
 <nav>
 <a href="index.php?page=home">Home</a>
 <a href="index.php?page=tentang">Tentang</a>
 <a href="index.php?page=profil">Profil</a>
 <a href="index.php?page=produk">Produk</a>
 <a href="index.php?page=kontak">Kontak</a>
 </nav>
 <main>
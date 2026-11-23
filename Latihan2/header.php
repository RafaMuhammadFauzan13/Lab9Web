<?php
$judulHalaman = $judulHalaman ?? 'Latihan 2';
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?php echo htmlspecialchars($judulHalaman, ENT_QUOTES, 'UTF-8'); ?> - Aplikasi PHP Modular</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
 <header>
 <h1>Aplikasi PHP Modular</h1>
 <p>Latihan 2 - Library function</p>
 </header>
 <nav>
 <a href="produk.php">Produk</a>
 <a href="daftar.php">Daftar</a>
 </nav>
 <main>
<?php
$judulHalaman = $judulHalaman ?? 'Latihan 1';
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
        <p>Latihan 1 - Template multi-halaman</p>
    </header>
    <nav>
     <a href="home.php">Home</a>
    <a href="profil.php">Profil</a>
    <a href="kontak.php">Kontak</a>
    </nav>
    <main>
<?php
require_once __DIR__ . '/helpers/functions.php';

// Whitelist rute: hanya halaman di daftar ini yang boleh dimuat
$routes = [
 'home' => ['file' => __DIR__ . '/views/home.php', 'judul' => 'Home'],
 'tentang' => ['file' => __DIR__ . '/views/tentang.php', 'judul' => 'Tentang'],
 'profil' => ['file' => __DIR__ . '/views/profil.php', 'judul' => 'Profil'],
 'produk' => ['file' => __DIR__ . '/views/produk.php', 'judul' => 'Produk'],
 'kontak' => ['file' => __DIR__ . '/views/kontak.php', 'judul' => 'Kontak'],
];

// Jika parameter page tidak ada, tampilkan home
$page = $_GET['page'] ?? 'home';

// Validasi: harus string dan terdaftar di whitelist
if (!is_string($page) || !array_key_exists($page, $routes)) {
 http_response_code(404);
 $judulHalaman = '404';
 $contentFile = __DIR__ . '/views/404.php';
} else {
 $judulHalaman = $routes[$page]['judul'];
 $contentFile = $routes[$page]['file'];
}

require_once __DIR__ . '/views/header.php';
require $contentFile;
require_once __DIR__ . '/views/footer.php';
?>
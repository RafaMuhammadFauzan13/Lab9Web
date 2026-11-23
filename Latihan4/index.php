<?php
// Buffer output supaya redirect header('Location: ...') di modul tetap bisa jalan
ob_start();

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/helpers/functions.php';

// Whitelist rute
$routes = [
 'barang/list' => ['file' => __DIR__ . '/modules/barang/list.php', 'judul' => 'Data Barang'],
 'barang/add' => ['file' => __DIR__ . '/modules/barang/add.php', 'judul' => 'Tambah Barang'],
 'barang/edit' => ['file' => __DIR__ . '/modules/barang/edit.php', 'judul' => 'Ubah Barang'],
 'barang/delete' => ['file' => __DIR__ . '/modules/barang/delete.php', 'judul' => 'Hapus Barang'],
];

$page = $_GET['page'] ?? 'barang/list';

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

ob_end_flush();
?>
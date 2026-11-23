<?php
// Logout hanya lewat POST (tombol di header)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    unset($_SESSION['user']);
    session_regenerate_id(true);
    setPesan('sukses', 'Anda telah logout.');
}

header('Location: ' . baseUrl() . 'index.php?page=auth/login');
exit;
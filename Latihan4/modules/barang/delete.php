<?php
// Koneksi ($conn) sudah dimuat oleh router index.php
// Hapus data hanya boleh lewat POST (bukan dengan membuka URL biasa / GET)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['id'] ?? 0);

    if ($id > 0) {
        $stmt = mysqli_prepare($conn, "DELETE FROM data_barang WHERE id_barang = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    }
}

// Baik berhasil maupun dibuka lewat GET, kembali ke daftar barang
header('Location: index.php?page=barang/list');
exit;
?>
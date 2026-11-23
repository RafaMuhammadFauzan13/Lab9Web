<?php
// Koneksi ($conn) dan helper sudah dimuat oleh router index.php
// Hapus data hanya boleh lewat POST (bukan dengan membuka URL biasa / GET)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['id'] ?? 0);

    if ($id > 0) {
        try {
            $stmt = mysqli_prepare($conn, "DELETE FROM data_barang WHERE id_barang = ?");
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                setPesan('sukses', 'Barang berhasil dihapus.');
            } else {
                setPesan('gagal', 'Data tidak ditemukan.');
            }
        } catch (mysqli_sql_exception $ex) {
            error_log($ex->getMessage());
            setPesan('gagal', 'Barang gagal dihapus.');
        }
    }
}

header('Location: ' . baseUrl() . 'index.php?page=barang/list');
exit;
?>
<?php
// Koneksi ($conn) dan helper (e) sudah dimuat oleh router index.php
$error = '';

if (isset($_POST['submit'])) {
    $nama       = trim($_POST['nama'] ?? '');
    $kategori   = $_POST['kategori'] ?? '';
    $harga_jual = (int) ($_POST['harga_jual'] ?? 0);
    $harga_beli = (int) ($_POST['harga_beli'] ?? 0);
    $stok       = (int) ($_POST['stok'] ?? 0);
    $gambar     = null;

    if ($nama === '') {
        $error = 'Nama barang wajib diisi.';
    }

    if ($error === '' && isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] == 0) {
        $file_gambar = $_FILES['file_gambar'];
        $filename = str_replace(' ', '_', basename($file_gambar['name']));
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true)) {
            $error = 'Format gambar harus JPG, PNG, GIF, atau WEBP.';
        } else {
            // Naik dua tingkat: modules/barang -> root Latihan4
            $destination = dirname(__DIR__, 2) . '/gambar/' . $filename;
            if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
                $gambar = $filename; // simpan nama file saja
            }
        }
    }

    if ($error === '') {
        $stmt = mysqli_prepare($conn,
            "INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok)
             VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssiii", $kategori, $nama, $gambar, $harga_beli, $harga_jual, $stok);
        try {
            mysqli_stmt_execute($stmt);
            setPesan('sukses', 'Barang berhasil ditambahkan.');
        } catch (mysqli_sql_exception $ex) {
            error_log($ex->getMessage());
            setPesan('gagal', 'Barang gagal ditambahkan.');
        }

        header('Location: ' . baseUrl() . 'index.php?page=barang/list');
        exit;
    }
}
?>
<h2>Tambah Barang</h2>
<div class="main">
    <?php if ($error !== ''): ?>
    <p style="color: red;"><?= e($error); ?></p>
    <?php endif; ?>

    <form method="post" action="index.php?page=barang/add" enctype="multipart/form-data">
        <div class="input">
            <label>Nama Barang</label>
            <input type="text" name="nama" />
        </div>
        <div class="input">
            <label>Kategori</label>
            <select name="kategori">
                <option value="Komputer">Komputer</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Hand Phone">Hand Phone</option>
            </select>
        </div>
        <div class="input">
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" />
        </div>
        <div class="input">
            <label>Harga Beli</label>
            <input type="text" name="harga_beli" />
        </div>
        <div class="input">
            <label>Stok</label>
            <input type="text" name="stok" />
        </div>
        <div class="input">
            <label>File Gambar</label>
            <input type="file" name="file_gambar" />
        </div>
        <div class="submit">
            <input type="submit" name="submit" value="Simpan" />
        </div>
    </form>
</div>
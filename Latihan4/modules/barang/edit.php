<?php
// Koneksi ($conn) dan helper (e) sudah dimuat oleh router index.php
$error = '';
$daftarKategori = ['Komputer', 'Elektronik', 'Hand Phone'];

if (isset($_POST['submit'])) {
    $id         = (int) ($_POST['id'] ?? 0);
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
                $gambar = $filename;
            }
        }
    }

    if ($error === '') {
        if (!empty($gambar)) {
            $stmt = mysqli_prepare($conn,
                "UPDATE data_barang SET nama=?, kategori=?, harga_jual=?, harga_beli=?, stok=?, gambar=? WHERE id_barang=?");
            mysqli_stmt_bind_param($stmt, "ssiiisi", $nama, $kategori, $harga_jual, $harga_beli, $stok, $gambar, $id);
        } else {
            $stmt = mysqli_prepare($conn,
                "UPDATE data_barang SET nama=?, kategori=?, harga_jual=?, harga_beli=?, stok=? WHERE id_barang=?");
            mysqli_stmt_bind_param($stmt, "ssiiii", $nama, $kategori, $harga_jual, $harga_beli, $stok, $id);
        }
        mysqli_stmt_execute($stmt);

        header('Location: index.php?page=barang/list');
        exit;
    }
}

// Ambil data barang yang akan diubah (dari POST jika form gagal divalidasi, selain itu dari GET)
$id = (int) ($_POST['id'] ?? $_GET['id'] ?? 0);
$stmt = mysqli_prepare($conn, "SELECT * FROM data_barang WHERE id_barang = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
?>
<h2>Ubah Barang</h2>
<div class="main">
    <?php if (!$data): ?>
    <p>Data tidak tersedia.</p>
    <p><a href="index.php?page=barang/list">Kembali ke Data Barang</a></p>
    <?php else: ?>
    <?php if ($error !== ''): ?>
    <p style="color: red;"><?= e($error); ?></p>
    <?php endif; ?>

    <form method="post" action="index.php?page=barang/edit" enctype="multipart/form-data">
        <div class="input">
            <label>Nama Barang</label>
            <input type="text" name="nama" value="<?= e($data['nama']); ?>" />
        </div>
        <div class="input">
            <label>Kategori</label>
            <select name="kategori">
                <?php foreach ($daftarKategori as $k): ?>
                <option value="<?= e($k); ?>" <?= $data['kategori'] === $k ? 'selected="selected"' : ''; ?>><?= e($k); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input">
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" value="<?= (int) $data['harga_jual']; ?>" />
        </div>
        <div class="input">
            <label>Harga Beli</label>
            <input type="text" name="harga_beli" value="<?= (int) $data['harga_beli']; ?>" />
        </div>
        <div class="input">
            <label>Stok</label>
            <input type="text" name="stok" value="<?= (int) $data['stok']; ?>" />
        </div>
        <div class="input">
            <label>File Gambar</label>
            <input type="file" name="file_gambar" />
        </div>
        <div class="submit">
            <input type="hidden" name="id" value="<?= (int) $data['id_barang']; ?>" />
            <input type="submit" name="submit" value="Simpan" />
        </div>
    </form>
    <?php endif; ?>
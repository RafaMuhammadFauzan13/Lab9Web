<?php
// Koneksi ($conn) dan helper (e, formatRupiah) sudah dimuat oleh router index.php
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<h2>Data Barang</h2>
<div class="main">
    <table>
        <tr>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td>
                <?php if (!empty($row['gambar'])): ?>
                <img src="gambar/<?= e($row['gambar']); ?>" alt="<?= e($row['nama']); ?>">
                <?php endif; ?>
            </td>
            <td><?= e($row['nama']); ?></td>
            <td><?= e($row['kategori']); ?></td>
            <td><?= formatRupiah($row['harga_beli']); ?></td>
            <td><?= formatRupiah($row['harga_jual']); ?></td>
            <td><?= (int) $row['stok']; ?></td>
            <td>
                <a href="index.php?page=barang/edit&id=<?= (int) $row['id_barang']; ?>">Ubah</a>
                <form method="post" action="index.php?page=barang/delete" style="display:inline"
                      onsubmit="return confirm('Hapus data ini?')">
                    <input type="hidden" name="id" value="<?= (int) $row['id_barang']; ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endwhile; else: ?>
        <tr>
            <td colspan="7">Belum ada data</td>
        </tr>
        <?php endif; ?>
    </table>
</div>
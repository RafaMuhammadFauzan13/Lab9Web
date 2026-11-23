<?php
$judulHalaman = 'Produk';
require_once __DIR__ . '/helpers/functions.php';
require_once __DIR__ . '/header.php';

$produk = [
 [
 'nama' => 'Laptop Gaming',
 'harga' => 12000000,
 'diskon' => 15,
 'deskripsi' => 'Laptop dengan prosesor cepat, kartu grafis dedicated, dan layar refresh rate tinggi untuk bermain game maupun bekerja.',
 ],
 [
 'nama' => 'Mouse Wireless',
 'harga' => 150000,
 'diskon' => 10,
 'deskripsi' => 'Mouse nirkabel yang ringan dan nyaman digunakan sehari-hari.',
 ],
 [
 'nama' => 'Keyboard Mekanik',
 'harga' => 450000,
 'diskon' => 20,
 'deskripsi' => 'Keyboard mekanik dengan switch responsif, lampu latar, dan bodi yang kokoh untuk mengetik dalam waktu lama.',
 ],
];
?>
<section class="content">
 <h2>Daftar Produk</h2>
 <table border="1" cellpadding="8" cellspacing="0">
 <tr>
 <th>Produk</th>
 <th>Deskripsi</th>
 <th>Harga</th>
 <th>Diskon</th>
 <th>Harga Akhir</th>
 </tr>
 <?php foreach ($produk as $p): ?>
 <?php
 $nominalDiskon = hitungDiskon($p['harga'], $p['diskon']);
 $hargaAkhir = $p['harga'] - $nominalDiskon;
 ?>
 <tr>
 <td><?php echo e($p['nama']); ?></td>
 <td><?php echo e(ringkasTeks($p['deskripsi'], 50)); ?></td>
 <td><?php echo formatRupiah($p['harga']); ?></td>
 <td><?php echo $p['diskon']; ?>% (<?php echo formatRupiah($nominalDiskon); ?>)</td>
 <td><strong><?php echo formatRupiah($hargaAkhir); ?></strong></td>
 </tr>
 <?php endforeach; ?>
 </table>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
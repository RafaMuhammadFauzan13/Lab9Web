<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/header.php';

$barang = [
 ['nama' => 'Buku Tulis', 'harga' => 5000, 'jumlah' => 10],
 ['nama' => 'Pulpen', 'harga' => 3500, 'jumlah' => 5],
 ['nama' => 'Penggaris', 'harga' => 4000, 'jumlah' => 2],
];
$totalSemua = 0;
?>
<section class="content">
 <h2>Total Belanja</h2>
 <table border="1" cellpadding="8" cellspacing="0">
 <tr>
 <th>Barang</th><th>Harga</th><th>Jumlah</th><th>Total</th>
 </tr>
 <?php foreach ($barang as $b): ?>
 <?php
 $total = hitungTotal($b['harga'], $b['jumlah']);
 $totalSemua += $total;
 ?>
 <tr>
 <td><?php echo e($b['nama']); ?></td>
 <td><?php echo formatRupiah($b['harga']); ?></td>
 <td><?php echo $b['jumlah']; ?></td>
 <td><?php echo formatRupiah($total); ?></td>
 </tr>
 <?php endforeach; ?>
 <tr>
 <td colspan="3"><strong>Total Keseluruhan</strong></td>
 <td><strong><?php echo formatRupiah($totalSemua); ?></strong></td>
 </tr>
 </table>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
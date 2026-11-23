<?php
$produk = [
 ['nama' => 'Laptop Gaming', 'harga' => 12000000],
 ['nama' => 'Mouse Wireless', 'harga' => 150000],
 ['nama' => 'Keyboard Mekanik', 'harga' => 450000],
];
?>
<section class="content">
 <h2>Daftar Produk</h2>
 <table border="1" cellpadding="8" cellspacing="0">
 <tr><th>Produk</th><th>Harga</th></tr>
 <?php foreach ($produk as $p): ?>
 <tr>
 <td><?php echo e($p['nama']); ?></td>
 <td><?php echo formatRupiah($p['harga']); ?></td>
 </tr>
 <?php endforeach; ?>
 </table>
</section>
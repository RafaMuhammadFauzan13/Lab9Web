<?php
$judulHalaman = 'Daftar';
require_once __DIR__ . '/helpers/functions.php';
require_once __DIR__ . '/header.php';

$biayaDaftar = 50000;
$email = '';
$pesan = '';
$hasil = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $email = trim((string) ($_POST['email'] ?? ''));
 $pesan = trim((string) ($_POST['pesan'] ?? ''));
 $hasil = validasiEmail($email);
}
?>
<section class="content">
 <h2>Form Pendaftaran</h2>
 <p>Biaya pendaftaran: <strong><?php echo formatRupiah($biayaDaftar); ?></strong></p>

 <form method="post" action="">
 <p>
 <label>Email</label><br>
 <input type="text" name="email" value="<?php echo e($email); ?>">
 </p>
 <p>
 <label>Pesan</label><br>
 <textarea name="pesan" rows="4" cols="40"><?php echo e($pesan); ?></textarea>
 </p>
 <button type="submit">Kirim</button>
 </form>

 <?php if ($hasil === true): ?>
 <p style="color: green;">Email <strong><?php echo e($email); ?></strong> valid.</p>
 <p>Ringkasan pesan: <?php echo e(ringkasTeks($pesan, 30)); ?></p>
 <?php elseif ($hasil === false): ?>
 <p style="color: red;">Email <strong><?php echo e($email); ?></strong> tidak valid.</p>
 <?php endif; ?>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
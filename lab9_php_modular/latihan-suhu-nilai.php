<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/header.php';

$daftarSuhu = [0, 25, 37, 100];
$daftarNilai = [92, 78, 60, 45, 20];
?>
<section class="content">
 <h2>Konversi Celcius ke Fahrenheit</h2>
 <ul>
 <?php foreach ($daftarSuhu as $c): ?>
 <li><?php echo $c; ?> &deg;C = <?php echo konversiCelciusKeFahrenheit($c); ?> &deg;F</li>
 <?php endforeach; ?>
 </ul>

 <h2>Status Nilai</h2>
 <ul>
 <?php foreach ($daftarNilai as $n): ?>
 <li>Nilai <?php echo $n; ?> = <?php echo tentukanStatusNilai($n); ?></li>
 <?php endforeach; ?>
 </ul>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
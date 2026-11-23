<?php
function formatRupiah(float $angka): string {
 return 'Rp ' . number_format($angka, 0, ',', '.');
}

function e(string $nilai): string {
 return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

// Latihan function 1
function konversiCelciusKeFahrenheit(float $c): float {
 return ($c * 9 / 5) + 32;
}

// Latihan function 2 (rentang nilai bisa kamu ubah sendiri)
function tentukanStatusNilai(float $nilai): string {
 if ($nilai >= 85) {
 return 'A';
 } elseif ($nilai >= 70) {
 return 'B';
 } elseif ($nilai >= 55) {
 return 'C';
 } elseif ($nilai >= 40) {
 return 'D';
 }
 return 'E';
}

// Latihan function 3
function hitungTotal(float $harga, int $jumlah): float {
 return $harga * $jumlah;
}
?>
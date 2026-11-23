<?php
// Mengubah angka menjadi format rupiah, contoh: 150000 -> Rp 150.000
function formatRupiah(float $angka): string {
 return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Menghitung NOMINAL diskon dari harga dan persen
function hitungDiskon(float $harga, float $persen = 10): float {
 return $harga * ($persen / 100);
}

// Mengecek apakah format email valid (true/false)
function validasiEmail(string $email): bool {
 return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Memotong teks panjang dan menambahkan "..." di akhir
function ringkasTeks(string $teks, int $batas = 100): string {
 if (mb_strlen($teks) <= $batas) {
 return $teks;
 }
 return mb_substr($teks, 0, $batas) . '...';
}

// Escape output agar aman ditampilkan di HTML
function e(string $nilai): string {
 return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}
?>
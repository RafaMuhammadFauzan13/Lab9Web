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

// Mengembalikan 'active' jika rute menu sama dengan halaman yang sedang dibuka
function menuAktif(string $rute, string $halamanSekarang): string {
 return $rute === $halamanSekarang ? 'active' : '';
}

// Simpan pesan untuk ditampilkan di halaman berikutnya. $tipe: 'sukses' atau 'gagal'
function setPesan(string $tipe, string $teks): void {
 $_SESSION['pesan'] = ['tipe' => $tipe, 'teks' => $teks];
}

// Ambil pesan (kalau ada), tampilkan, lalu hapus supaya hanya muncul sekali
function tampilkanPesan(): string {
 if (empty($_SESSION['pesan'])) {
 return '';
 }
 $p = $_SESSION['pesan'];
 unset($_SESSION['pesan']);
 $kelas = $p['tipe'] === 'sukses' ? 'pesan-sukses' : 'pesan-gagal';
 return '<div class="pesan ' . $kelas . '">' . e($p['teks']) . '</div>';
}

// Cek apakah pengguna sudah login
function sudahLogin(): bool {
 return !empty($_SESSION['user']);
}

// Alamat folder aplikasi, contoh: /Lab9Web/Tantangan/
function baseUrl(): string {
 return rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/') . '/';
}
?>
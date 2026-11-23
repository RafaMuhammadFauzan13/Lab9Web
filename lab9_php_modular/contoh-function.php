<?php
// 1. Function tanpa parameter
function tampilkanSalam() {
    echo "Selamat belajar PHP modular!";
}
tampilkanSalam();

echo "<br>";

// 2. Function dengan parameter
function sapaPengguna($nama) {
    echo "Halo, " . htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
}
sapaPengguna("Rina");

echo "<br>";

// 3. Function dengan return
function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}
$luas = hitungLuasPersegiPanjang(8, 5);
echo "Luas: " . $luas;

echo "<br>";

// 4. Type declaration dan nilai default
function hitungDiskon(float $harga, float $persen = 10): float {
    return $harga * ($persen / 100);
}
echo hitungDiskon(200000); // diskon 10%
echo "<br>";
echo hitungDiskon(200000, 15); // diskon 15%
?>

<?php
// Konversi angka 1-9 menjadi huruf menggunakan switch

$angka = 5; // Ganti angka ini (1-9) untuk mencoba nilai lain

echo "<h2>Konversi Angka ke Terbilang</h2>";
echo "<p>Angka: <strong>$angka</strong></p>";

switch ($angka) {
    case 1:
        echo "<p>Terbilang: <strong>satu</strong></p>";
        break;
    case 2:
        echo "<p>Terbilang: <strong>dua</strong></p>";
        break;
    case 3:
        echo "<p>Terbilang: <strong>tiga</strong></p>";
        break;
    case 4:
        echo "<p>Terbilang: <strong>empat</strong></p>";
        break;
    case 5:
        echo "<p>Terbilang: <strong>lima</strong></p>";
        break;
    case 6:
        echo "<p>Terbilang: <strong>enam</strong></p>";
        break;
    case 7:
        echo "<p>Terbilang: <strong>tujuh</strong></p>";
        break;
    case 8:
        echo "<p>Terbilang: <strong>delapan</strong></p>";
        break;
    case 9:
        echo "<p>Terbilang: <strong>sembilan</strong></p>";
        break;
    default:
        echo "<p>Angka tidak valid! Masukkan angka 1-9.</p>";
}
?>

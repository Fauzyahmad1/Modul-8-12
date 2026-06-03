<?php
// Menghitung keliling lingkaran dengan jari-jari 15 cm
// Rumus: K = 2 * pi * r

$jari_jari = 15;
$pi = 3.14159265358979;

$keliling = 2 * $pi * $jari_jari;

echo "<h2>Keliling Lingkaran</h2>";
echo "<p>Jari-jari (r) : $jari_jari cm</p>";
echo "<p>Nilai Pi (π)  : $pi</p>";
echo "<p>Keliling      : 2 × π × r = 2 × $pi × $jari_jari</p>";
echo "<p><strong>Hasil Keliling = " . $keliling . " cm</strong></p>";
?>

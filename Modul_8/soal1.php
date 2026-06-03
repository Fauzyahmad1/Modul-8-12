<?php

$gaji_pokok     = 3250000;
$tunjangan       = 1200000;
$persentase_pajak = 10; // 10%

// Gaji kotor = gaji pokok + tunjangan
$gaji_kotor = $gaji_pokok + $tunjangan;

// Pajak = 10% dari gaji kotor
$pajak = ($persentase_pajak / 100) * $gaji_kotor;

// Gaji bersih = gaji kotor - pajak
$gaji_bersih = $gaji_kotor - $pajak;

echo "<h2>Perhitungan Gaji Bersih Obi</h2>";
echo "<table border='1' cellpadding='8'>";
echo "<tr><td>Gaji Pokok</td><td>Rp. " . number_format($gaji_pokok, 0, ',', '.') . ",-</td></tr>";
echo "<tr><td>Tunjangan Jabatan</td><td>Rp. " . number_format($tunjangan, 0, ',', '.') . ",-</td></tr>";
echo "<tr><td><strong>Gaji Kotor</strong></td><td><strong>Rp. " . number_format($gaji_kotor, 0, ',', '.') . ",-</strong></td></tr>";
echo "<tr><td>Pajak Penghasilan ($persentase_pajak%)</td><td>Rp. " . number_format($pajak, 0, ',', '.') . ",-</td></tr>";
echo "<tr><td><strong>Gaji Bersih</strong></td><td><strong>Rp. " . number_format($gaji_bersih, 0, ',', '.') . ",-</strong></td></tr>";
echo "</table>";

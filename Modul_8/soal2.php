<?php

$total_uang = 1387500;
$sisa       = $total_uang;

$pecahan = array(100000, 50000, 20000, 10000, 5000, 2000, 500);

echo "<h2>Pecahan Uang Ani</h2>";
echo "<p>Total uang yang diambil: Rp. " . number_format($total_uang, 0, ',', '.') . ",-</p>";
echo "<table border='1' cellpadding='8'>";
echo "<tr><th>Pecahan</th><th>Jumlah Lembar/Keping</th></tr>";

foreach ($pecahan as $nilai_pecahan) {
    $jumlah = (int)($sisa / $nilai_pecahan);
    $sisa   = $sisa % $nilai_pecahan;
    echo "<tr>";
    echo "<td>Rp. " . number_format($nilai_pecahan, 0, ',', '.') . ",-</td>";
    echo "<td>$jumlah</td>";
    echo "</tr>";
}

echo "</table>";
echo "<p>Sisa: Rp. $sisa</p>";

echo "<hr>";

$siswa = array(
    array("no" => 1, "poin" => 75,  "nama" => "Adi"),
    array("no" => 2, "poin" => 80,  "nama" => "Joni"),
    array("no" => 3, "poin" => 65,  "nama" => "Jihan"),
    array("no" => 4, "poin" => 70,  "nama" => "Aya"),
    array("no" => 5, "poin" => 85,  "nama" => "Ita"),
    array("no" => 6, "poin" => 90,  "nama" => "Budi"),
    array("no" => 7, "poin" => 95,  "nama" => "Tini"),
    array("no" => 8, "poin" => 65,  "nama" => "Sari"),
);

echo "<h2>Data Nilai Akhir Siswa</h2>";
echo "<table border='1' cellpadding='8'>";
echo "<tr><th>No Urut</th><th>Poin</th><th>Siswa</th></tr>";
foreach ($siswa as $s) {
    echo "<tr><td>{$s['no']}</td><td>{$s['poin']}</td><td>{$s['nama']}</td></tr>";
}
echo "</table>";

// a) Tampilkan poin siswa nomor urut 5
echo "<h3>a) Poin siswa nomor urut 5:</h3>";
echo "Poin siswa ke-5 (" . $siswa[4]['nama'] . ") = " . $siswa[4]['poin'];

// b) Tampilkan semua nama siswa yang memiliki poin 90
echo "<h3>b) Nama siswa dengan poin 90:</h3>";
$ditemukan = false;
for ($i = 0; $i < count($siswa); $i++) {
    if ($siswa[$i]['poin'] == 90) {
        echo $siswa[$i]['nama'] . "<br>";
        $ditemukan = true;
    }
}
if (!$ditemukan) echo "Tidak ada siswa dengan poin 90";

// c) Tampilkan semua nama siswa yang memiliki poin 100
echo "<h3>c) Nama siswa dengan poin 100:</h3>";
$ditemukan = false;
for ($i = 0; $i < count($siswa); $i++) {
    if ($siswa[$i]['poin'] == 100) {
        echo $siswa[$i]['nama'] . "<br>";
        $ditemukan = true;
    }
}
if (!$ditemukan) echo "Tidak ada siswa dengan poin 100";

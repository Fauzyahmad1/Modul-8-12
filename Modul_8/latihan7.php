<?php

$namaBuah = array("Nanas", "Mangga", "jeruk", "Apel", "Melon", "Manggis");
echo "saya suka " . $namaBuah[0] . ", " . $namaBuah[1] . " dan " . $namaBuah[2] . ".";

// tampikan Mangga
echo "saya suka " . $namaBuah[1];
// tampikan Jeruk
echo "saya suka " . $namaBuah[2];
// tampilkan Apel
echo "saya suka " . $namaBuah[3];
// tampilkan Melon
echo "saya suka " . $namaBuah[4];

// array dengan spesifik index
$umur = array("Andi"=>"35 Tahun", "Ben"=>"37 Tahun", "Joe"=>"Tahun");
$umur['ahmad'] = "50 Tahun";
echo "Umur andi adalah " . $umur['andi'];
// tampilkan semua umur
foreach ($umur as $nama => $nilai) {
    echo "Umur $nama adalah $nilai <br>";
}
?>

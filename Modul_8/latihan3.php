<?php
$x = 5;
$y = 10;


echo "x = 5 <br>";
echo "y = 10 <br>";
echo "<br>";
echo "Penambahan " . $x + $y . "<br>";
echo "Pengurangan " . $x - $y . "<br>";
echo "Perkalian " . $x * $y . "<br>";
echo "Pembagian " . $x / $y . "<br>";
echo "Modulus " . $x % $y . "<br>";
echo "Exponensial " . $x ** $y . "<br>";
echo "---------------------------------------<br>";

echo("<br>");

$x += 2; 
$y *= 2; 

echo "x += 2<br>";
echo "y *= 2<br>";
echo "<br>";
echo "Penambahan x " . $x . "<br>";
echo "Perkalian y " . $y . "<br>";
echo "---------------------------------------<br>";
echo("<br>");

$x = 5;
$y = 10;

echo "x = 5 (Tambah) <br>"; echo("<br>");
echo "Isi ++x = " . ++$x . "<br>"; // tambah dulu baru tampil
echo "Isi x++ = " . $x++ . "<br>"; // tampil dulu baru tambah
echo "Hasil Isi x = " . $x . "<br>";     // nilai akhir x
echo "---------------------------------------<br>";
echo("<br>");

echo "y = 10 (Kurang) <br>"; echo("<br>");
echo "Isi --y = " . --$y . "<br>"; // kurang dulu baru tampil
echo "Isi y-- = " . $y-- . "<br>"; // tampil dulu baru kurang
echo "Hasil Isi y = " . $y . "<br>";     // nilai akhir y
echo "<br>";

$user = "Andi darmawan";
$status = (empty($user)) ? "Kosong" : "Ada isi";
echo $status . "<br>";

echo $color = $color ?? "red";

?>

<!--
JAWABAN: Perbedaan $x++ dan ++$x

- ++$x  (Pre-increment)  : 
Nilai $x DINAIKKAN DULU, baru digunakan/ditampilkan.
Jika $x = 5, maka echo ++$x menghasilkan 6, dan $x menjadi 6.

- $x++  (Post-increment) : Nilai $x DIGUNAKAN/DITAMPILKAN DULU, baru dinaikkan.
Jika $x = 6 (setelah ++$x), maka echo $x++ menghasilkan 6,
tapi setelah itu $x menjadi 7.

-->

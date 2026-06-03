<?php
// Menampilkan pola bintang segitiga menggunakan nested loop
echo "<h2>Pola Bintang</h2>";
echo "<pre>";
for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}
echo "</pre>";
?>

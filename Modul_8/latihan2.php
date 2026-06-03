<?php

$txt = "Selamat datang !";
$txt2 = "Politeknik Negeri Madiun";
$x = 5;
$y = 10.5;

echo "<p>isi Variable txt adalah: $txt</p>";
echo "<p>isi Variable x adalah: $x</p>";
echo "<p>isi Variable y adalah: $y</p>";
echo "Belajar PHP di " . $txt2 . "<br>"; 

echo $x + $y;

define("Chaos_Creator", "Fauzy Ahmad Muzayyin");
echo "<br>" . Chaos_Creator;
?>

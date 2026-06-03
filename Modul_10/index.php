<?php

require_once ('kelas/Manusia.php');

$andi = new Manusia();
$andi->setNama("Andi Pratama");

$budi = new Manusia();
$budi->setNama("Budi Santoso");

// Tampilkan nama lengkap $budi
echo "Nama: " . $budi->getNama();
echo "<br>";

// Tambah dengan identitas Anda
$saya = new Manusia();
$saya->setNama("Rizky Pratama");
$saya->setUmur(20);
echo "Nama Saya: " . $saya->getNama();
echo "<br>";

// Tampilkan NIK
echo "NIK: " . $saya->getNIK();
echo "<br>";

// Tampilkan umur
echo "Umur: " . $saya->getUmur() . " tahun";
echo "<br>";

/*
KESIMPULAN:
- Class adalah blueprint/cetak biru untuk membuat objek.
- Objek dibuat dari class menggunakan keyword 'new'.
- Properti dengan access modifier 'protected' tidak bisa diakses langsung
  dari luar class, sehingga digunakan getter dan setter (public function)
  untuk membaca dan mengubah nilainya.
- Access modifier 'private' membuat method/properti hanya bisa diakses
  dari dalam class itu sendiri. Jika getNIK() dibiarkan private, maka
  memanggil $saya->getNIK() dari luar class akan menyebabkan error.
- Constructor digunakan untuk menginisialisasi nilai properti saat objek dibuat.
- Dengan OOP, kode menjadi lebih terstruktur, mudah dikelola, dan bisa dipakai ulang.
*/

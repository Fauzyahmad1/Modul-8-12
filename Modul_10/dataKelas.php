<?php

require_once ('kelas/Mahasiswa.php');

echo "<h3>=== Data Kelas Mahasiswa ===</h3>";

$mhs1 = new mahasiswa(nama: "Nama Anda");
$mhs1->setNIM("NIM anda");
$mhs1->setKelas("Kelas anda");
$mhs1->setJurusan("Teknik Informatika");
$mhs1->setUmur(20);

// tampilkan nama, nim, dan kelas dari $mhs1
echo "Nama    : " . $mhs1->getNama()    . "<br>";
echo "NIM     : " . $mhs1->getNIM()     . "<br>";
echo "Kelas   : " . $mhs1->getKelas()   . "<br>";
echo "Jurusan : " . $mhs1->getJurusan() . "<br>";
echo "Umur    : " . $mhs1->getUmur()    . " tahun<br>";

echo "<hr>";

$mhs2 = new mahasiswa(nama: "Budi Santoso");
$mhs2->setNIM("2023001002");
$mhs2->setKelas("TI-3A");
$mhs2->setJurusan("Sistem Informasi");
$mhs2->setUmur(19);

echo "Nama    : " . $mhs2->getNama()    . "<br>";
echo "NIM     : " . $mhs2->getNIM()     . "<br>";
echo "Kelas   : " . $mhs2->getKelas()   . "<br>";
echo "Jurusan : " . $mhs2->getJurusan() . "<br>";
echo "Umur    : " . $mhs2->getUmur()    . " tahun<br>";

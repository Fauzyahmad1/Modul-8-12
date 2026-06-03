<?php

require_once ('kelas/akunBank.php');

echo "<h3>=== Data Akun Bank ===</h3>";

$data1 = new akunBank(nomorAkun: "001", nominal: 10000);
$data1->setNama("Andi Pratama");

$data2 = new akunBank(nomorAkun: "002", nominal: 10000);
$data2->setNama("Budi Santoso");

// --- Akun 1 ---
echo "<b>Akun: " . $data1->getAccountNumber() . " - " . $data1->getNama() . "</b><br>";
$data1->tampilUang();
$data1->tambahUang(5000);
$data1->tampilUang();
$data1->kurangUang(2000);
$data1->tampilUang();
$data1->hitungPajak();

echo "<hr>";

// --- Akun 2 ---
echo "<b>Akun: " . $data2->getAccountNumber() . " - " . $data2->getNama() . "</b><br>";
$data2->tampilUang();
$data2->tambahUang(20000);
$data2->tampilUang();
$data2->kurangUang(15000);
$data2->tampilUang();
$data2->hitungPajak();

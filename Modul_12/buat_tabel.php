<?php
require_once 'koneksi.php';

// Buat objek Database (OOP)
$db  = new Database();
$con = $db->getConnection();

// Buat query DDL untuk membuat tabel t_login
$q = "CREATE TABLE IF NOT EXISTS t_login (
    id               INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username         VARCHAR(30)  NOT NULL,
    password         VARCHAR(50)  NOT NULL,
    email            VARCHAR(50),
    tgl_registrasi   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Kirim query ke server basis data
$hasil = $con->query($q);

// Periksa hasil pengiriman query
if ($hasil === TRUE) {
    echo "Tabel t_login berhasil dibuat";
} else {
    echo "Tabel gagal dibuat: " . $con->error;
}

// Menutup koneksi
$con->close();
?>

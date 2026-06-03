<?php
require_once 'koneksi.php';

$db  = new Database();
$con = $db->getConnection();

// Filter input dari metode GET untuk string query
$input = $con->escape_string($_GET['id'] ?? '');

// Membuat query dengan prepared statement
$statement = $con->prepare("Select * from t_dosen where idDosen=?");

// Merubah ? sesuai dengan tipe data input yang dibutuhkan
// i = integer, s = string, d = double, b = blob
$statement->bind_param("i", $input);

// Mengeksekusi query ke basis data
$statement->execute();

// Mendapatkan hasil dari eksekusi query
$hasil = $statement->get_result();

// Perulangan untuk mendapatkan baris data
while ($baris = $hasil->fetch_assoc()) {
    // Filter data tampilan untuk data teks saja tanpa kode html
    echo htmlspecialchars($baris['namaDosen']) . "<br>";
}

$con->close();
?>

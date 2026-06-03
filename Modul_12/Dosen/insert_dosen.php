<?php
require_once 'koneksi.php';

$db  = new Database();
$con = $db->getConnection();

// Query INSERT sesuai modul
$sql = "INSERT INTO t_dosen (idDosen, namaDosen, noHP) VALUES (18, 'Rahmat Dwi Prasetya', 'rahmat@example.com')";

if ($con->query($sql) === TRUE) {
    echo "Data dosen berhasil diinsert!";
} else {
    echo "Error: " . $con->error;
}

$con->close();
?>

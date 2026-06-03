<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// mengecek apakah tombol input dari form telah diklik
if (isset($_POST['input'])) {

    // membuat variabel untuk menampung data dari form
    $namaDosen = mysqli_real_escape_string($link, $_POST['namaDosen']);
    $noHP      = mysqli_real_escape_string($link, $_POST['noHP']);

    // jalankan query INSERT untuk menambah data ke database
    $query  = "INSERT INTO t_dosen VALUES (NULL, '$namaDosen', '$noHP')";
    $result = mysqli_query($link, $query);

    // periksa query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }
}

// melakukan redirect (mengalihkan) ke halaman viewdosen.php
header("location: viewdosen.php");
exit;
?>

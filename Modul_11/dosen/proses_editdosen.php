<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {

    // buat koneksi dengan database
    include("koneksi.php");

    // membuat variabel untuk menampung data dari form edit
    $id        = (int) $_POST['idDosen'];
    $namaDosen = mysqli_real_escape_string($link, $_POST['namaDosen']);
    $noHP      = mysqli_real_escape_string($link, $_POST['noHP']);

    // buat dan jalankan query UPDATE
    $query  = "UPDATE t_dosen SET namaDosen = '$namaDosen', noHP = '$noHP' WHERE idDosen = '$id'";
    $result = mysqli_query($link, $query);

    // periksa hasil query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }
}

// lakukan redirect ke halaman viewdosen.php
header("location: viewdosen.php");
exit;
?>

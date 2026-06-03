<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
    $kodeMK = (int) $_POST['kodeMK'];
    $namaMK = mysqli_real_escape_string($link, $_POST['namaMK']);
    $sks    = (int) $_POST['sks'];
    $jam    = (int) $_POST['jam'];

    $query  = "INSERT INTO t_matakuliah VALUES ('$kodeMK', '$namaMK', '$sks', '$jam')";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
}

header("location: viewmatakuliah.php");
exit;
?>

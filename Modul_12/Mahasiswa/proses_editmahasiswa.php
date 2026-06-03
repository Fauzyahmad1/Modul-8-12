<?php
require_once 'MahasiswaModel.php';

if (isset($_POST['edit'])) {
    $mhsModel = new MahasiswaModel();
    $npm      = (int) $_POST['npm'];
    $namaMhs  = trim($_POST['namaMhs']);
    $prodi    = trim($_POST['prodi']);
    $alamat   = trim($_POST['alamat']);
    $noHP     = trim($_POST['noHP']);
    $mhsModel->update($npm, $namaMhs, $prodi, $alamat, $noHP);
}

header("location: viewmahasiswa.php");
exit;
?>

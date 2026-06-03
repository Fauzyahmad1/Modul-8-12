<?php
require_once 'MahasiswaModel.php';

if (isset($_GET['npm'])) {
    $mhsModel = new MahasiswaModel();
    $npm = (int) $_GET['npm'];
    $mhsModel->delete($npm);
}

header("location: viewmahasiswa.php");
exit;
?>

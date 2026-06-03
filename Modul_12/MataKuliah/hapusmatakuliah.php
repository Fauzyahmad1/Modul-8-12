<?php
require_once 'MatakuliahModel.php';

if (isset($_GET['kodeMK'])) {
    $mkModel = new MatakuliahModel();
    $kodeMK  = (int) $_GET['kodeMK'];
    $mkModel->delete($kodeMK);
}

header("location: viewmatakuliah.php");
exit;
?>

<?php
require_once 'MatakuliahModel.php';

if (isset($_POST['edit'])) {
    $mkModel = new MatakuliahModel();
    $kodeMK  = (int) $_POST['kodeMK'];
    $namaMK  = trim($_POST['namaMK']);
    $sks     = (int) $_POST['sks'];
    $jam     = (int) $_POST['jam'];
    $mkModel->update($kodeMK, $namaMK, $sks, $jam);
}

header("location: viewmatakuliah.php");
exit;
?>

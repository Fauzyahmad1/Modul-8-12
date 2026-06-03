<?php
require_once 'DosenModel.php';

if (isset($_POST['edit'])) {
    $dosenModel = new DosenModel();
    $id        = (int) $_POST['idDosen'];
    $namaDosen = trim($_POST['namaDosen']);
    $noHP      = trim($_POST['noHP']);
    // Panggil method update() — Prepared Statement
    $dosenModel->update($id, $namaDosen, $noHP);
}

header("location: viewdosen.php");
exit;
?>

<?php
require_once 'DosenModel.php';

if (isset($_GET['idDosen'])) {
    $dosenModel = new DosenModel();
    $id = (int) $_GET['idDosen'];
    // Panggil method delete() — Prepared Statement
    $dosenModel->delete($id);
}

header("location: viewdosen.php");
exit;
?>

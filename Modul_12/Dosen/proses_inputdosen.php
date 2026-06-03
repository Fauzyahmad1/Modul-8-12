<?php
require_once 'DosenModel.php';

if (isset($_POST['input'])) {
    // Instansiasi DosenModel (OOP)
    $dosenModel = new DosenModel();

    // Ambil data dari form
    $namaDosen = trim($_POST['namaDosen']);
    $noHP      = trim($_POST['noHP']);

    // Panggil method create() — di dalamnya sudah menggunakan Prepared Statement
    $dosenModel->create($namaDosen, $noHP);
}

header("location: viewdosen.php");
exit;
?>

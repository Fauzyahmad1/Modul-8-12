<?php
require_once 'DosenModel.php';

$dosenModel = new DosenModel();

if (isset($_GET['idDosen'])) {
    $id   = (int) $_GET['idDosen'];

    $data = $dosenModel->readById($id);
    if (!$data) {
        header("location: viewdosen.php");
        exit;
    }
} else {
    header("location: viewdosen.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Dosen – OOP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <span class="brand">&#127979; SIM Kampus</span>
        <a href="viewdosen.php">Data Dosen</a>
        <a href="viewmahasiswa.php">Data Mahasiswa</a>
        <a href="viewmatakuliah.php">Data Matakuliah</a>
        <span class="oop-badge">OOP + Prepared Statement</span>
    </nav>
    <div class="wrapper">
        <div class="card" style="max-width:480px;margin:0 auto;">
            <h1>&#9998; Edit Data Dosen</h1>
            <div class="oop-info">Menggunakan <strong>DosenModel::update()</strong> dengan Prepared Statement.</div>
            <form action="proses_editdosen.php" method="post">
                <div class="form-group">
                    <label>ID Dosen</label>
                    <input type="hidden" name="idDosen" value="<?= $data['idDosen'] ?>">
                    <input type="text" value="<?= $data['idDosen'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="namaDosen">Nama Dosen</label>
                    <input type="text" name="namaDosen" id="namaDosen"
                        value="<?= htmlspecialchars($data['namaDosen']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="noHP">No HP</label>
                    <input type="text" name="noHP" id="noHP"
                        value="<?= htmlspecialchars($data['noHP']) ?>" required>
                </div>
                <button type="submit" name="edit" class="btn btn-warning">&#128190; Update Data</button>
                <a href="viewdosen.php" class="btn btn-primary" style="margin-left:8px;">&#8592; Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>
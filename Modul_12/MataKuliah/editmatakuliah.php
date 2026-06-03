<?php
require_once 'MatakuliahModel.php';
$mkModel = new MatakuliahModel();

if (isset($_GET['kodeMK'])) {
    $kodeMK = (int) $_GET['kodeMK'];
    $data   = $mkModel->readByKode($kodeMK);
    if (!$data) {
        header("location: viewmatakuliah.php");
        exit;
    }
} else {
    header("location: viewmatakuliah.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Matakuliah – OOP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <span class="brand">&#127979; SIM Kampus</span>
        <a href="viewdosen.php">Data Dosen</a>
        <a href="viewmahasiswa.php">Data Mahasiswa</a>
        <a href="viewmatakuliah.php" class="active">Data Matakuliah</a>
        <span class="oop-badge">OOP + Prepared Statement</span>
    </nav>
    <div class="wrapper">
        <div class="card" style="max-width:480px;margin:0 auto;">
            <h1>&#9998; Edit Data Matakuliah</h1>
            <div class="oop-info">Menggunakan <strong>MatakuliahModel::update()</strong> dengan Prepared Statement.</div>
            <form action="proses_editmatakuliah.php" method="post">
                <div class="form-group">
                    <label>Kode MK</label>
                    <input type="hidden" name="kodeMK" value="<?= $data['kodeMK'] ?>">
                    <input type="text" value="<?= $data['kodeMK'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="namaMK">Nama Matakuliah</label>
                    <input type="text" name="namaMK" id="namaMK" value="<?= htmlspecialchars($data['namaMK']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="sks">SKS</label>
                    <input type="number" name="sks" id="sks" min="1" max="6" value="<?= $data['sks'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="jam">Jam</label>
                    <input type="number" name="jam" id="jam" min="1" value="<?= $data['jam'] ?>" required>
                </div>
                <button type="submit" name="edit" class="btn btn-warning">&#128190; Update Data</button>
                <a href="viewmatakuliah.php" class="btn btn-primary" style="margin-left:8px;">&#8592; Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>
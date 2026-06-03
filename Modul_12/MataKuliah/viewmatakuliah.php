<?php
require_once 'MatakuliahModel.php';
$mkModel = new MatakuliahModel();
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$listMK  = $mkModel->readAll($keyword);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Matakuliah – OOP</title>
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
    <div class="card">
        <h1>&#128218; Tabel Matakuliah</h1>
        <div class="oop-info">Menggunakan <strong>Class MatakuliahModel</strong> dengan Prepared Statements.</div>

        <form method="get" action="viewmatakuliah.php">
            <div class="search-bar">
                <input type="text" name="keyword" placeholder="&#128269; Cari nama matakuliah..."
                       value="<?= htmlspecialchars($keyword) ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if ($keyword !== ''): ?>
                    <a href="viewmatakuliah.php" class="btn btn-warning">Reset</a>
                <?php endif; ?>
            </div>
        </form>

        <a href="inputmatakuliah.php" class="btn btn-success" style="margin-bottom:14px;">&#10133; Tambah Matakuliah</a>

        <table>
            <thead>
                <tr><th>Kode MK</th><th>Nama Matakuliah</th><th>SKS</th><th>Jam</th><th>Pilihan</th></tr>
            </thead>
            <tbody>
            <?php if (count($listMK) > 0): ?>
                <?php foreach ($listMK as $row): ?>
                <tr>
                    <td><?= $row['kodeMK'] ?></td>
                    <td><?= htmlspecialchars($row['namaMK']) ?></td>
                    <td><span class="badge badge-success"><?= $row['sks'] ?> SKS</span></td>
                    <td><?= $row['jam'] ?> jam</td>
                    <td>
                        <a href="editmatakuliah.php?kodeMK=<?= $row['kodeMK'] ?>" class="btn btn-warning btn-sm">&#9998; Edit</a>
                        <a href="hapusmatakuliah.php?kodeMK=<?= $row['kodeMK'] ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus data ini?')">&#128465; Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align:center;color:#888;">Data tidak ditemukan.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

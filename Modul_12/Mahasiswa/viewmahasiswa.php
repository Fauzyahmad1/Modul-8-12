<?php
require_once 'MahasiswaModel.php';
$mhsModel = new MahasiswaModel();
$keyword  = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$listMhs  = $mhsModel->readAll($keyword);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Mahasiswa – OOP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <span class="brand">&#127979; SIM Kampus</span>
    <a href="viewdosen.php">Data Dosen</a>
    <a href="viewmahasiswa.php" class="active">Data Mahasiswa</a>
    <a href="viewmatakuliah.php">Data Matakuliah</a>
    <span class="oop-badge">OOP + Prepared Statement</span>
</nav>
<div class="wrapper">
    <div class="card">
        <h1>&#127891; Tabel Mahasiswa</h1>
        <div class="oop-info">Menggunakan <strong>Class MahasiswaModel</strong> dengan Prepared Statements.</div>

        <form method="get" action="viewmahasiswa.php">
            <div class="search-bar">
                <input type="text" name="keyword" placeholder="&#128269; Cari nama mahasiswa..."
                       value="<?= htmlspecialchars($keyword) ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if ($keyword !== ''): ?>
                    <a href="viewmahasiswa.php" class="btn btn-warning">Reset</a>
                <?php endif; ?>
            </div>
        </form>

        <a href="inputmahasiswa.php" class="btn btn-success" style="margin-bottom:14px;">&#10133; Tambah Mahasiswa</a>

        <table>
            <thead>
                <tr><th>NPM</th><th>Nama</th><th>Prodi</th><th>Alamat</th><th>No HP</th><th>Pilihan</th></tr>
            </thead>
            <tbody>
            <?php if (count($listMhs) > 0): ?>
                <?php foreach ($listMhs as $row): ?>
                <tr>
                    <td><?= $row['npm'] ?></td>
                    <td><?= htmlspecialchars($row['namaMhs']) ?></td>
                    <td><span class="badge badge-info"><?= htmlspecialchars($row['prodi']) ?></span></td>
                    <td><?= htmlspecialchars($row['alamat']) ?></td>
                    <td><?= htmlspecialchars($row['noHP']) ?></td>
                    <td>
                        <a href="editmahasiswa.php?npm=<?= $row['npm'] ?>" class="btn btn-warning btn-sm">&#9998; Edit</a>
                        <a href="hapusmahasiswa.php?npm=<?= $row['npm'] ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus data ini?')">&#128465; Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" style="text-align:center;color:#888;">Data tidak ditemukan.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

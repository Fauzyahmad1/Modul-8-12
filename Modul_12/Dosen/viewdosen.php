<?php
require_once 'DosenModel.php';

// Instansiasi kelas DosenModel (OOP)
$dosenModel = new DosenModel();

// Ambil keyword pencarian dari GET
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

// Panggil method readAll dari DosenModel (menggunakan Prepared Statement)
$listDosen = $dosenModel->readAll($keyword);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Dosen – OOP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <span class="brand">&#127979; SIM Kampus</span>
    <a href="viewdosen.php" class="active">Data Dosen</a>
    <a href="viewmahasiswa.php">Data Mahasiswa</a>
    <a href="viewmatakuliah.php">Data Matakuliah</a>
    <span class="oop-badge">OOP + Prepared Statement</span>
</nav>

<div class="wrapper">
    <div class="card">
        <h1>&#128101; Tabel Dosen</h1>

        <div class="oop-info">
            &#128218; Halaman ini menggunakan <strong>Class DosenModel</strong> dengan
            <strong>Prepared Statements</strong> — query aman dari SQL Injection.
        </div>

        <!-- Form Pencarian -->
        <form method="get" action="viewdosen.php">
            <div class="search-bar">
                <input type="text" name="keyword" placeholder="&#128269; Cari nama dosen..."
                       value="<?= htmlspecialchars($keyword) ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if ($keyword !== ''): ?>
                    <a href="viewdosen.php" class="btn btn-warning">Reset</a>
                <?php endif; ?>
            </div>
        </form>

        <a href="input.php" class="btn btn-success" style="margin-bottom:14px;">&#10133; Tambah Dosen</a>

        <?php if ($keyword !== ''): ?>
            <div class="alert alert-success">
                Hasil pencarian: <strong><?= htmlspecialchars($keyword) ?></strong>
                (<?= count($listDosen) ?> data ditemukan)
            </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Dosen</th>
                    <th>No HP</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($listDosen) > 0): ?>
                <?php foreach ($listDosen as $row): ?>
                <tr>
                    <td><?= $row['idDosen'] ?></td>
                    <td><?= htmlspecialchars($row['namaDosen']) ?></td>
                    <td><?= htmlspecialchars($row['noHP']) ?></td>
                    <td>
                        <a href="editdosen.php?idDosen=<?= $row['idDosen'] ?>" class="btn btn-warning btn-sm">&#9998; Edit</a>
                        <a href="hapusdosen.php?idDosen=<?= $row['idDosen'] ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus data ini?')">&#128465; Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4" style="text-align:center;color:#888;">Data tidak ditemukan.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

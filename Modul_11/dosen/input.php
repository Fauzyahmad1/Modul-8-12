<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Data Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <span class="brand">&#127979; SIM Kampus</span>
    <a href="viewdosen.php">Data Dosen</a>
    <a href="viewmahasiswa.php">Data Mahasiswa</a>
    <a href="viewmatakuliah.php">Data Matakuliah</a>
</nav>

<div class="wrapper">
    <div class="card" style="max-width:480px; margin:0 auto;">
        <h1>&#10133; Input Data Dosen</h1>

        <?php if (isset($_GET['status']) && $_GET['status'] === 'gagal'): ?>
            <div class="alert alert-danger">Gagal menyimpan data. Silakan coba lagi.</div>
        <?php endif; ?>

        <form action="proses_inputdosen.php" method="post">
            <div class="form-group">
                <label for="namaDosen">Nama Dosen</label>
                <input type="text" name="namaDosen" id="namaDosen"
                       placeholder="Contoh: Dr. Ahmad Yusuf, M.Sc" required>
            </div>
            <div class="form-group">
                <label for="noHP">No HP</label>
                <input type="text" name="noHP" id="noHP"
                       placeholder="Contoh: 081222333444" required>
            </div>
            <button type="submit" name="input" class="btn btn-success">&#128190; Simpan</button>
            <a href="viewdosen.php" class="btn btn-primary" style="margin-left:8px;">&#8592; Kembali</a>
        </form>
    </div>
</div>

</body>
</html>

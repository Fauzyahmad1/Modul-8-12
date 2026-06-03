<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Matakuliah – OOP</title>
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
        <h1>&#10133; Input Data Matakuliah</h1>
        <div class="oop-info">Menggunakan <strong>MatakuliahModel::create()</strong> dengan Prepared Statement.</div>
        <form action="proses_inputmatakuliah.php" method="post">
            <div class="form-group">
                <label for="kodeMK">Kode MK</label>
                <input type="number" name="kodeMK" id="kodeMK" placeholder="Contoh: 101" required>
            </div>
            <div class="form-group">
                <label for="namaMK">Nama Matakuliah</label>
                <input type="text" name="namaMK" id="namaMK" placeholder="Contoh: Pemrograman Web" required>
            </div>
            <div class="form-group">
                <label for="sks">SKS</label>
                <input type="number" name="sks" id="sks" min="1" max="6" placeholder="Contoh: 3" required>
            </div>
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="number" name="jam" id="jam" min="1" placeholder="Contoh: 3" required>
            </div>
            <button type="submit" name="input" class="btn btn-success">&#128190; Simpan</button>
            <a href="viewmatakuliah.php" class="btn btn-primary" style="margin-left:8px;">&#8592; Kembali</a>
        </form>
    </div>
</div>
</body>
</html>

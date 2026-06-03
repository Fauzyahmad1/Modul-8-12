<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <span class="brand">&#127979; SIM Kampus</span>
    <a href="viewdosen.php">Data Dosen</a>
    <a href="viewmahasiswa.php" class="active">Data Mahasiswa</a>
    <a href="viewmatakuliah.php">Data Matakuliah</a>
</nav>

<div class="wrapper">
    <div class="card" style="max-width:520px; margin:0 auto;">
        <h1>&#10133; Input Data Mahasiswa</h1>

        <form action="proses_inputmahasiswa.php" method="post">
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="number" name="npm" id="npm"
                       placeholder="Contoh: 2021001" required>
            </div>
            <div class="form-group">
                <label for="namaMhs">Nama Mahasiswa</label>
                <input type="text" name="namaMhs" id="namaMhs"
                       placeholder="Contoh: Budi Santoso" required>
            </div>
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" name="prodi" id="prodi"
                       placeholder="Contoh: Teknik Informatika" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat"
                       placeholder="Contoh: Jl. Merdeka No.1 Madiun" required>
            </div>
            <div class="form-group">
                <label for="noHP">No HP</label>
                <input type="text" name="noHP" id="noHP"
                       placeholder="Contoh: 082111222333" required>
            </div>
            <button type="submit" name="input" class="btn btn-success">&#128190; Simpan</button>
            <a href="viewmahasiswa.php" class="btn btn-primary" style="margin-left:8px;">&#8592; Kembali</a>
        </form>
    </div>
</div>

</body>
</html>

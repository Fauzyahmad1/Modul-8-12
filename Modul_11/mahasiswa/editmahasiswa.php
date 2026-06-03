<?php
include 'koneksi.php';

if (isset($_GET['npm'])) {
    $npm    = (int) $_GET['npm'];
    $query  = "SELECT * FROM t_mahasiswa WHERE npm='$npm'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    $data    = mysqli_fetch_assoc($result);
    $npm     = $data['npm'];
    $namaMhs = $data['namaMhs'];
    $prodi   = $data['prodi'];
    $alamat  = $data['alamat'];
    $noHP    = $data['noHP'];

} else {
    header("location: viewmahasiswa.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
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
        <h1>&#9998; Edit Data Mahasiswa</h1>

        <form action="proses_editmahasiswa.php" method="post">
            <div class="form-group">
                <label>NPM</label>
                <input type="hidden" name="npm" value="<?= $npm ?>">
                <input type="text" value="<?= $npm ?>" disabled>
            </div>
            <div class="form-group">
                <label for="namaMhs">Nama Mahasiswa</label>
                <input type="text" name="namaMhs" id="namaMhs"
                       value="<?= htmlspecialchars($namaMhs) ?>" required>
            </div>
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" name="prodi" id="prodi"
                       value="<?= htmlspecialchars($prodi) ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat"
                       value="<?= htmlspecialchars($alamat) ?>" required>
            </div>
            <div class="form-group">
                <label for="noHP">No HP</label>
                <input type="text" name="noHP" id="noHP"
                       value="<?= htmlspecialchars($noHP) ?>" required>
            </div>
            <button type="submit" name="edit" class="btn btn-warning">&#128190; Update Data</button>
            <a href="viewmahasiswa.php" class="btn btn-primary" style="margin-left:8px;">&#8592; Kembali</a>
        </form>
    </div>
</div>

</body>
</html>

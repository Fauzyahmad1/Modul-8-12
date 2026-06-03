<?php
include 'koneksi.php';

if (isset($_GET['kodeMK'])) {
    $kodeMK = (int) $_GET['kodeMK'];
    $query  = "SELECT * FROM t_matakuliah WHERE kodeMK='$kodeMK'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    $data   = mysqli_fetch_assoc($result);
    $kodeMK = $data['kodeMK'];
    $namaMK = $data['namaMK'];
    $sks    = $data['sks'];
    $jam    = $data['jam'];
} else {
    header("location: viewmatakuliah.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Matakuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <span class="brand">&#127979; SIM Kampus</span>
    <a href="viewdosen.php">Data Dosen</a>
    <a href="viewmahasiswa.php">Data Mahasiswa</a>
    <a href="viewmatakuliah.php" class="active">Data Matakuliah</a>
</nav>

<div class="wrapper">
    <div class="card" style="max-width:480px; margin:0 auto;">
        <h1>&#9998; Edit Data Matakuliah</h1>

        <form action="proses_editmatakuliah.php" method="post">
            <div class="form-group">
                <label>Kode MK</label>
                <input type="hidden" name="kodeMK" value="<?= $kodeMK ?>">
                <input type="text" value="<?= $kodeMK ?>" disabled>
            </div>
            <div class="form-group">
                <label for="namaMK">Nama Matakuliah</label>
                <input type="text" name="namaMK" id="namaMK"
                       value="<?= htmlspecialchars($namaMK) ?>" required>
            </div>
            <div class="form-group">
                <label for="sks">SKS</label>
                <input type="number" name="sks" id="sks" min="1" max="6"
                       value="<?= $sks ?>" required>
            </div>
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="number" name="jam" id="jam" min="1"
                       value="<?= $jam ?>" required>
            </div>
            <button type="submit" name="edit" class="btn btn-warning">&#128190; Update Data</button>
            <a href="viewmatakuliah.php" class="btn btn-primary" style="margin-left:8px;">&#8592; Kembali</a>
        </form>
    </div>
</div>

</body>
</html>

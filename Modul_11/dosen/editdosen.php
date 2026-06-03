<?php
// memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

// mengecek apakah di url ada nilai GET idDosen
if (isset($_GET['idDosen'])) {

    // ambil nilai idDosen dari url dan disimpan dalam variabel $id
    $id = (int) $_GET['idDosen'];

    // menampilkan data t_dosen yang mempunyai idDosen=$id
    $query  = "SELECT * FROM t_dosen WHERE idDosen='$id'";
    $result = mysqli_query($link, $query);

    // mengecek apakah query gagal
    if (!$result) {
        die("Query Error: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }

    // mengambil data dari database dan membuat variabel-variabel utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data      = mysqli_fetch_assoc($result);
    $idDosen   = $data["idDosen"];
    $namaDosen = $data["namaDosen"];
    $noHP      = $data["noHP"];

} else {
    // apabila tidak ada data GET id pada akan di redirect ke viewdosen.php
    header("location: viewdosen.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Dosen</title>
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
        <h1>&#9998; Edit Data Dosen</h1>

        <form id="form_mahasiswa" action="proses_editdosen.php" method="post">

            <div class="form-group">
                <label for="idDosenDisabled">ID Dosen</label>
                <!-- hidden: nilai asli yang dikirim ke proses -->
                <input type="hidden" name="idDosen" value="<?php echo $idDosen; ?>">
                <!-- disabled: hanya untuk tampilan, tidak bisa diubah user -->
                <input type="text" id="idDosenDisabled" value="<?php echo $idDosen; ?>" disabled>
            </div>

            <div class="form-group">
                <label for="namaDosen">Nama Dosen</label>
                <input type="text" name="namaDosen" id="namaDosen"
                       value="<?php echo htmlspecialchars($namaDosen); ?>" required>
            </div>

            <div class="form-group">
                <label for="noHP">No HP</label>
                <input type="text" name="noHP" id="noHP"
                       value="<?php echo htmlspecialchars($noHP); ?>" required>
            </div>

            <button type="submit" name="edit" class="btn btn-warning">&#128190; Update Data</button>
            <a href="viewdosen.php" class="btn btn-primary" style="margin-left:8px;">&#8592; Kembali</a>
        </form>
    </div>
</div>

</body>
</html>

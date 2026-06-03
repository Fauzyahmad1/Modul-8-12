 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies - Identitas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .info { background: #e8f5e9; padding: 12px; border-radius: 6px; margin-bottom: 16px; }
        .error { color: red; font-size: 0.85em; }
        input { padding: 5px; border: 1px solid #aaa; width: 220px; }
        input[type="submit"] { background: #1976D2; color: white; cursor: pointer; width: auto; padding: 6px 16px; }
    </style>
</head>
<body>
<h2>Simpan Identitas dengan Cookies</h2>

<?php
// Simpan cookies ketika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["simpan"])) {
    $nama = htmlspecialchars(trim($_POST["nama"]));
    $nim  = htmlspecialchars(trim($_POST["nim"]));
    $umur = htmlspecialchars(trim($_POST["umur"]));

    // Simpan cookies selama 7 hari (7 * 24 * 60 * 60 detik)
    setcookie("nama_user", $nama, time() + (7 * 24 * 60 * 60), "/");
    setcookie("nim_user",  $nim,  time() + (7 * 24 * 60 * 60), "/");
    setcookie("umur_user", $umur, time() + (7 * 24 * 60 * 60), "/");

    echo "<p style='color:green;'>Cookies berhasil disimpan!</p>";
}

// Hapus cookies
if (isset($_POST["hapus"])) {
    setcookie("nama_user", "", time() - 3600, "/");
    setcookie("nim_user",  "", time() - 3600, "/");
    setcookie("umur_user", "", time() - 3600, "/");
    echo "<p style='color:orange;'>Cookies berhasil dihapus.</p>";
}

// Tampilkan data dari cookies jika ada
if (isset($_COOKIE["nama_user"])) {
    echo '<div class="info">';
    echo "<b>Data dari Cookies:</b><br>";
    echo "Nama : " . $_COOKIE["nama_user"] . "<br>";
    echo "NIM  : " . $_COOKIE["nim_user"]  . "<br>";
    echo "Umur : " . $_COOKIE["umur_user"] . " tahun<br>";
    echo '</div>';
} else {
    echo '<p>Belum ada data cookies tersimpan.</p>';
}
?>

<form method="post">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="Fauzy Ahmad Muzayyin" placeholder="Nama lengkap"></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><input type="text" name="nim" value="253307024" placeholder="NIM"></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><input type="number" name="umur" value="20" placeholder="Umur"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="simpan" value="Simpan ke Cookies">
                <input type="submit" name="hapus" value="Hapus Cookies" style="background:#e53935;">
            </td>
        </tr>
    </table>
</form>

</body>
</html>

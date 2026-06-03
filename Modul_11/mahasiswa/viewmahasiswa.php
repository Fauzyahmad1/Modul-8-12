<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Mahasiswa</title>
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
    <div class="card">
        <h1>&#127891; Tabel Mahasiswa</h1>

        <!-- Pencarian -->
        <form method="get" action="viewmahasiswa.php">
            <div class="search-bar">
                <input type="text" name="keyword" placeholder="&#128269; Cari nama mahasiswa..."
                       value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if (!empty($_GET['keyword'])): ?>
                    <a href="viewmahasiswa.php" class="btn btn-warning">Reset</a>
                <?php endif; ?>
            </div>
        </form>

        <a href="inputmahasiswa.php" class="btn btn-success" style="margin-bottom:14px;">&#10133; Tambah Mahasiswa</a>

        <table>
            <thead>
                <tr>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($link, $_GET['keyword']) : '';

            if ($keyword !== '') {
                $query = "SELECT * FROM t_mahasiswa WHERE namaMhs LIKE '%$keyword%' ORDER BY npm ASC";
            } else {
                $query = "SELECT * FROM t_mahasiswa ORDER BY npm ASC";
            }

            $result = mysqli_query($link, $query);

            if (!$result) {
                die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
            }

            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['npm']                            . "</td>";
                echo "<td>" . htmlspecialchars($data['namaMhs'])      . "</td>";
                echo "<td><span class='badge badge-info'>" . htmlspecialchars($data['prodi'])  . "</span></td>";
                echo "<td>" . htmlspecialchars($data['alamat'])       . "</td>";
                echo "<td>" . htmlspecialchars($data['noHP'])         . "</td>";
                echo '<td>
                    <a href="editmahasiswa.php?npm=' . $data['npm'] . '" class="btn btn-warning btn-sm">&#9998; Edit</a>
                    <a href="hapusmahasiswa.php?npm=' . $data['npm'] . '" class="btn btn-danger btn-sm"
                       onclick="return confirm(\'Hapus data mahasiswa ini?\')">&#128465; Hapus</a>
                </td>';
                echo "</tr>";
            }

            if (mysqli_num_rows($result) === 0) {
                echo '<tr><td colspan="6" style="text-align:center;color:#888;">Data tidak ditemukan.</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

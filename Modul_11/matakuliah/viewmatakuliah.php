<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Matakuliah</title>
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
    <div class="card">
        <h1>&#128218; Tabel Matakuliah</h1>

        <form method="get" action="viewmatakuliah.php">
            <div class="search-bar">
                <input type="text" name="keyword" placeholder="&#128269; Cari nama matakuliah..."
                       value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if (!empty($_GET['keyword'])): ?>
                    <a href="viewmatakuliah.php" class="btn btn-warning">Reset</a>
                <?php endif; ?>
            </div>
        </form>

        <a href="inputmatakuliah.php" class="btn btn-success" style="margin-bottom:14px;">&#10133; Tambah Matakuliah</a>

        <table>
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Matakuliah</th>
                    <th>SKS</th>
                    <th>Jam</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($link, $_GET['keyword']) : '';

            if ($keyword !== '') {
                $query = "SELECT * FROM t_matakuliah WHERE namaMK LIKE '%$keyword%' ORDER BY kodeMK ASC";
            } else {
                $query = "SELECT * FROM t_matakuliah ORDER BY kodeMK ASC";
            }

            $result = mysqli_query($link, $query);

            if (!$result) {
                die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
            }

            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['kodeMK'] . "</td>";
                echo "<td>" . htmlspecialchars($data['namaMK']) . "</td>";
                echo "<td><span class='badge badge-info'>" . $data['sks'] . " SKS</span></td>";
                echo "<td>" . $data['jam'] . " jam</td>";
                echo '<td>
                    <a href="editmatakuliah.php?kodeMK=' . $data['kodeMK'] . '" class="btn btn-warning btn-sm">&#9998; Edit</a>
                    <a href="hapusmatakuliah.php?kodeMK=' . $data['kodeMK'] . '" class="btn btn-danger btn-sm"
                       onclick="return confirm(\'Hapus matakuliah ini?\')">&#128465; Hapus</a>
                </td>';
                echo "</tr>";
            }

            if (mysqli_num_rows($result) === 0) {
                echo '<tr><td colspan="5" style="text-align:center;color:#888;">Data tidak ditemukan.</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

<?php
include 'koneksi.php'; // memanggil file koneksi.php untuk melakukan koneksi database
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <span class="brand">&#127979; SIM Kampus</span>
    <a href="viewdosen.php" class="active">Data Dosen</a>
    <a href="viewmahasiswa.php">Data Mahasiswa</a>
    <a href="viewmatakuliah.php">Data Matakuliah</a>
</nav>

<div class="wrapper">
    <div class="card">
        <h1>&#128101; Tabel Dosen</h1>

        <!-- Form Pencarian berdasarkan nama -->
        <form method="get" action="viewdosen.php">
            <div class="search-bar">
                <input type="text" name="keyword" placeholder="&#128269; Cari nama dosen..."
                       value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if (!empty($_GET['keyword'])): ?>
                    <a href="viewdosen.php" class="btn btn-warning">Reset</a>
                <?php endif; ?>
            </div>
        </form>

        <a href="input.php" class="btn btn-success" style="margin-bottom:14px;">&#10133; Tambah Dosen</a>

        <?php if (!empty($_GET['keyword'])): ?>
            <div class="alert alert-success">
                Hasil pencarian untuk: <strong><?= htmlspecialchars($_GET['keyword']) ?></strong>
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
            <?php
            // Ambil keyword pencarian jika ada
            $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($link, $_GET['keyword']) : '';

            // jalankan query untuk menampilkan semua data diurutkan ascending berdasarkan idDosen
            // jika ada keyword, tambahkan kondisi WHERE LIKE untuk pencarian nama
            if ($keyword !== '') {
                $query = "SELECT * FROM t_dosen WHERE namaDosen LIKE '%$keyword%' ORDER BY idDosen ASC";
            } else {
                $query = "SELECT * FROM t_dosen ORDER BY idDosen ASC";
            }

            $result = mysqli_query($link, $query);

            // mengecek apakah ada error ketika menjalankan query
            if (!$result) {
                die("Query Error: " . mysqli_errno($link) .
                    " - " . mysqli_error($link));
            }

            // hasil query akan disimpan dalam variabel $data dalam bentuk array
            // kemudian dicetak dengan perulangan while
            $no = 1;
            while ($data = mysqli_fetch_assoc($result)) {
                // mencetak / menampilkan data
                echo "<tr>";
                echo "<td>" . $data['idDosen']   . "</td>";   // menampilkan data idDosen
                echo "<td>" . htmlspecialchars($data['namaDosen']) . "</td>"; // menampilkan data namaDosen
                echo "<td>" . htmlspecialchars($data['noHP'])      . "</td>"; // menampilkan data noHP

                // membuat link untuk mengedit dan menghapus data
                echo '<td>
                    <a href="editdosen.php?idDosen=' . $data['idDosen'] . '" class="btn btn-warning btn-sm">&#9998; Edit</a>
                    <a href="hapusdosen.php?idDosen=' . $data['idDosen'] . '" class="btn btn-danger btn-sm"
                       onclick="return confirm(\'Anda yakin akan menghapus data ini?\')">&#128465; Hapus</a>
                </td>';
                echo "</tr>";
                $no++;
            }

            if (mysqli_num_rows($result) === 0) {
                echo '<tr><td colspan="4" style="text-align:center;color:#888;">Data tidak ditemukan.</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

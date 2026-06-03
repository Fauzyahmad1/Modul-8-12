<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JSON - Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        pre  { background: #263238; color: #aed581; padding: 16px; border-radius: 8px; overflow-x: auto; }
        table { border-collapse: collapse; margin-top: 16px; width: 100%; max-width: 420px; }
        th, td { border: 1px solid #ccc; padding: 8px 14px; text-align: left; }
        th { background: #1976D2; color: white; }
        tr:nth-child(even) { background: #f5f5f5; }
    </style>
</head>
<body>
<h2>Array PHP → JSON</h2>

<?php
// Array dengan index nama dan umur, minimal 15 data
$mahasiswa = [
    ["nama" => "Fauzy Ahmad Muzayyin",   "umur" => 20],
    ["nama" => "Andi Prasetyo",          "umur" => 21],
    ["nama" => "Budi Santoso",           "umur" => 19],
    ["nama" => "Citra Dewi",             "umur" => 22],
    ["nama" => "Dimas Kurniawan",        "umur" => 20],
    ["nama" => "Eka Putri",              "umur" => 21],
    ["nama" => "Fajar Hidayat",          "umur" => 23],
    ["nama" => "Galih Wicaksono",        "umur" => 20],
    ["nama" => "Hana Safitri",           "umur" => 19],
    ["nama" => "Ilham Ramadhan",         "umur" => 22],
    ["nama" => "Joko Susilo",            "umur" => 21],
    ["nama" => "Kania Rahayu",           "umur" => 20],
    ["nama" => "Luthfi Anwar",           "umur" => 24],
    ["nama" => "Maya Sari",              "umur" => 19],
    ["nama" => "Noval Alfarizi",         "umur" => 22],
];

// Konversi array ke JSON
$json = json_encode($mahasiswa, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

echo "<h3>Output JSON:</h3>";
echo "<pre>" . htmlspecialchars($json) . "</pre>";

// Tampilkan dalam tabel HTML
echo "<h3>Tampilan Tabel:</h3>";
echo "<table>";
echo "<tr><th>No</th><th>Nama</th><th>Umur</th></tr>";

$data = json_decode($json, true); // decode kembali ke array
foreach ($data as $i => $row) {
    echo "<tr>";
    echo "<td>" . ($i + 1) . "</td>";
    echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
    echo "<td>" . $row["umur"] . " tahun</td>";
    echo "</tr>";
}
echo "</table>";
?>

</body>
</html>

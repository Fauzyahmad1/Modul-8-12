<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Galeri Gambar</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        h2 { color: #333; }
        .galeri {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }
        .galeri-item {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 6px;
            box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
            width: 180px;
            text-align: center;
        }
        .galeri-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
        }
        .galeri-item p {
            font-size: 0.75em;
            color: #555;
            margin: 6px 0 0;
            word-break: break-all;
        }
        .kosong { color: #999; font-style: italic; }
    </style>
</head>
<body>
    <h2>Galeri Gambar</h2>

    <?php
    $fileList = glob(pattern: 'gambar/*');
    $ada = false;

    echo '<div class="galeri">';
    foreach ($fileList as $filename) {
        if (is_file($filename)) {
            $ada = true;
            $nama = basename($filename);
            echo '<div class="galeri-item">';
            echo '  <img src="' . htmlspecialchars($filename) . '" alt="' . htmlspecialchars($nama) . '">';
            echo '  <p>' . htmlspecialchars($nama) . '</p>';
            echo '</div>';
        }
    }
    echo '</div>';

    if (!$ada) {
        echo '<p class="kosong">Belum ada gambar di folder "gambar".</p>';
    }
    ?>

</body>
</html>

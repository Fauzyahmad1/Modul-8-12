<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        .error { color: red; font-size: 0.8em; }
    </style>
</head>
<body>

<?php
session_start();

// Fungsi sanitasi input
function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $emailErr = "";
$name = $email = "";

// Simulasi database user
$valid_users = [
    "fauzy"  => "password123",
    "admin"  => "admin123",
];

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi username
        if (empty($_POST["u"])) {
            $nameErr = "masukkan username";
        } else {
            $name = bersihkan_input($_POST["u"]);
        }

        // Validasi password
        if (empty($_POST["p"])) {
            $emailErr = "masukkan password";
        } else {
            $email = bersihkan_input($_POST["p"]);
        }

        // Proses login jika tidak ada error
        if (empty($nameErr) && empty($emailErr)) {
            if (isset($valid_users[$name]) && $valid_users[$name] === $email) {
                // Simpan session
                $_SESSION["username"] = $name;
                $_SESSION["login"]    = true;
                echo "<p style='color:green;'>Login berhasil! Selamat datang, <b>" . $name . "</b></p>";
                echo "<p>Session username: " . $_SESSION["username"] . "</p>";
                echo "<a href='logout.php'>Logout</a>";
            } else {
                throw new Exception("Username atau password salah!");
            }
        }
    }
} catch (Exception $e) {
    echo "<p class='error'>Error: " . $e->getMessage() . "</p>";
}

// Jika sudah login
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
    echo "<hr><p>Anda sudah login sebagai: <b>" . $_SESSION["username"] . "</b></p>";
}
?>

<h2>Form Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Username: <input type="text" name="u">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    Password: <input type="password" name="p">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>

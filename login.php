<!DOCTYPE html>
<html>
    <head>
        <title>WEBSITE FREE FIRE</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>LOGIN FREE FIRE</h1>

        <!-- Tombol Kembali ke folder lain -->
        <a href="../folder-lain/index.php" class="back-button">Kembali ke Folder Lain</a>

        <!-- Form Login -->
        <form method="post" action="..\input login\-loginfreefire.php"> <!-- Ganti dengan URL tujuan saat login -->
            <label for="email">EMAIL:</label><br>
            <input type="text" name="inputtext" value="" required><br>

            <label for="password">PASSWORD:</label><br>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required><br>

            <label for="sudah lengkap">Sudah Lengkap:</label><br>
            <input type="checkbox" name="inputtext2" value="sudah lengkap" required><br>

            <input type="submit" value="Login"><br>
        </form>

        <!-- Tautan ke Instagram dan Facebook -->
        <br>
        <a href="https://www.instagram.com/"><label for="instagram">INSTAGRAM</label></a><br>
        <a href="https://www.facebook.com/"><label for="facebook">FACEBOOK</label></a><br>

        <?php
        // Mencetak apakah form input sudah diinputkan
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil dan menampilkan data dari hasil inputan
            $inputtext = $_POST["inputtext"];
            $inputtext2 = $_POST["inputtext2"];
            echo "<p>Email: $inputtext</p>";
            echo "<p>Status: $inputtext2</p>";
        }
        ?>

    </body>
</html>

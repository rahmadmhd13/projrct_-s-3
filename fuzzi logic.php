<html>
<head>
<title>Contoh Fuzzy Logic</title>
</head>
<body>
<h1>Kategori Ukuran Komputer Menggunakan Logika Sederhana</h1>
<!-- Form untuk memasukkan ukuran layar -->
<form action="21.php" method="post">
<label for="screen_size">Masukkan Ukuran Layar (inci):</label>
<input type="number" id="screen_size" name="screen_size" required>
<br><br>
<input type="submit" value="Tentukan Kategori Ukuran">
</form>

<?php
// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai ukuran layar dari form
    $screen_size = $_POST['screen_size'];
    $category = "";

    // Logika sederhana untuk menentukan kategori ukuran komputer berdasarkan ukuran layar
    if ($screen_size <= 13) { 
        // Jika ukuran layar 13 inci atau lebih kecil, kategori adalah "Kecil"
        $category = "Kecil";
    } elseif ($screen_size > 13 && $screen_size <= 17) { 
        // Jika ukuran layar antara 14 hingga 17 inci, kategori adalah "Sedang"
        $category = "Sedang";
    } else {
        // Jika ukuran layar lebih dari 17 inci, kategori adalah "Besar"
        $category = "Besar";
    }

    // Perintah untuk menampilkan hasil kategori
    echo "<h2>Hasil Kategori Ukuran Komputer:</h2>";
    echo "<p><strong>Ukuran Layar:</strong> " . $screen_size . " inci</p>";
    echo "<p><strong>Kategori Ukuran:</strong> " . $category . "</p>";
}
?>
</body>
</html>

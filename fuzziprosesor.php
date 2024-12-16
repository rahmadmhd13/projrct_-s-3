<html>
<head>
    <title>Kategori Prosesor Laptop</title>
    <link rel="stylesheet" href="_style.css">
</head>
<body>
    <h1>Kategori Prosesor Laptop Berdasarkan Harga</h1>
    
    <!-- Form untuk memasukkan harga laptop -->
    <form action="fuzziprosesor.php" method="post">
        <label for="price">Masukkan Harga Laptop (Rp):</label>
        <input type="number" id="price" name="price" required>
        <br><br>
        <input type="submit" value="Tentukan Kategori Prosesor">
    </form>

    <?php
    // Cek apakah form sudah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai harga dari form
        $price = $_POST['price'];
        $processor = "";
        $category = "";

        // Logika sederhana untuk menentukan kategori prosesor berdasarkan harga
        if ($price <= 2000000) { 
            // Jika harga kurang dari atau sama dengan 2 juta, kategori prosesor adalah "Low-end"
            $processor = "Intel Celeron / AMD A4";
            $category = "Low-end";
        } elseif ($price > 2000000 && $price <= 5000000) { 
            // Jika harga antara 2 juta hingga 5 juta, kategori prosesor adalah "Mid-range"
            $processor = "Intel i3 / AMD Ryzen 3";
            $category = "Mid-range";
        } elseif ($price > 5000000 && $price <= 8000000) { 
            // Jika harga antara 5 juta hingga 8 juta, kategori prosesor adalah "High-end"
            $processor = "Intel i5 / AMD Ryzen 5";
            $category = "High-end";
        } else { 
            // Jika harga lebih dari 8 juta, kategori prosesor adalah "Premium"
            $processor = "Intel i7 / AMD Ryzen 7";
            $category = "Premium";
        }

        // Perintah untuk menampilkan hasil kategori dan prosesor
        echo "<h2>Hasil Kategori Prosesor Laptop:</h2>";
        echo "<p><strong>Harga Laptop:</strong> Rp " . number_format($price, 0, ',', '.') . "</p>";
        echo "<p><strong>Kategori:</strong> " . $category . "</p>";
        echo "<p><strong>Prosesor yang Cocok:</strong> " . $processor . "</p>";
    }
    ?>

   <!-- Tombol Kembali ke Folder HTML -->
<br><br>
<a href="..\aplikasi s3\button.html" class="back-button">
    <button>Kembali</button>
</a>

</body>
</html>

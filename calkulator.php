<html>
<head>
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="calculator">
        <form method="post">
            <h3>Kalkulator Sederhana</h3>
            <!-- Input for the first number -->
            <input type="text" name="no1" placeholder="Masukkan angka pertama" required>
            <!-- Input for the second number (optional for some operations) -->
            <input type="text" name="no2" placeholder="Masukkan angka kedua (opsional)">
            <!-- Dropdown to select the mathematical operation -->
            <select name="operator" required>
                <option value="">Pilih Operasi</option>
                <option value="tambah">Tambah (+)</option>
                <option value="kurang">Kurang (-)</option>
                <option value="kali">Kali (*)</option>
                <option value="bagi">Bagi (/)</option>
                <option value="persentase">Persentase (%)</option>
                <option value="akar">Akar Kuadrat (√)</option>
                <option value="pangkat">Pangkat (^)</option>
                <option value="logaritma">Logaritma (log)</option>
                <option value="eksponen">Eksponen (e^x)</option>
            </select>
            <input type="submit" name="submit" value="Hitung"><br><br>
        </form>
                 <!-- Tombol ke Folder Lain -->
            <div class="navigation-button">
         <a href="..\aplikasi s3\button.html" class="btn-link">Kembali</a>
        </div>


        <?php
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form input values
            $no1 = $_POST['no1'];
            $no2 = $_POST['no2'];
            $operator = $_POST['operator'];

            // Ensure inputs are numeric where needed
            if (is_numeric($no1) && ($no2 === "" || is_numeric($no2))) {
                // Perform the operation based on the selected operator
                $hasil = match ($operator) {
                    "tambah" => $no1 + $no2,
                    "kurang" => $no1 - $no2,
                    "kali" => $no1 * $no2,
                    "bagi" => $no2 != 0 ? $no1 / $no2 : "Tidak bisa dibagi dengan nol!",
                    "persentase" => ($no1 / 100) * $no2,
                    "akar" => $no1 >= 0 ? sqrt($no1) : "Akar tidak valid untuk bilangan negatif!",
                    "pangkat" => pow($no1, $no2),
                    "logaritma" => $no1 > 0 ? log($no1) : "Logaritma tidak valid untuk bilangan non-positif!",
                    "eksponen" => exp($no1),
                    default => "Pilih operator yang valid!",
                };
                echo "<p>Hasil: $hasil</p>"; // Display result
            } else {
                echo "<p>Masukkan angka yang valid!</p>"; // Error message for invalid input
            }
        }
        ?>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(Graf BFS) LEMBAGA NEGARA INDONESIA</title>
    <link rel="stylesheet" type="text/css" href="rahmad.css">
</head>
<body>
    <h1>LEMBAGA NEGARA INDONESIA</h1>
    
   
    <!-- Form untuk input simpul awal -->
    <form method="POST" action="">
        <label for="Simpulawal">MASUK NAMA LEMBAGA</label>
        <input type="text" name="Simpulawal" value="" required>
        <button type="submit" name="submit">TELUSURI</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Definisi graf
        $graf = [
            "PRESIDEN" => ["Wakil Presiden", "Kementrian", "Dewan Perwakilan Rakyat", "Gubernur"],
            "WAKIL PRESIDEN" => ["Presiden", "Kementrian"],
            "KEMENTRIAN" => ["Presiden", "Wakil Presiden", "Gubernur", "Walikota/Bupati"],
            "DEWAN PERWAKILAN RAKYAT" => ["Presiden", "Majelis Permusyawaratan Rakyat", "Dewan Perwakilan Daerah", "Mahkamah Konstitusi", "Badan Pemeriksa Keuangan"],
            "MAJELIS PERMUSYAWARATAN RAKYAT" => ["Dewan Perwakilan Rakyat", "Dewan Perwakilan Daerah"],
            "DEWAN PERWAKILAN DAERAH" => ["Dewan Perwakilan Rakyat", "Majelis Permusyawaratan Rakyat"],
            "MAHKAMAH AGUNG" => ["Mahkamah Konstitusi", "Komisi Yudisial"],
            "MAHKAMAH KONSTITUSI" => ["Dewan Perwakilan Rakyat", "Mahkamah Agung", "Komisi Yudisial"],
            "KOMISI YUDISIAL" => ["Mahkamah Agung", "Mahkamah Konstitusi"],
            "BADAN PEMERIKSA KEUANGAN" => ["Dewan Perwakilan Rakyat", "Komisi Pemberantas Korupsi"],
            "KOMISI PEMBERANTAS KORUPSI" => ["Badan Pemeriksa Keuangan"],
            "GUBERNUR" => ["Presiden", "Kementrian", "Walikota/Bupati"],
            "WALIKOTA/BUPATI" => ["Gubernur", "Kementrian"]
        ];

        // Ambil simpul awal dari form dan normalisasi input
        $inputSimpul = trim($_POST['Simpulawal']); // Input asli
        $simpulAwal = strtoupper($inputSimpul); // Ubah ke huruf besar (untuk kecocokan)

        // Validasi apakah simpul awal ada dalam graf
        if (!array_key_exists($simpulAwal, $graf)) {
            echo "<h2 class='error'>Mohon telusuri ulang</h2>";
            echo "<div class='error-msg'>Simpul awal lembaga <strong>$inputSimpul</strong> tidak ditemukan dalam graf. Pilih salah satu dari: " 
                . implode(", ", array_keys($graf)) . "</div>";
        } else {
            // Menampilkan tetangga langsung dari simpul awal
            $tetanggaLangsung = $graf[$simpulAwal];
            echo "<h2 class='valid'>Hasil Tetangga Langsung</h2>";
            echo "<div class='valid-msg'>Lembaga yang bertetangga langsung dengan <strong>$simpulAwal</strong>: <strong>" 
                . implode(", ", $tetanggaLangsung) . "</strong></div>";
        }
    }
    ?>

    <!-- Tombol Kembali setelah hasil -->
    <a href="..\aplikasi s3\button.html" class="back-button">Kembali</a>

</body>
</html>

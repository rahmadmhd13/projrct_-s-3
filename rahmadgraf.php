<html>
<head>
    <title>(Graf BFS)LEMBAGA NEGARA INDONESIA </title>
    <link rel="stylesheet" type="text/css" href="rahmad.css">
</head>
<body>
    <h1>LEMBAGA NEGARA INDONESIA </h1>
    <form method="POST" action="">
        <label for="Simpulawal">MASUK NAMA LEMBAGA</label>
        <input type="text" name="Simpulawal" value="" required>
        <button type="submit" name="submit">TELUSURI</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Definisi graf
        $graf = [
            "PRESIDEN" => ["wakil presiden", "Kementrian", "Dewan perwaki rakyat", "Gubernur"],
            "WAKIL PRESIDEN" => ["Presiden", "Kementrian"],
            "KEMENTRIAN" => ["presiden", "Wakil presiden", "Gubernur", "walikota/bupati"],
            "DEWAN PERWAKILAN RAKYAT" => ["PRESIDEN", "majelis permusyawaratan rakyat", "dewan perwakilan daerah", "makamah konstitusi", "badan pemeriksa keuangan"],
            "MAJELIS PERMUSYAWARATAN RAKYAT" => ["Dewan perwakilan rakyat", "dewan perwakilan daerah"],
            "DEWAN PERWAKILAN DAERAH" => ["Dewan perwakilan rakyat", "majelis permusyawaratan rakyat"],
            "MAHKAMAH AGUNG" => ["Mahkamah konstitusi", "komisi yudisial"],
            "MAHKAMAH KONSTITUSI" => ["Dewan perwakilan rakyat", "mahkamah agung", "komisi yudisial"],
            "KOMISI YUDISIAL" => ["mahkamah agung", "Mahkamah konstitusi"],
            "BADAN PEMERIKSA KEUANGAN" => ["Dewan perwakilan rakyat", "komisi pemberantas korupsi"],
            "KOMISI PEMBERANTAS KORUPSI" => ["badan pemeriksa keuangan"],
            "GUBERNUR" => ["presiden", "Kementrian", "walikota/bupati"],
            "WALIKOTA/BUPATI" => ["Gubernur", "Kementrian"]
        ];
    

        // Ambil simpul awal dari form dan normalisasi input
        $inputSimpul = trim($_POST['Simpulawal']); // Input asli
        $simpulAwal = strtoupper($inputSimpul); // Ubah ke huruf besar (untuk kecocokan)

        // Validasi apakah simpul awal ada dalam graf
        if (!array_key_exists($simpulAwal, $graf)) {
            echo "<h2 class='error'>mohon telusuri ulang</h2>";
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
</body>
</html>

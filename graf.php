<html>
<head>
    <title>Graf BFS</title>
</head>
<link rel="stylesheet" type="text/css" href="rahmad.css">
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
            "Presiden" => ["Wakil presiden", "Kementrian", "Dewan perwakilan rakyat", "Gubernur"],
            "Wakil presiden" => ["Presiden", "Kementrian"],
            "Kementrian" => ["presiden", "Wakil presiden", "Gubernur", "walikota/bupati"],
            "Dewan perwakilan rakyat" => ["presiden", "majelis permusyawaratan rakyat", "dewan perwakilan daerah", "makamah konstitusi", "badan pemeriksa keuangan"],
            "majelis permusyawaratan rakyat" => ["Dewan perwakilan rakyat", "dewan perwakilan daerah"],
            "dewan perwakilan daerah" => ["Dewan perwakilan rakyat", "majelis permusyawaratan rakyat"],
            "mahkamah agung" => ["Mahkamah konstitusi", "komisi yudisial"],
            "Mahkamah konstitusi" => ["Dewan perwakilan rakyat", "mahkamah agung", "komisi yudisial"],
            "komisi yudisial" => ["mahkamah agung", "Mahkamah konstitusi"],
            "badan pemeriksa keuangan" => ["Dewan perwakilan rakyat", "komisi pemberantas korupsi"],
            "komisi pemberantas korupsi" => ["badan pemeriksa keuangan"],
            "gubernur" => ["presiden", "Kementrian", "walikota/bupati"],
            "walikota/bupati" => ["Gubernur", "Kementrian"]
        ];

        // Ambil simpul awal dari form dan normalisasi input
        $inputSimpul = trim($_POST['Simpulawal']); // Input asli
        $simpulAwal = strtoupper($inputSimpul); // Ubah ke huruf besar (untuk kecocokan)

        // Validasi apakah simpul awal ada dalam graf
        if (!array_key_exists($simpulAwal, $graf)) {
            echo "<h2>mohon input ulang</h2>";
            echo "<div>Simpul awal <strong>$inputSimpul</strong> tidak ditemukan dalam graf. Pilih salah satu dari: " 
                . implode(", ", array_keys($graf)) . "</div>";
        } else {
            // Menampilkan tetangga langsung dari simpul awal
            $tetanggaLangsung = $graf[$simpulAwal];
            echo "<h2>Hasil Tetangga Langsung:</h2>";
            echo "<div>Simpul yang bertetangga langsung dengan <strong>$simpulAwal</strong>: <strong>" 
                . implode(", ", $tetanggaLangsung) . "</strong></div>";
        }
    }
    ?>
</body>
</html>

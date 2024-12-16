<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Penentuan Nilai Mahasiswa</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Penentuan Nilai Mahasiswa Unigha Merdue</h2>

<?php
// Tampilkan tombol kembali ke folder hanya jika form belum dikirim
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "<div class='back-button'>";
    echo "<a href='../folder-lain/index.html' class='button'>Kembali ke Folder Lain</a>";
    echo "</div>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jrs = $_POST['jurusan'];
    $nilai = $_POST['nilai'];

    // Tentukan kelulusan dan kategori nilai
    if ($nilai >= 85) {
        $status = "Kamu lulus dengan nilai paling tinggi";
        $status1 = "A";
    } elseif ($nilai >= 70) {
        $status = "Kamu lulus dengan nilai baik";
        $status1 = "B";
    } elseif ($nilai >= 60) {
        $status = "Kamu lulus dengan nilai cukup";
        $status1 = "C";
    } elseif ($nilai >= 50) {
        $status = "Maaf, kamu tidak lulus";
        $status1 = "D";
    } else {
        $status = "Maaf, kamu tidak lulus";
        $status1 = "E";
    }

    // Tampilkan hasil
    echo "<div class='hasil'>";
    echo "<p>Nama Mahasiswa: $nama</p>";
    echo "<p>Jurusan: $jrs</p>";
    echo "<p>Nilai Akhir: $nilai</p>";
    echo "<p>Status Kelulusan: <strong>$status</strong></p>";
    echo "<p>Kategori Nilai: <strong>$status1</strong></p>";
    
    // Tombol Kembali Setelah Hasil Ditampilkan
    echo "<div class='hasil1'> <a href='..\aplikasi s3\button.html>Kembali awal</a></div>";
    echo "</div>";
} else {
?>
    <!-- Form Input -->
    <form action="" method="post">
        <label for="nama">Nama Mahasiswa</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa" required><br><br>
        <label for="jurusan">Jurusan</label>
        <input type="text" id="jrs" name="jurusan" placeholder="Masukkan Jurusan Mahasiswa" required><br><br>
        <label for="nilai">Nilai Akhir</label>
        <input type="number" id="nilai" name="nilai" min="0" max="100" placeholder="Masukkan Nilai Mahasiswa" required><br><br>
        <div class="submit1"> <button type="submit">Tentukan Kelulusan</button></div>
    </form>
<?php
}
?>
</div>

<!-- Video Background -->
<video autoplay muted loop id="backgroundVideo">
    <source src="11.mp4" type="video/mp4">
</video>
</body>
</html>

<?php
$local = "localhost";
$user = "root";
$password = "";
$db = "timetracer";

$mysqli = new mysqli($local, $user, $password, $db);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai formulir
    $kategori = $mysqli->real_escape_string($_POST["kategori"]); // Melakukan escape string untuk menghindari SQL injection
    $tanggal_dibuat = $mysqli->real_escape_string($_POST["tanggal_dibuat"]);
    $tanggal_tenggat = $mysqli->real_escape_string($_POST["tanggal_tenggat"]);
    $judul = $mysqli->real_escape_string($_POST["judul"]);
    $content = $mysqli->real_escape_string($_POST["content"]);

    // Menyiapkan pernyataan SQL untuk menyimpan data ke tabel jadwal
    $sql = "INSERT INTO jadwal (kategori, tanggal_dibuat, tanggal_tenggat, judul, content) VALUES ('$kategori', '$tanggal_dibuat', '$tanggal_tenggat','$judul', '$content')";
    if ($mysqli->query($sql) === TRUE) {
        // Add HTML and CSS to style the success message and center it
        echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">';
        echo '<div style="background-color: #4CAF50; color: white; padding: 20px; font-size: 24px; border-radius: 10px;">';
        echo "Jadwal Berhasil diBuat";
        echo '</div>';
        echo '</div>';
        
        // Redirect to login.php after a few seconds
        header("refresh:2;url=catat.php");
        exit; // Important to stop further execution after redirecting
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
    ?>
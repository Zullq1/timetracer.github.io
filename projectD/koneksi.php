<?php
// koneksi.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "timetracer";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi escape untuk menghindari SQL injection
function escapeString($string) {
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}
?>

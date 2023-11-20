<?php
include "koneksi.php";

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$query = "DELETE FROM jadwal WHERE id='" . $id . "'";

if ($conn->query($query)) {
    header('location: catat.php');
} else {
    echo "terdapat error saat mencoba hapus data dengan error " . $conn->error . $query;
}

// Close the connection
$conn->close();
?>
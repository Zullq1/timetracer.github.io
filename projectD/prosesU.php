<?php
include "koneksi.php"; // Nama file koneksi ke database Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah 'id' ada dalam $_POST
    if (isset($_POST['id'])) {
        // Ambil nilai dari formulir
        $id = escapeString($_POST['id']);
        $kategori = escapeString($_POST['kategori']);
        $tanggal_dibuat = escapeString($_POST['tanggal_dibuat']);
        $tanggal_tenggat = escapeString($_POST['tanggal_tenggat']);
        $judul = escapeString($_POST['judul']);
        $content = escapeString($_POST['content']);

        // Query untuk melakukan update data
        $updateQuery = "UPDATE jadwal SET kategori = '$kategori', tanggal_dibuat = '$tanggal_dibuat', tanggal_tenggat = '$tanggal_tenggat' ,judul = '$judul', content = '$content' WHERE id = $id";

        // Eksekusi query
        if (mysqli_query($conn, $updateQuery)) {
            echo " <a href='catat.php'>catat.php</a>";
            // Redirect ke catat.php setelah pesan ditampilkan
            header("Location: catat.php");
            exit(); // Pastikan untuk keluar setelah melakukan redirect
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "ID tidak ditemukan dalam formulir.";
    }
} else {
    echo "Metode pengiriman data tidak valid.";
}

mysqli_close($conn);
?>

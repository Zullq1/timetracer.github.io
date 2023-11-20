<?php
$koneksi = mysqli_connect("localhost", "root", "", "timetracer");

// Periksa koneksi
if (mysqli_connect_error()) {
    echo json_encode(array('success' => false, 'message' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
    exit();
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Perbarui status menjadi selesai (status = 1)
    $updateQuery = "UPDATE jadwal SET status = 1 WHERE id = $id";
    $result = mysqli_query($koneksi, $updateQuery);

    if ($result) {
        // Kirim respons JSON berhasil
        echo json_encode(array('success' => true));

        // Tambahkan pesan dan waktu mundur ke riwayat.php
        echo "<script>
                // Tampilkan pesan
                var messageContainer = document.createElement('div');
                messageContainer.innerHTML = 'Tugas Anda berhasil diselesaikan';
                messageContainer.style.backgroundColor = '#3498db';
                messageContainer.style.color = '#fff';
                messageContainer.style.padding = '10px';
                messageContainer.style.textAlign = 'center';
                messageContainer.style.position = 'fixed';
                messageContainer.style.top = '50%';
                messageContainer.style.left = '50%';
                messageContainer.style.transform = 'translate(-50%, -50%)';
                document.body.appendChild(messageContainer);

                // Waktu mundur ke riwayat.php
                setTimeout(function() {
                    window.location.href = 'riwayat.php';
                }, 2000);
              </script>";
        
        exit();
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error updating record: ' . mysqli_error($koneksi)));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request.'));
}

// Menutup koneksi database
mysqli_close($koneksi);
?>

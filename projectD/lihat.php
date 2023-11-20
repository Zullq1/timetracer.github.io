<?php
include "koneksi.php"; // Nama file koneksi ke database Anda

// Periksa apakah formulir dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses data formulir di sini, jika diperlukan
    // ...
}

if (isset($_GET['id'])) {
    $id = escapeString($_GET['id']); // Membersihkan parameter "id" menggunakan fungsi escapeString

    $sql = "SELECT * FROM jadwal WHERE id = $id"; // Ambil data jadwal berdasarkan ID
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Data di luar formulir hanya ditampilkan jika tidak ada pengiriman formulir
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            echo " ";
        }
    } else {
        echo "Jadwal tidak ditemukan";
    }
} else {
    echo "ID tidak ditemukan dalam URL";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Catatan</title>
    <link rel="shortcut icon" href="assets/Logo/logo.PNG">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: #08071d url("assets/bg/bgT.jpg") no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container form {
            width: 670px;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 20px;
        }

        .container form h1 {
            color: #fff;
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
            width: 100%;
        }

        .container form label {
            color: #fff;
            width: 100%;
            margin-top: 10px;
        }

        .container form input,
        .container form textarea,
        .container form select {
            width: 100%;
            padding: 10px;
            outline: none;
            border: none;
            font-size: 15px;
            margin-bottom: 10px;
            background: none;
            border-bottom: 2px solid #fff;
            color: #fff;
        }

        .container form textarea {
            min-height: 80px;
            max-height: 200px;
            resize: vertical;
        }

        .container form select {
            background-color: rgba(0, 0, 0, 0.1); /* Warna latar belakang lebih gelap */
            color: #fff;
        }

        /* Tambahkan style khusus untuk warna teks opsi kategori */
        .container form select option {
            color: #000;
        }

        .container form #button {
            border: none;
            background: #fff;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: 600;
            font-size: 20px;
            color: #333;
            width: 100%;
            padding: 10px;
            margin-right: 0;
            margin-bottom: 30px;
            transition: 0.3s;
        }

        .container form #button:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="container">
    <!-- <a href="catat.php" style="position: absolute; top: 10px; left: 10px; color: #fff; text-decoration: none; font-size: 24px;">&larr; Kembali</a> -->
        <form method="POST" action="catat.php">
            <h1>Lihat Catatan</h1>
            <!-- <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                <label for="kategori" style="flex: 1;">Kategori:</label>
                <select name="kategori" id="kategori" style="flex: 3;" required>
                    <option value="akademik" <?php echo ($row['kategori'] == 'akademik') ? 'selected' : ''; ?>>Akademik</option>
                    <option value="pekerjaan" <?php echo ($row['kategori'] == 'pekerjaan') ? 'selected' : ''; ?>>Pekerjaan</option>
                    <option value="prioritas" <?php echo ($row['kategori'] == 'prioritas') ? 'selected' : ''; ?>>Prioritas</option>
                </select>
            </div> -->
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                <label for="tanggal_dibuat" style="flex: 1;">Tanggal diBuat:</label>
                <input type="date" name="tanggal_dibuat" id="tanggal_dibuat" style="flex: 3;" value="<?php echo $row['tanggal_dibuat']; ?>" required>
            </div>
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                <label for="tanggal_tenggat" style="flex: 1;">Tanggal tenggat:</label>
                <input type="date" name="tanggal_tenggat" id="tanggal_tenggat" style="flex: 3;" value="<?php echo $row['tanggal_tenggat']; ?>" required>
            </div>
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                <label for="judul" style="flex: 1;">Judul:</label>
                <input type="text" name="judul" id="judul" placeholder="" style="flex: 3;" value="<?php echo $row['judul']; ?>" required>
            </div>
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                <label for="content" style="flex: 1;">Content:</label>
                <textarea name="content" id="content" style="flex: 3;" required><?php echo $row['content']; ?></textarea>
            </div>
            <input type="submit" value="Kembali keCatatan Jadwal" id="button">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
    </div>
</body>
</html>

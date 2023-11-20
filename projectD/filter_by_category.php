<?php
// Koneksi ke database (ganti sesuai dengan pengaturan database Anda)
$koneksi = mysqli_connect("localhost", "root", "", "timetracer");

// Periksa koneksi
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Ambil nilai kategori dari permintaan AJAX
$category = $_POST['category'];

// Bangun query berdasarkan kategori
if ($category == 'Semua Catatan') {
  $query = "SELECT judul, kategori FROM jadwal";
} else {
  $query = "SELECT judul, kategori FROM jadwal WHERE kategori = '$category'";
}


// Eksekusi query
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil dijalankan
if (!$result) {
  die("Query failed: " . mysqli_error($koneksi));
}

// Hitung jumlah data yang sudah ditampilkan
$dataCount = 0;

// Loop untuk menampilkan data
while ($row = mysqli_fetch_assoc($result)) {
  echo '<div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 ' . htmlspecialchars($row['kategori']) . '">';
  echo '  <div class="item">';
  echo '    <div class="down-content">';
  echo '      <table class="custom-table">';
  echo '        <tr>';
  echo '          <td>Category:</td>';
  echo '          <td>' . htmlspecialchars($row['kategori']) . '</td>';
  echo '        </tr>';
  echo '        <tr>';
  echo '          <td>Title:</td>';
  echo '          <td><h4>' . htmlspecialchars($row['judul']) . '</h4></td>';
  echo '        </tr>';
  echo '        <tr>';
  echo '          <td>Actions:</td>';
  echo '          <td>';
  echo '            <a href="edit.php"><i class="fa fa-check" style="color: white;"></i></a>';
  echo '          </td>';
  echo '        </tr>';
  echo '      </table>';
  echo '    </div>';
  echo '  </div>';
  echo '</div>';

  // Tambahkan hitungan untuk setiap data yang ditampilkan
  $dataCount++;

  // Jika sudah menampilkan 5 data, tambahkan HTML untuk menggeser footer
  if ($dataCount == 5) {
    echo '<div class="clearfix"></div>'; // Menggunakan clearfix untuk mengatasi float
    $dataCount = 0; // Reset hitungan setelah mencapai 5 data
  }
}

// Tutup koneksi
mysqli_close($koneksi);
?>

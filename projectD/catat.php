
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    body {
      min-height: 100vh;
      /* display: flex; */
      justify-content: center;
      align-items: center;
  }
    main.table {
    width: 82vw;
    height: 90vh;
    margin: auto;
    margin-top: 105px;


    backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;

    overflow: hidden;

}

.table__header {
    width: 100%;
    height: 10%;
    background-color: #fff4;
    padding: .8rem 1rem;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table__header .input-group {
    width: 35%;
    height: 100%;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;

    display: flex;
    justify-content: center;
    align-items: center;

    transition: .2s;
}

.table__header .input-group:hover {
    width: 45%;
    background-color: #fff8;
    box-shadow: 0 .1rem .4rem #0002;
}

.table__header .input-group img {
    width: 1.2rem;
    height: 1.2rem;
}

.table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}

.table__body {
    width: 95%;
    max-height: calc(89% - 1.6rem);
    background-color: #fffb;

    margin: .8rem auto;
    border-radius: .6rem;

    overflow: auto;
    overflow: overlay;

}

.table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{ 
    visibility: visible;
}

table {
    width: 100%;
    margin-right: 4 00px;
}

td img {
    width: 36px;
    height: 36px;
    margin-right: .5rem;
    border-radius: 50%;

    vertical-align: middle;
}

table, th, td {
    border-collapse: collapse;
    padding: 1rem;
    text-align: left;
}

thead th {
    position: sticky;
    top: 0;
    left: 0;
    background-color: #d5d1defe;
    cursor: pointer;
    text-transform: capitalize;
}

tbody tr:nth-child(even) {
    background-color: #0000000b;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
}

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
    transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
}

.status {
    padding: .4rem 0;
    border-radius: 2rem;
    text-align: center;
}

.status.delivered {
    background-color: #86e49d;
    color: #006b21;
}

.status.cancelled {
    background-color: #d893a3;
    color: #b30021;
}

.status.pending {
    background-color: #ebc474;
}

.status.shipped {
    background-color: #6fcaea;
}


@media (max-width: 1000px) {
    td:not(:first-of-type) {
        min-width: 12.1rem;
    }
}

thead th span.icon-arrow {
    display: inline-block;
    width: 1.3rem;
    height: 1.3rem;
    border-radius: 50%;
    border: 1.4px solid transparent;
    
    text-align: center;
    font-size: 1rem;
    
    margin-left: .5rem;
    transition: .2s ease-in-out;
}

thead th:hover span.icon-arrow{
    border: 1.4px solid #6c00bd;
}

thead th:hover {
    color: #6c00bd;
}

thead th.active span.icon-arrow{
    background-color: #6c00bd;
    color: #fff;
}

thead th.asc span.icon-arrow{
    transform: rotate(180deg);
}

thead th.active,tbody td.active {
    color: #6c00bd;
}

  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Jadwal</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="shortcut icon" href="assets/Logo/logo.PNG">
  
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="Dashboard.php" class="logo">
              <img src="assets/Logo/logo.PNG" alt="" style="width: 158px;">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="Dashboard.php">Dashboard</a></li>
              <li><a href="catat.php" class="active">Penjadwalan</a></li>
              <li><a href="kalender.php">Kalender</a></li>
              <li><a href="riwayat.php">Riwayat</a></li>
              <li><a href="profile.php">Profile</a></li>
            </ul>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Silahkan Membuat Jadwal</h3>
          <span class="breadcrumb">
    <a href="Tambah.php">
        <i class="fas fa-pencil-alt" style="color: white;"></i> Klik Disini Untuk Membuat Jadwal
    </a>
</span>
        </div>
      </div>
    </div>
  </div>

      <main class="table">
        <section class="table__header">
            <!-- <h1>JADWAL</h1> -->
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="assets/Logo/plus.png" alt="">
            </div>
            <li>
                <a class="filter-btn" href="#!" data-filter="*" onclick="filterByCategory('Semua Catatan')">Semua Catatan</a>
              </li>
              <li>
                <a class="filter-btn" href="#!" data-filter=".adv" onclick="filterByCategory('Akademik')">Akademik</a>
              </li>
              <li>
                <a class="filter-btn" href="#!" data-filter=".str" onclick="filterByCategory('Pekerjaan')">Pekerjaan</a>
              </li>
              <li>
                <a class="filter-btn" href="#!" data-filter=".rac" onclick="filterByCategory('Prioritas')">Prioritas</a>
              </li>

        </section>
        <section class="table__body">
            <table>
                <thead>
                <!-- <th id="kategori-header"> Kategori <span class="icon-arrow">&UpArrow;</span></th> -->

                    <tr>
                        <th> No. <span class="icon-arrow">&UpArrow;</span></th>
                        <!-- <th> Id User <span class="icon-arrow">&UpArrow;</span></th> -->
                        <th> Judul <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Kategori <span class="icon-arrow">&UpArrow;</span></th>
                        <!-- <th> Content <span class="icon-arrow">&UpArrow;</span></th> -->
                        <th> Tanggal Dibuat <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tenggat <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Aksi <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    
                <?php
$no = 1;
$koneksi = mysqli_connect("localhost", "root", "", "timetracer");

// Periksa koneksi
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Ambil data riwayat pembelian dari database
$query = "SELECT * FROM jadwal";
$result = mysqli_query($koneksi, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $statusText = ($row['status'] == 0) ? "Belum Selesai" : "Selesai";

        // Tambahkan kondisi untuk menyembunyikan data yang sudah selesai
        if ($row['status'] == 0) {
            echo "<tr class='" . strtolower($row['kategori']) . "'>
                    <td>" . $no . "</td>
                    <td>" . $row['judul'] . "</td>
                    <td>" . $row['kategori'] . "</td>
                    <td>" . $row['tanggal_dibuat'] . "</td>
                    <td>" . $row['tanggal_tenggat'] . "</td>
                    <td>" . $statusText . "</td>
                    <td>
                        <a href='lihat.php?id=" . $row['id'] . "' class='btn btn-success'>
                        <i class='fas fa-eye'></i>
                        </a>
                        <a href='edit.php?id=" . $row['id'] . "' class='btn btn-info'>
                            <i class='fas fa-pencil-alt'></i> 
                        </a>
                        <a href='hapus_jadwal.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Anda yakin Ingin Menghapus Data?\")'>
                            <i class='fas fa-trash'></i> 
                        </a>
                        <a href='selesai.php?id=" . $row['id'] . "' class='btn btn-success' onclick='selesaiAction(" . $row['id'] . ")'>
                            <i class='fas fa-check'></i> 
                        </a>
                        
                    </td>
                  </tr>";
            $no++;
        }
    }
}
?>
                </tbody>
            </table>
        </section>
    </main>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2048 LUGX Gaming Company. All rights reserved. &nbsp;&nbsp; <a rel="nofollow" href="https://templatemo.com" target="_blank">Design: TemplateMo</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
  const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}


// 2. Sorting | Ordering data of HTML table

table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        })

        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    }
})


function sortTable(column, sort_asc) {
    [...table_rows].sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    })
        .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
}


function filterByCategory(category) {
    table_rows.forEach(row => {
        const kategori = row.classList[0]; // Ambil kelas pertama pada baris
        const isVisible = category.toLowerCase() === 'semua catatan' || kategori.includes(category.toLowerCase());
        row.classList.toggle('hide', !isVisible);
    });

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}

function selesaiAction(id) {
    // Kirim permintaan AJAX ke selesai.php
    fetch('selesai.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Reload halaman setelah berhasil menyelesaikan
                location.reload();
            } else {
                alert('Gagal menyelesaikan jadwal.');
            }
        })
        .catch(error => console.error('Error:', error));
}

</script>

</body>

</html>

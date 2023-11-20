<?php
$koneksi = mysqli_connect("localhost", "root", "", "timetracer");

// Periksa koneksi
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Ambil data dari database
$query = "SELECT COUNT(CASE WHEN status = 1 THEN 1 END) AS tasksCompleted, COUNT(CASE WHEN status = 0 THEN 1 END) AS tasksInProgress FROM jadwal";
$result = mysqli_query($koneksi, $query);

if ($result) {
    $data = mysqli_fetch_assoc($result);
    $tasksCompleted = $data['tasksCompleted'];
    $tasksInProgress = $data['tasksInProgress'];
} else {
    echo "Error fetching data: " . mysqli_error($koneksi);
}

// Menutup koneksi database
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="assets/Logo/logo.PNG">
    <style>
        #pieChart {
            max-width: 200px;
            margin: auto;
            display: block;
        }

        #chartMessage {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }

        .breadcrumb a::before {
            content: '\1F589';
            color: white;
            margin-right: 5px;
        }

        .chart-container {
            text-align: center;
        }
    </style>
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
                            <li><a href="catat.php">Penjadwalan</a></li>
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
                    <h3>Profile</h3>
                    <span class=""><a href="edit_profil.php"></a>Lihat Profil dan Pencapaian Anda</span>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-page section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container">
                        <div class="profile-container">
                            <div class="left-text">
                                <div class="section-heading">
                                    <h6>Profile</h6>
                                    <h2>Admin</h2>
                                </div>
                                <p></p>
                                <ul>
                                    <li><span>Address</span> Tambahkan Alamat</li>
                                    <li><span>Phone</span> Tambahkan No.HP</li>
                                    <li><span>Email</span> Email dari Database</li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-container">
                            <h2>Tasks Overview</h2>
                            <canvas id="pieChart" width="200" height="200"></canvas>
                            <div id="chartMessage"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="col-lg-12">
                <p>Copyright © 2048 LUGX Gaming Company. All rights reserved. &nbsp;&nbsp; <a rel="nofollow"
                        href="https://templatemo.com" target="_blank">Design: TemplateMo</a></p>
            </div>
        </div>
    </footer>

    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Tasks Completed', 'Tasks In Progress'],
                datasets: [{
                    data: [<?php echo $tasksCompleted; ?>, <?php echo $tasksInProgress; ?>],
                    backgroundColor: ['#36a2eb', '#ff6384']
                }]
            },
            options: {
                legend: {
                    position: 'bottom'
                }
            }
        });

        var chartMessage = document.getElementById('chartMessage');
        if (tasksCompleted == tasksInProgress) {
            chartMessage.innerHTML = '<div class="alert alert-success" role="alert">Pertahankan prestasi Anda!</div>';
        } else if (tasksCompleted > tasksInProgress) {
            chartMessage.innerHTML = '<div class="alert alert-success" role="alert">Pertahankan prestasi Anda!</div>';
        } else {
            chartMessage.innerHTML = '<div class="alert alert-warning" role="alert">Tingkatkan belajar Anda!</div>';
        }
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>

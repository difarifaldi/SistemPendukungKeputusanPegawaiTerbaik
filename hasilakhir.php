<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SPK - Hasil Akhir</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary"><img class="img-fluid me-2 mb-2" src="img/pnj.png" alt="" style="width: 55px;">SPK</h2>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="main.php" class="nav-item nav-link ">Home</a>
                <a href="hitung.php" class="nav-item nav-link ">Perhitungan</a>
                <a href="hasilakhir.php" class="nav-item nav-link active">Hasil Akhir</a>
                <a href="team.php" class="nav-item nav-link">Our Team</a>
                <a href="login.php" class="nav-item nav-link ">Login</a>

            </div>
            <!-- <div class="h-100 d-lg-inline-flex align-items-center d-none">

                <a class="btn btn-square rounded-circle bg-light text-primary me-0" href=""><i class="fab fa-linkedin-in"></i></a>
            </div> -->
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid hero-header bg-info bg-opacity-25 py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Hasil Akhir per Periode Desember 2022</h1>
                    <p class="animated slideInDown">Berikut merupakan nilai dan perankingan akhir kinerja pegawai berdasarkan dengan nilai total terbesar</p>
                    <a href="#table" class="btn btn-primary py-3 px-4 animated slideInDown">Show Data</a>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/9.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Hasil Akhir Start -->
    <div class="container-xxl  py-5 my-5" id="table">

        <div class="d-flex justify-content-center wow fadeInUp " data-wow-delay="0.1s">
            <img class="img-fluid me-4" src="img/tj.png" alt="">
        </div>


        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Nilai dan Ranking</h1>
                <h1 class="display-6 fs-3">Kinerja Pegawai</h1>
                <p class="text-primary fs-5 mb-5">Pemerintah Kecamatan Sukatani, Kabupaten Bekasi</p>

            </div>
            <table class="table xs-1 table-bordered text-center mt-3 table-opacity-25 border-dark wow fadeInUp ">
                <thead class="table-info border-dark">
                    <tr>
                        <td><b>Alternatif<b></td>
                        <td><b>Nilai<b></td>
                        <td><b>Rank<b></td>
                    </tr>
                </thead>
                <tbody class="table-warning border-dark">
                    <?php
                    include 'koneksi.php';
                    $rank = 1;
                    $data = mysqli_query($koneksi, "select *from tabel_ranking order by total DESC LIMIT 3");

                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr class="fw-semibold">
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $d['total']; ?></td>
                            <td><?php echo $rank++; ?></td>
                        </tr>
                        <tr>

                        </tr>
                    <?php
                    }

                    ?>
                </tbody>
                <tfoot>
                    <?php

                    $rank = 4;
                    $data = mysqli_query($koneksi, "select *from tabel_ranking order by total DESC LIMIT 7 OFFSET 3");

                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $d['total']; ?></td>
                            <td><?php echo $rank++; ?></td>
                        </tr>
                        <tr>

                        </tr>
                    <?php
                    }

                    ?>
                </tfoot>
            </table>


        </div>
    </div>
    <!-- Hasil Akhir End -->





    <!-- Footer Start -->
    <div class="bg-info bg-opacity-25">
        <?php
        include 'footer.php' ?>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
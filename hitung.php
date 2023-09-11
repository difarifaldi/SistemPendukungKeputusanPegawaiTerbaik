<!-- Deklarasi Variabel -->
<?php

session_start();
if (!isset($_SESSION["username"])) {

    echo "
    <script>
    alert ('Khusus Kassubag Umum dan Kepegawaian!')
    window.location.href='Login.php';
    </script>
";
    exit();
}
$kriteria = [
    ["Presensi", 1, 0.5, 0.5, 2, 3],
    ["Capaian Kinerja", 2, 1, 1, 3, 5],
    ["Perilaku Kerja", 2, 1, 1, 3, 5],
    ["Ide/Inovasi", 0.5, 0.3, 0.3, 1, 2],
    ["Teguran/Hukuman Disiplin", 0.33, 0.2, 0.2, 0.5, 1],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SPK - Perhitungan</title>
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
                <div class="nav-item dropdown">
                    <a href="hitung.php" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown">Perhitungan</a>
                    <div class="dropdown-menu shadow-sm m-0">
                        <a href="#bobot" class="dropdown-item">Pembobotan</a>
                        <a href="#nkriteria" class="dropdown-item">Penormalan Kriteria</a>
                        <a href="#metode" class="dropdown-item">Metode</a>
                        <a href="#presensi" class="dropdown-item">Presensi</a>
                        <a href="#capaian" class="dropdown-item">Capaian Kinerja</a>
                        <a href="#perilaku" class="dropdown-item">Perilaku Kerja</a>
                        <a href="#ide" class="dropdown-item">Ide/Inovasi</a>
                        <a href="#hukuman" class="dropdown-item">Teguran/Hukuman Disiplin</a>
                        <a href="#ranking" class="dropdown-item">Perankingan</a>
                    </div>
                </div>
                <a href="hasilakhir.php" class="nav-item nav-link">Hasil Akhir</a>
                <a href="team.php" class="nav-item nav-link">Our Team</a>
                <div class="nav-item dropdown">
                    <a href="hitung.php" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"><?php echo $_SESSION['username'] ?></a>
                    <div class="dropdown-menu shadow-sm m-0">
                        <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- <div class="h-100 d-lg-inline-flex align-items-center d-none">

                <a class="btn btn-square rounded-circle bg-info bg-opacity-25 text-primary me-0" href=""><i class="fab fa-linkedin-in"></i></a>
            </div> -->
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid hero-header bg-info bg-opacity-25 py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 mt-1">
                    <h1 class="display-4 mb-3 animated slideInDown fs-2 lh-base">Perhitungan menggunakan MADM AHP</h1>

                    <a href="#bobot" class="btn btn-primary py-3 px-4 animated slideInDown">Explore More</a>
                </div>
                <div class="col-lg-6 animated fadeIn mb-3">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/bbt.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Perbandingan Start -->
    <div class="container-xxl  py-5 my-5" id="bobot">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 fs-2">Matriks</h1>
                <h1 class="display-6 fs-2">Perbandingan Berpasangan</h1>
            </div>
            <table class="table xs-1 table-bordered text-center mt-3   border-dark wow fadeInUp">
                <thead class="fw-bold table-info border-dark wow fadeInUp">
                    <tr>
                        <td>Matriks Perbandingan Berpasangan</td>
                        <td>Presensi</td>
                        <td>Capaian Kinerja</td>
                        <td>Perilaku Kerja</td>
                        <td>Ide/Inovasi</td>
                        <td>Teguran/Hukuman Disiplin</td>
                    </tr>
                </thead>
                <tbody class="wow fadeInUp">
                    <tr>
                        <td>Presensi</td>
                        <td>1</td>
                        <td><sup>1</sup>⁄<sub>2</sub></td>
                        <td><sup>1</sup>⁄<sub>2</sub></td>
                        <td>2</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>Capaian Kinerja</td>
                        <td>2</td>
                        <td>1</td>
                        <td>1</td>
                        <td>3</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Perilaku Kerja</td>
                        <td>2</td>
                        <td>1</td>
                        <td>1</td>
                        <td>3</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Ide/Inovasi</td>
                        <td><sup>1</sup>⁄<sub>2</sub></td>
                        <td><sup>1</sup>⁄<sub>3</sub></td>
                        <td><sup>1</sup>⁄<sub>3</sub></td>
                        <td>1</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Teguran/Hukuman Disiplin</td>
                        <td><sup>1</sup>⁄<sub>3</sub></td>
                        <td><sup>1</sup>⁄<sub>5</sub></td>
                        <td><sup>1</sup>⁄<sub>5</sub></td>
                        <td><sup>1</sup>⁄<sub>2</sub></td>
                        <td>1</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <!-- Perbandingan End -->

    <!-- Kriteria bobot Start -->
    <div class="container-xxl  py-5 my-5" id="bobot">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Pendesimalan Kriteria</h1>
            </div>
            <table class="table xs-1 table-bordered text-center mt-3  table-opacity-25 border-dark wow fadeInUp">
                <thead class="fadeInUp border-dark table-info fw-bold">
                    <tr>
                        <td>Matriks Perbandingan Berpasangan</td>
                        <td>Presensi</td>
                        <td>Capaian Kinerja</td>
                        <td>Perilaku Kerja</td>
                        <td>Ide/Inovasi</td>
                        <td>Teguran/Hukuman Disiplin</td>
                    </tr>
                </thead>
                <tbody class="wow fadeInUp">
                    <?php
                    $totalP = 0;
                    $totalCP = 0;
                    $totalPK = 0;
                    $totalI = 0;
                    $totalH = 0;
                    foreach ($kriteria as $krt) :
                        $totalP += $krt[1];
                        $totalCP += $krt[2];
                        $totalPK += $krt[3];
                        $totalI += $krt[4];
                        $totalH += $krt[5];
                    ?>
                        <tr>
                            <td><?= $krt[0]; ?></td>
                            <td><?= $krt[1]; ?></td>
                            <td><?= $krt[2]; ?></td>
                            <td><?= $krt[3]; ?></td>
                            <td><?= $krt[4]; ?></td>
                            <td><?= $krt[5]; ?></td>
                        <?php endforeach; ?>
                        </tr>
                        <td class="fw-bold">Total</td>
                        <td class="fw-bold"><?= $totalP ?></td>
                        <td class="fw-bold"><?= $totalCP ?></td>
                        <td class="fw-bold"><?= $totalPK ?></td>
                        <td class="fw-bold"><?= $totalI ?></td>
                        <td class="fw-bold"><?= $totalH ?></td>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Kriteria Bobot End -->


    <!-- Penormalan Kriteria Start -->
    <div class="container-xxl bg-info bg-opacity-25 py-5 my-5" id="nkriteria">

        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 mb-3">Kriteria</h1>

                <div class="accordion " id="accordionExample">
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Menormalkan setiap kolom i dengan matriks perbandingan berpasangan
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body bg-info bg-opacity-25">
                                <img src="img/11.png" alt="" style="width: 15rem;">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.1s">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Mencari nilai rata-rata
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body bg-info bg-opacity-25">
                                <img src="img/22.png" alt="" style="width: 15rem;">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Melakukan uji konsistensi
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body bg-info bg-opacity-25">
                                <img src="img/33.png" alt="" style="width: 15rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="mb-3 text-center fs-4 wow fadeInUp">Tabel Normalisasi Setiap Kolom A</h1>
            <table class="table xs-1 table-light table-opacity-25 border-light border-opacity-25  text-center wow fadeInUp">
                <thead class="fw-bold  border-dark wow fadeInUp">
                    <tr>
                        <td></td>
                        <td>Presensi</td>
                        <td>Capaian Kinerja</td>
                        <td>Perilaku Kerja</td>
                        <td>Ide/Inovasi</td>
                        <td>Teguran/Hukuman Disipin</td>
                        <td>Rata-Rata</td>
                        <td>Eigen Value</td>
                    </tr>
                </thead>
                <tbody class="wow fadeInUp">
                    <?php
                    $no = 0;
                    $a = array($totalP, $totalCP, $totalPK, $totalI, $totalH);
                    $ci = 0;
                    $cr = 0;
                    $rata = 0;
                    $totalEv = 0;
                    foreach ($kriteria as $krt) :
                        $tP = number_format($krt[1] / $totalP, 4);
                        $tCP = number_format($krt[2] / $totalCP, 4);
                        $tPK = number_format($krt[3] / $totalPK, 4);
                        $tI = number_format($krt[4] / $totalI, 4);
                        $tH = number_format($krt[5] / $totalH, 4);
                        $rata = number_format(($tP + $tCP + $tPK + $tI + $tH) / 5, 4);
                        $ev = number_format($rata * $a[$no], 4);
                        $totalEv += $ev;
                        $ci = number_format(($totalEv - 5) / 4, 4);
                        $cr = number_format($ci / 1.12, 4);
                    ?>
                        <tr>
                            <td class="fw-bold"><?= $krt[0]; ?></td>
                            <td><?= $tP ?></td>
                            <td><?= $tCP ?></td>
                            <td><?= $tPK ?></td>
                            <td><?= $tI ?></td>
                            <td><?= $tH ?></td>
                            <td><?= $rata ?></td>
                            <td><?= $ev ?></td>
                        </tr>
                    <?php
                        $no++;
                    endforeach;
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td class="fw-bolder">Total</td>
                        <td colspan="6" class=></td>
                        <td class="fw-bold"><?= $totalEv ?></td>
                </tfoot>
            </table>

            <div class="accordion" id="accordionExample" style="max-width: 500px;">
                <div class=" accordion-item wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Mencari indeks konsistensi
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-info bg-opacity-25">
                            <img src="img/44.png" alt="" style="width: 15rem;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table xs-1   table-bordered border-dark bg-light text-center wow fadeInUp">
                <tbody class="wow fadeInUp">
                    <tr>
                        <td>CI</td>
                        <td><?= $ci ?></td>
                    </tr>
                    <tr>
                        <td>RI (5)</td>
                        <td><?= 1.12 ?></td>
                    </tr>
                    <tr>
                        <td>CR</td>
                        <td><?= $cr ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="accordion" id="accordionExample" style="max-width: 500px;">
                <div class=" accordion-item wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Kesimpulan
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-info bg-opacity-25">
                            <img src="img/5.png" alt="" style="width: 30rem;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Penormalan Kriteria End -->


    <!-- Rumus Start -->
    <div class="container-xxl  py-5 my-5" id="metode">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 mb-5">Metode Perhitungan</h1>

            </div>
            <div class="row ">
                <div class="col-lg-5 mx-5 wow fadeInUp " data-wow-delay="0.1s">
                    <img class="img-fluid mb-4" src="img/16.png" alt="">
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid mb-4" src="img/17.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Rumus End -->


    <!-- Presensi Start -->
    <?php
    include 'koneksi.php';
    $max = mysqli_query($koneksi, "SELECT MAX(presensi) AS presen
        FROM tabel_pegawai");
    while ($res = mysqli_fetch_array($max)) {
        $maxP = $res['presen'];
    } ?>
    <div class="container-xxl bg-info bg-opacity-25 py-5 my-5" id="presensi">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Presensi</h1>
                <p class="fs-3 text-primary">Profit</p>
            </div>
            <h5 class="text-dark fs-5 mb-5 wow fadeInUp">Nilai Max = <?= $maxP ?></h5>
            <table class="table xs-1 table-light table-opacity-25 border-light border-opacity-25  text-center wow fadeInUp ">
                <thead class="fw-bold  border-dark wow fadeInUp">
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Presensi</td>
                        <td>Hasil Bagi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $totalPresensi = 0;
                    $data = mysqli_query($koneksi, "select *from tabel_pegawai");

                    while ($d = mysqli_fetch_array($data)) {
                        $hasilP = number_format($d['presensi'] / $maxP, 4);
                        $totalPresensi += $hasilP;
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $d['presensi']; ?></td>
                            <td><?php echo $hasilP; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <td class="fw-bold">Total</td>
                    <td colspan="2"></td>
                    <td><?php echo $totalPresensi ?></td>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Presensi End -->


    <!-- Penormalan Presensi Start -->
    <div class="container-xxl  py-5 my-5" id="bobot">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 ">Penormalan Presensi</h1>
            </div>
            <table class="table xs-1 table-bordered text-center mt-3   border-dark wow fadeInUp ">
                <thead class="fw-bold table-info border-dark wow fadeInUp">
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Hasil Bagi</td>
                        <td>Bobot Alternatif Berdasarkan Kriteria</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;

                    $data = mysqli_query($koneksi, "select *from tabel_pegawai");

                    while ($d = mysqli_fetch_array($data)) {

                        $hasilP = number_format($d['presensi'] / $maxP, 4);
                        $akhirP = number_format($hasilP / $totalPresensi, 4);
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $hasilP; ?></td>
                            <td><?php echo $akhirP; ?></td>
                        </tr>
                        <tr>

                        </tr>
                    <?php
                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <!-- Penormalan Presensi End -->


    <!-- Capaian Start -->
    <?php
    include 'koneksi.php';
    $max = mysqli_query($koneksi, "SELECT MAX(capaian) AS capai
        FROM tabel_pegawai");
    while ($res = mysqli_fetch_array($max)) {
        $maxC = $res['capai'] * 100;
    } ?>
    <div class="container-xxl bg-info bg-opacity-25 py-5 my-5" id="capaian">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Capaian Kinerja</h1>
                <p class="fs-3 text-primary">Profit</p>

            </div>
            <h5 class="mb-2 wow fadeInUp">Nilai max = <?= $maxC ?></h5>
            <table class="table xs-1 table-light table-opacity-25 border-light border-opacity-25  text-center wow fadeInUp ">
                <thead class="fw-bold  border-dark wow fadeInUp">
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Capaian Kinerja</td>
                        <td>Hasil Bagi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $totalCapaian = 0;
                    $data = mysqli_query($koneksi, "select *from tabel_pegawai");

                    while ($d = mysqli_fetch_array($data)) {

                        $totalCapaian += $d['capaian'];

                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $d['capaian'] * 100; ?></td>
                            <td><?php echo $d['capaian']; ?></td>
                        </tr>

                    <?php
                    }

                    ?>
                </tbody>
                <tfoot>
                    <td class="fw-bold">Total</td>
                    <td></td>
                    <td></td>

                    <td class="fw-bold"><?php echo $totalCapaian ?></td>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Capaian End -->


    <!-- Penormalan Capaian Start -->
    <div class="container-xxl  py-5 my-5" id="bobot">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 fs-2">Penormalan </h1>
                <h1 class="display-6">Capaian Kinerja</h1>
            </div>
            <table class="table xs-1 table-bordered text-center mt-3  table-opacity-25 border-dark wow fadeInUp ">
                <thead class="fw-bold table-info border-dark wow fadeInUp">
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Hasil Bagi</td>
                        <td>Bobot Alternatif Berdasarkan Kriteria</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;

                    $data = mysqli_query($koneksi, "select *from tabel_pegawai");

                    while ($d = mysqli_fetch_array($data)) {

                        $akhirC = number_format($d['capaian'] / $totalCapaian, 4);
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $d['capaian']; ?></td>
                            <td><?php echo $akhirC; ?></td>
                        </tr>
                        <tr>

                        </tr>
                    <?php
                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <!-- Penormalan Capaian End -->


    <!-- Perilaku Start -->
    <?php
    include 'koneksi.php';
    $max = mysqli_query($koneksi, "SELECT MAX(perilaku) AS laku
        FROM tabel_pegawai");
    while ($res = mysqli_fetch_array($max)) {
        $maxPe = $res['laku'];
    } ?>
    <div class="container-xxl bg-info bg-opacity-25 py-5 my-5" id="perilaku">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Perilaku Kerja </h1>
                <p class="fs-3 text-primary">Profit</p>

            </div>
            <h5 class="mb-2 wow fadeInUp">Nilai max = <?= $maxPe ?></h5>
            <table class="table xs-1 table-light table-opacity-25 border-light border-opacity-25  text-center wow fadeInUp ">
                <thead class="fw-bold  border-dark wow fadeInUp">
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Perilaku Kerja</td>
                        <td>Hasil Bagi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $totalPerilaku = 0;
                    $data = mysqli_query($koneksi, "select *from tabel_pegawai");

                    while ($d = mysqli_fetch_array($data)) {
                        $hasilPe = number_format($d['perilaku'] / $maxPe, 4);
                        $totalPerilaku += $hasilPe;
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $d['perilaku']; ?></td>
                            <td><?php echo $hasilPe; ?></td>
                        </tr>

                    <?php
                    }

                    ?>
                </tbody>
                <tfoot>
                    <td class="fw-bold">Total</td>
                    <td></td>
                    <td></td>
                    <td class="fw-bold"><?php echo $totalPerilaku ?></td>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Perilaku End -->

    <!-- Penormalan Perilaku Start -->
    <div class="container-xxl  py-5 my-5" id="bobot">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 fs-2">Penormalan </h1>
                <h1 class="display-6">Perilaku Kerja</h1>
            </div>
            <table class="table xs-1 table-bordered text-center mt-3  table-opacity-25 border-dark wow fadeInUp ">
                <thead class="fw-bold table-info border-dark wow fadeInUp">
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Hasil Bagi</td>
                        <td>Bobot Alternatif Berdasarkan Kriteria</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;

                    $data = mysqli_query($koneksi, "select *from tabel_pegawai");

                    while ($d = mysqli_fetch_array($data)) {

                        $hasilPe = number_format($d['perilaku'] / $maxPe, 4);
                        $akhirPe = number_format($hasilPe / $totalPerilaku, 4);
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $hasilPe; ?></td>
                            <td><?php echo $akhirPe; ?></td>
                        </tr>
                        <tr>

                        </tr>
                    <?php
                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <!-- Penormalan Perilaku End -->


    <!-- Ide Start -->
    <?php
    include 'koneksi.php';
    $max = mysqli_query($koneksi, "SELECT MAX(ide) AS ide1
        FROM tabel_pegawai");
    while ($res = mysqli_fetch_array($max)) {
        $maxI = $res['ide1'];
    } ?>
    <div class="container-xxl bg-info bg-opacity-25 py-5 my-5" id="ide">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Ide / Inovasi </h1>
                <p class="fs-3 text-primary">Profit</p>

            </div>
            <h5 class="mb-2 wow fadeInUp">Nilai max = <?= $maxI ?></h5>
            <table class="table xs-1 table-light table-opacity-25 border-light border-opacity-25  text-center wow fadeInUp ">
                <thead class="fw-bold  border-dark wow fadeInUp">
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Ide/Inovasi</td>
                        <td>Hasil Bagi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $totalIde = 0;
                    $data = mysqli_query($koneksi, "select *from tabel_pegawai");

                    while ($d = mysqli_fetch_array($data)) {
                        $hasilI = number_format($d['ide'] / $maxI, 1);
                        $totalIde += $hasilI;
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $d['ide']; ?></td>
                            <td><?php echo $hasilI; ?></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <td class="fw-bold">Total</td>
                    <td></td>
                    <td></td>
                    <td class="fw-bold"><?php echo $totalIde ?></td>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Ide End -->


    <!-- Penormalan Ide Start -->
    <div class="container-xxl  py-5 my-5" id="ide">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 fs-2">Penormalan</h1>
                <h1 class="display-6">Ide / Inovasi</h1>
            </div>
            <table class="table xs-1 table-bordered text-center mt-3  table-opacity-25 border-dark wow fadeInUp ">
                <thead class="fw-bold table-info border-dark wow fadeInUp">
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Hasil Bagi</td>
                        <td>Bobot Alternatif Berdasarkan Kriteria</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;

                    $data = mysqli_query($koneksi, "select *from tabel_pegawai");

                    while ($d = mysqli_fetch_array($data)) {

                        $hasilI = number_format($d['ide'] / $maxI, 2);
                        $akhirI = number_format($hasilI / $totalIde, 4);
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $hasilI; ?></td>
                            <td><?php echo $akhirI; ?></td>
                        </tr>
                        <tr>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Penormalan Ide End -->


    <!-- Hukuman Start -->
    <?php
    include 'koneksi.php';
    $min = mysqli_query($koneksi, "SELECT MIN(hukuman) AS hkm
        FROM tabel_pegawai");
    while ($res = mysqli_fetch_array($min)) {
        $minH = $res['hkm'];
    } ?>
    <div class="container-xxl bg-info bg-opacity-25 py-5 my-5" id="hukuman">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Teguran / Hukuman Disiplin</h1>
                <p class="fs-3 text-primary">Cost</p>

            </div>
            <h5 class="wow fadeInUp">Nilai min : <?= $minH ?></h5>
            <table class="table xs-1 table-light table-opacity-25 border-light border-opacity-25  text-center wow fadeInUp ">
                <thead class="fw-bold  border-dark wow fadeInUp">
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Teguran/Hukuman Disiplin</td>
                        <td>Hasil Bagi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $totalHukuman = 0;
                    $data = mysqli_query($koneksi, "select *from tabel_pegawai");

                    while ($d = mysqli_fetch_array($data)) {
                        $hasilH = number_format($minH / $d['hukuman'], 1);
                        $totalHukuman += $hasilH;
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $d['hukuman']; ?></td>
                            <td><?php echo $hasilH; ?></td>
                        </tr>

                    <?php
                    }

                    ?>
                </tbody>
                <tfoot>
                    <td class="fw-bold">Total</td>
                    <td></td>
                    <td></td>
                    <td class="fw-bold"><?php echo $totalHukuman ?></td>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Hukuman End -->


    <!-- Penormalan Hukuman Start -->
    <div class="container-xxl  py-5 my-5" id="bobot">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 fs-2">Penormalan </h1>
                <h1 class="display-6">Teguran / Hukuman Disiplin</h1>
            </div>
            <table class="table xs-1 table-bordered text-center mt-3  table-opacity-25 border-dark wow fadeInUp ">
                <thead class="fw-bold table-info border-dark wow fadeInUp">
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Hasil Bagi</td>
                        <td>Bobot Alternatif Berdasarkan Kriteria</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;

                    $data = mysqli_query($koneksi, "select *from tabel_pegawai");

                    while ($d = mysqli_fetch_array($data)) {

                        $hasilH = number_format($minH / $d['hukuman'], 2);
                        $akhirH = number_format($hasilH / $totalHukuman, 4);
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $hasilH; ?></td>
                            <td><?php echo $akhirH; ?></td>
                        </tr>
                        <tr>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Penormalan Hukuman End -->

    <!-- Perankingan Start -->
    <div class="container-xxl bg-info bg-opacity-25 py-5 my-5" id="ranking">
        <div class="container py-5">
            <div class="text-center mb-5 mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 mb-3">Perankingan</h1>
                <div class="accordion " id="accordionExample">
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Menghitung total skor
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse " aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                            <div class="accordion-body bg-info bg-opacity-25">
                                <img src="img/7.png" alt="" style="width: 15rem;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <table class="table xs-1 table-bordered text-center wow fadeInUp table-light table-opacity-25 border-black  ">
                <thead class="fw-bold  border-dark wow fadeInUp">
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Presensi</td>
                        <td>Capaian Kerja</td>
                        <td> Perilaku Kerja</td>
                        <td>Ide</td>
                        <td>Hukuman</td>
                        <td class="fw-bold">Total</td>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $totalSemua = 0;
                    $data = mysqli_query($koneksi, "select *from tabel_pegawai");

                    while ($d = mysqli_fetch_array($data)) {

                        foreach ($kriteria as $krt) :
                            $tP = number_format($krt[1] / $totalP, 4);
                            $tCP = number_format($krt[2] / $totalCP, 4);
                            $tPK = number_format($krt[3] / $totalPK, 4);
                            $tI = number_format($krt[4] / $totalI, 4);
                            $tH = number_format($krt[5] / $totalH, 4);
                            $rata = number_format(($tP + $tCP + $tPK + $tI + $tH) / 5, 4);
                            $a[] = $rata;
                        endforeach;

                        $hasilH = number_format($minH / $d['hukuman'], 2);
                        $akhirH = number_format($hasilH / $totalHukuman, 4);
                        $hasilI = number_format($d['ide'] / $maxI, 2);
                        $akhirI = number_format($hasilI / $totalIde, 4);
                        $hasilPe = number_format($d['perilaku'] / $maxPe, 2);
                        $akhirPe = number_format($hasilPe / $totalPerilaku, 4);
                        $akhirC = number_format($d['capaian'] / $totalCapaian, 4);
                        $hasilP = number_format($d['presensi'] / $maxP, 4);
                        $akhirP = number_format($hasilP / $totalPresensi, 4);
                        $rankP = number_format($akhirP * $a[5], 4);
                        $rankC = number_format($akhirC * $a[6], 4);
                        $rankPe = number_format($akhirPe * $a[7], 4);
                        $rankI = number_format($akhirI * $a[8], 4);
                        $rankH = number_format($akhirH * $a[9], 4);
                        $totalSemua = number_format($rankP + $rankC + $rankPe + $rankI + $rankH, 4);


                    ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $rankP; ?></td>
                            <td><?php echo $rankC; ?></td>
                            <td><?php echo $rankPe; ?></td>
                            <td><?php echo $rankI; ?></td>
                            <td><?php echo $rankH; ?></td>
                            <td><?php echo $totalSemua; ?></td>
                        </tr>
                        <tr>

                        </tr>

                    <?php
                        $namaKriteria = $d['alternatif'];
                        $query = "INSERT INTO tabel_ranking (alternatif, total) VALUES('$namaKriteria','$totalSemua')";
                        mysqli_query($koneksi, $query);
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Perankingan End -->

    <!-- Footer Start -->
    <?php
    include 'footer.php' ?>

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
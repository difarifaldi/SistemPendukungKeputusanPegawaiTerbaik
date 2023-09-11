<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SPK - Home</title>
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
                <a href="main.php" class="nav-item nav-link active">Home</a>
                <a href="hitung.php" class="nav-item nav-link ">Perhitungan</a>
                <a href="hasilakhir.php" class="nav-item nav-link">Hasil Akhir</a>
                <a href="team.php" class="nav-item nav-link">Our Team</a>
                <a href="login.php" class="nav-item nav-link">Login</a>

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
                    <h1 class="display-4 mb-3 animated slideInDown">Penilaian Kinerja Pegawai</h1>
                    <p class="animated slideInDown">Pemerintah Kecamatan Sukatani, Kabupaten Bekasi</p>
                    <a href="" class="btn btn-primary py-3 px-4 animated slideInDown">Explore More</a>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/10.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Data Pegawai Start -->
    <div class="container-xxl  py-5 my-5" id="table">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Data Pegawai</h1>

            </div>
            <table class="table xs-1 table-bordered text-center mt-3  border-dark wow fadeInUp">
                <thead class="align-middle table-info table-opacity-25 border-dark">
                    <tr>
                        <td><b>No</b></td>
                        <td><b>NIP</b></td>
                        <td><b>Nama</b></td>
                        <td><b>Pangkat, Golongan</b></td>
                        <td><b>Jabatan</b></td>
                        <td><b>Eselon</b></td>
                        <td><b>Unit Kerja</b></td>

                    </tr>
                </thead>
                <tbody class=" align-middle">
                    <?php
                    include 'koneksi.php';
                    $no = 1;

                    $data = mysqli_query($koneksi, "select *from tabel_pegawai ");

                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nip']; ?></td>
                            <td><?php echo $d['alternatif']; ?></td>
                            <td><?php echo $d['pangkat']; ?></td>
                            <td><?php echo $d['jabatan']; ?></td>
                            <td><?php echo $d['eselon']; ?></td>
                            <td><?php echo $d['unit kerja']; ?></td>
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
    <!-- Data Pegawai End -->

    <!-- Sejarah Start -->
    <div class="container-xxl bg-info bg-opacity-25 py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="img/ahp.png" alt="">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6 text-center">AHP</h1>
                        <p class="text-primary fs-5 mb-4 text-center">Analytic Hierarchy Process</p>
                        <p class="lh-base" style=" text-align: justify;">&emsp; AHP merupakan salah satu metode Multiple Attribute Decision Making (MADM) yang dikembangkan oleh Thomas L. Saaty seorang ahli matematika dari Universitas Pittsburg, Amerika Serikat pada tahun 1970-an. Model pendukung keputusan ini akan menguraikan masalah multi-faktor atau multi-kriteria yang kompleks menjadi suatu hirarki.
                        </p>
                        <p class=" lh-base" style=" text-align: justify;">&emsp; Hirarki didefinisikan sebagai suatu representasi dari sebuah permasalahan yang kompleks dalam suatu struktur multi-level dimana level pertama adalah tujuan, yang diikuti level faktor, kriteria, sub kriteria, dan seterusnya ke bawah hingga level terakhir dari alternatif. Dengan hirarki, suatu masalah yang kompleks dapat diuraikan ke dalam kelompok-kelompoknya yang kemudian diatur menjadi suatu bentuk hirarki sehingga permasalahan akan tampak lebih terstruktur dan sistematis.</p>
                        <p class="mb-4">Beberapa kelebihan metode AHP diantaranya:</p>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>Unity & Complexity</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>Measurement & Consistency</span>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>Inter Dependence</span>
                        </div>
                        <a class="btn btn-primary py-3 px-4" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- AHP End -->


    <!-- Roadmap Start -->
    <div class="container-xxl py-5 my-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Tahapan Perhitungan</h1>
                <p class="text-primary fs-5 mb-5">MADM AHP</p>
            </div>
            <div class="owl-carousel roadmap-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 1</h5>
                    <span>Identifikasi kriteria dan alternatif</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 2</h5>
                    <span>Menentukan tingkat kepentingan atau prioritas kriteria</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 3</h5>
                    <span>Membentuk matriks perbandingan berpasangan</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 4</h5>
                    <span>Mendesimalkan dan menormalisasi setiap kolom i dengan matriks perbandingan berpasangan</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 5</h5>
                    <span>Menghitung rata-rata sehingga menghasilkan nilai bobot kriteria</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 6</h5>
                    <span>Mengkalikan matriks perbandingan berpasangan dengan matriks transpose (vektor bobot kriteria)</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 7</h5>
                    <span>Menghitung t</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 8</h5>
                    <span>Menghitung indeks konsistensi CI</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 9</h5>
                    <span>Identifikasi indeks random RI berdasarkan n kriteria</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 10</h5>
                    <span>Menguji konsistensi CR. Jika nilainya kurang dari 10%, maka data penilaian cukup konsisten.</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 11</h5>
                    <span>Menghitung bobot setiap alternatif berdasarkan kriteria menggunakan rumus Profit dan Cost</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 12</h5>
                    <span>Melakukan penormalan alternatif dengan mengkalikan matriks perbandingan berpasangan setiap alternatif dengan matriks transpose (vektor bobot kriteria)</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 13</h5>
                    <span>Melakukan perankingan</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahap 14</h5>
                    <span>Mendefinisikan statement akhir</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Roadmap End -->



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
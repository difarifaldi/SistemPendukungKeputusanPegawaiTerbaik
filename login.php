<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SPK - Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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

<body class="bg-info bg-opacity-25">
    <?php
    require('koneksi.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($koneksi, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($koneksi, $password);
        $_SESSION['username'] = $username;
        // Check user is exist in the database
        $query    = "SELECT * FROM `admin` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($koneksi, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;

            // Redirect to user dashboard page
            header("Location: hitung.php");
        } else {
            echo "<script> alert('Tidak Terdaftar!');
                window.location.href='login.php';
                </script>";
        }
    ?>

    <?php } else {
    ?>
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
                    <a href="hasilakhir.php" class="nav-item nav-link">Hasil Akhir</a>

                </div>

            </div>
        </nav>
        <section class="form my-5 mx-5">
            <div class="container m-5">
                <div class="row no-gutters rounded-5 bg-white shadow-lg mt-5">

                    <div class="col-lg-7 pt-5 px-5">
                        <h1 class="font-weight-bold py-">Login Admin</h1>
                        <h4 class="text-danger">Khusus Kasubbag Umum dan Kepegawaian</h4>
                        <form class="form" method="post" name="login">
                            <div class="form-row">
                                <div class="col-lg-7 ">
                                    <input type="username" class="form-control my-3 p-3" placeholder="Username" name="username" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-7 ">
                                    <input type="password" class="form-control my-3 p-3" placeholder="Password" name="password" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-7">
                                    <input type="submit" class="btn btn-primary mt-3 mb-3" value="Login" name="submit" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 pt-2 px-3">
                        <img src="img/c.png" class=" img-fluid ">
                    </div>
                </div>
            </div>
        </section>

    <?php
    }
    ?>
</body>
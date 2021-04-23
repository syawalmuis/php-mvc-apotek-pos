<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- Csrf Token -->

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Page <?=$data['title'];?> </title>

    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?=BASEURL;?>/medilab/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASEURL;?>/medilab/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?=BASEURL;?>/medilab/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?=BASEURL;?>/medilab/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?=BASEURL;?>/medilab/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?=BASEURL;?>/medilab/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?=BASEURL;?>/medilab/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?=BASEURL;?>/medilab/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?=BASEURL;?>/medilab/assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="<?=BASEURL;?>/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?=BASEURL;?>/table/css/dataTables.bootstrap4.min.css">



    <!-- ===== font awesome ===== -->
    <link rel="stylesheet" href="<?= BASEURL ;?>/font/css/all.css">

    <!-- =======================================================
  * Template Name: Medilab - v2.0.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
                <i class="icofont-phone"></i> +62 8515 6192 552
                <i class="icofont-google-map"></i> Jl. Poros Pinrang-Polman, Km. 32
            </div>
            <div class="social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="#" class="skype"><i class="icofont-skype"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="index.html">Apotek_X</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="<?=$data['home'];?>"><a href="<?=BASEURL;?>/home"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="<?=$data['product'];?> trans"><a href="#product"><i class="fas fa-capsules"></i>
                            Product</a></li>
                    <!-- <li><a href="#category"><i class="bx bxs-report"></i> Category</a></li> -->

                    <!--
          <li><a href="#doctors">Doctors</a></li>
          <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li></ul>
        -->

            </nav><!-- .nav-menu -->

            <a href="#appointment" class="appointment-btn scrollto example-popover" data-container="body"
                data-toggle="popover" data-html="true" data-placement="bottom" data-content="
    
<a href='<?=BASEURL?>/login' class='btn btn-xl d-flex flex-row-reverse' ><i class='fas fa-sign-in-alt'></i></a>

    ">
                <i class="bx bxs-user"></i></a>



        </div>
    </header><!-- End Header -->
    <!-- Modal -->
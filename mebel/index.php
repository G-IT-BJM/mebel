<?php include 'koneksi.php' ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CV. Sumber Bahagia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- Sidebar -->
        <?php include "sidebar.php"; ?>
        <!-- end sidebar -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="breadcrumbs-area clearfix">
                            <h5 class="page-title pull-left">CV. SUMBER BAHAGIA</h5>
                        </div>
                    </div>
                    <div class="col-sm-4 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">&nbsp;&nbsp; Admin <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20">
                                    <?php $q = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS JUMLAH FROM tproduksi WHERE (no_pesanan) NOT IN (SELECT no_pesanan FROM tkirim GROUP BY tkirim.no_pesanan) GROUP BY tproduksi.no_pesanan")) ?>
                                    <div class="icon" style="background-color:#007BFF;"><?= $q['JUMLAH']?></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title"> </h4>
                                        <h2 class="header-title"><span class="fa fa-book" style="font-size:60px;color:black;"></span></h2>
                                    </div>
                                </div>
                                <h1 class="pl--20">Pesanan <br>Belum Selesai</h1>
                                <br>
                                <a href=""><button class="btn btn-primary" style="width:100%; border-radius:0%;">Lihat Detail</button></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20">
                                    <?php $q = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS JUMLAH FROM tproduksi WHERE (no_pesanan) NOT IN (SELECT no_pesanan FROM tkirim GROUP BY tkirim.no_pesanan) GROUP BY tproduksi.no_pesanan")) ?>
                                    <div class="icon" style="background-color:#007BFF;"><?= $q['JUMLAH']?></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title"> </h4>
                                        <h2 class="header-title"><span class="fa fa-cogs" style="font-size:60px;color:black;"></span></h2>
                                    </div>
                                </div>
                                <h1 class="pl--20">Produksi <br>Belum Selesai</h1>
                                <br>
                                <a href=""><button class="btn btn-primary" style="width:100%; border-radius:0%;">Lihat Detail</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sales report area end -->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include "footer.php"; ?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>

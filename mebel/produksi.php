<?php include "koneksi.php"; ?>
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
                <div class="row">
                    <!-- Progress Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-title">
                                    <h4>PRODUKSI</h4>
                                    <hr>
                                </div>
                                <div class="header-title">
                                    <div class="form-row">
                                        <div class="col-sm-3">
                                            <a href="t-produksi.php"><button class="btn btn-primary">Tambah Data <span class="fa fa-cart-plus"></span></button></a>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3 pull-right">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" style="background-color: #007BFF; color: white;"><span class="fa fa-search"></span></div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Cari . . .">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Aksi</th>
                                                    <th scope="col">No. Produksi</th>
                                                    <th scope="col">No. Pesanan</th>
                                                    <th scope="col">Nama Tukang</th>
                                                    <th scope="col">Tgl Produksi</th>
                                                    <th scope="col">Harga Jual</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no = 1;
                                                    $sql = mysqli_query($conn, "SELECT * FROM tproduksi JOIN mtukang WHERE mtukang.id_tukang = tproduksi.id_tukang ORDER BY tanggalprod DESC");

                                                    while($data = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td>
                                                            <ul class="d-flex justify-content">
                                                                <li class="mr-3"><a href="u-produksi.php?no_produksi=<?= $data['no_produksi'] ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                                <li><a href="proses_produksi.php?hapusProduksi=<?= $data['no_produksi'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="text-danger"><i class="ti-trash"></i></a></li>
                                                            </ul>
                                                        </td>
                                                        <td><?= $data["no_produksi"] ?></td>
                                                        <td><?= $data["no_pesanan"] ?></td>
                                                        <td><?= $data["nama"] ?></td>
                                                        <td><?= date("d-m-Y", strtotime($data["tanggalprod"])) ?></td>
                                                        <td><?= number_format($data["harga_jual"],0) ?></td>                                                        
                                                    </tr>
                                                <?php
                                                        $no++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Progress Table end -->
                </div>
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

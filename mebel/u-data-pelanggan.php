<?php 
    include "koneksi.php"; 
    
    $id = $_GET['idpelanggan'];
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mpelanggan WHERE id_pelanggan = '$id'"));
?>
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
                                <form action="proses.php" method="post" enctype="multipart/form-data">
                                    <h4 class="header-title">UBAH DATA PELANGGAN</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label for="kd_pel" class="col-form-label">Kode Pelanggan</label>
                                        <input class="form-control" type="text" id="kd_pel" name="kd_pel" value="<?= $data["id_pelanggan"] ?>" required readonly style="width: 30%;">
                                    
                                        <label for="nm_pel" class="col-form-label">Nama</label>
                                        <input class="form-control" type="text" id="nm_pel" name="nm_pel" value="<?= $data["nama_p"] ?>" required>
                                    
                                        <label for="telp" class="col-form-label">Telp.</label>
                                        <input class="form-control" type="text" id="telp" name="telp" value="<?= $data["telp_p"] ?>" maxlength="12" required style="width: 50%;">
                                    
                                        <label for="alamat" class="col-form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" cols="5" rows="5" required><?= $data["alamat_p"] ?></textarea>
                                    </div>
                                    <hr>
                                    <div class="header-title">
                                        <a href="m-pelanggan.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                                    
                                        <button type="submit" class="btn btn-success" id="ubah_pel" name="ubah_pel">SIMPAN <span class="fa fa-check-square-o"></span></button>
                                    </div>
                                </form>
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

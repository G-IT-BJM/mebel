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
                                <?php 
                                    $data = mysqli_fetch_array(mysqli_query($conn,"SELECT MAX(no_beli) AS no_ FROM tbelibahan"));
                                    $no  = $data['no_'];
                                    
                                    $noUrut = (int) substr($no, 3, 5);
                                    $noUrut++;
                                    
                                    $char = "BB-";
                                    $no = $char . sprintf("%05s", $noUrut);
                                ?>
                                <form action="proses.php" method="post" enctype="multipart/form-data">
                                    <h4 class="header-title">TAMBAH DATA PEMBELIAN BAHAN</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="no_beli" class="col-form-label">No. Pembelian</label>
                                                <input class="form-control" type="text" id="no_beli" name="no_beli" value="<?= $no ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Nama Bahan</label>
                                                <select class="custom-select" id="nm_bahan" name="nm_bahan" required>
                                                    <option selected disabled>Pilih Bahan . . .</option>
                                                    <?php 
                                                        $sql = mysqli_query($conn, "SELECT * FROM mbahan");

                                                        while($data = mysqli_fetch_array($sql)) {
                                                    ?>
                                                            <option value="<?= $data["kd_bahan"] ?>"><?= $data["nm_bahan"] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="tgl_beli" class="col-form-label">Tanggal Beli</label>
                                                <input class="form-control" type="date" value="<?= date("Y-m-d"); ?>" id="tgl_beli" name="tgl_beli" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="harga_beli" class="col-form-label">Harga Beli</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" style="background-color: #007BFF; color: white;">Rp.</div>
                                                    </div>
                                                    <input class="form-control" type="text" id="harga_beli" name="harga_beli" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="jml_beli" class="col-form-label">Jumlah Beli (Qty)</label>
                                                <input class="form-control angka" type="text" id="jml_beli" name="jml_beli" min="1" value="1" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="total" class="col-form-label">Total</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" style="background-color: #007BFF; color: white;">Rp.</div>
                                                    </div>
                                                    <input class="form-control" type="text" id="total" name="total" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="header-title">
                                        <a href="pembelian-bahan.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                                    
                                        <button type="submit" class="btn btn-success" id="simpan_beli_bahan" name="simpan_beli_bahan">SIMPAN <span class="fa fa-check-square-o"></span></button>
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

    <script>
        $(document).ready(function(){
            $("#jml_beli").keyup(function(){
                total = $("#jml_beli").val()* $("#harga_beli").val();
                $("#total").val(total);
            });
            
            $("#harga_beli").keyup(function(){
                total = $("#jml_beli").val()* $("#harga_beli").val();
                $("#total").val(total);
            });
        });
    </script>

    <!-- Include jquery.js and jquery.mask.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            // Format mata uang.
            $( '.uang' ).mask('0.000.000.000', {reverse: true});

            // Format nomor HP.
            $( '.no_hp' ).mask('0000−0000−0000');
            
            //angka
            $( '.angka' ).mask('0');

            // Format tahun pelajaran.
            $( '.tapel' ).mask('0000/0000');
        });
    </script>
</body>

</html>

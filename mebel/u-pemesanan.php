<?php 
    include "koneksi.php"; 

    $id = $_GET['nopesan'];
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tpemesanan WHERE no_pesanan = '$id'"));
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
                                    <h4 class="header-title">UBAH DATA PEMESANAN</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="no_pesan" class="col-form-label">No. Pemesanan</label>
                                                <input class="form-control" type="text" id="no_pesan" name="no_pesan" value="<?= $data["no_pesanan"] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="jenis" class="col-form-label">Jenis</label>
                                                <input class="form-control" type="text" id="jenis" name="jenis" value="<?= $data["jenis"] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="jumlah" class="col-form-label">Jumlah Pemesanan</label>
                                                <input class="form-control" type="number" id="jumlah" name="jumlah" min="1" value="<?= $data["jpesanan"] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Nama Pelanggan</label>
                                                <select class="custom-select" id="nm_pel" name="nm_pel" required>
                                                    <?php $join = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mpelanggan WHERE id_pelanggan = '$data[id_pelanggan]'")); ?>
                                                    <option value="<?= $join["id_pelanggan"] ?>" selected><?= $join["nama_p"] ?></option>
                                                    <option disabled>Pilih Pelanggan . . .</option>
                                                    <?php 
                                                        $sql1 = mysqli_query($conn, "SELECT * FROM mpelanggan ORDER BY id_pelanggan DESC");

                                                        while($data1 = mysqli_fetch_array($sql1)) {
                                                    ?>
                                                            <option value="<?= $data1["id_pelanggan"] ?>"><?= $data1["nama_p"] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="nm_barang" class="col-form-label">Nama Barang</label>
                                                <input class="form-control" type="text" id="nm_barang" name="nm_barang" value="<?= $data["namabarang"] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="tgl_beli" class="col-form-label">Tanggal Beli</label>
                                                <input class="form-control" type="date" value="<?= $data["tanggal"] ?>" id="tgl_beli" name="tgl_beli" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="ukuran" class="col-form-label">Jenis Perhitungan (Ukuran) / m</label>
                                                <input class="form-control" type="text" id="ukuran" name="ukuran" value="<?= $data["jhitung"] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="header-title">
                                        <a href="pemesanan.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                                    
                                        <button type="submit" class="btn btn-success" id="ubah_pemesanan" name="ubah_pemesanan">SIMPAN <span class="fa fa-check-square-o"></span></button>
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

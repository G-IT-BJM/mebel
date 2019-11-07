<?php 
    include "koneksi.php";

    // $id  = $_GET["id_pelanggan"];
    // $tgl = $_GET["tanggal"];

    // $sql = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tkirim WHERE id_pelanggan = '$id' AND tanggal = '$tgl' "));
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cetak Laporan Pengiriman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-area">
                            <div class="">
                                <div class="row">
                                    <div class="col-2">
                                        <h3>LOGO</h3>
                                    </div>
                                    <div class="col-8 text-center">
                                        <h3>MEBEL CV. SUMBER BAHAGIA</h3>
                                        <h6>Jalan Negara Jihi Bambulung, Kabupaten Barito Timur</h3>
                                        <h6>Telepon : 082150060049</h6>
                                    </div>
                                </div>
                            </div>
                            <hr style="height:1px; color:black; background-color:black;">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="invoice-address">
                                        <h5>Tanda Terima Barang</h5>
                                        <hr>
                                        <table class="table">
                                            <tr>
                                                <td style="width:30%;"><p>Nama Pelanggan</p></td>
                                                <td>:</td>
                                                <td><h5>MIKO ANDRIANTO</h5></td>
                                            </tr>
                                            <tr>
                                                <td><p>Telepon</p></td>
                                                <td>:</td>
                                                <td><h5>081339674916</h5></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <ul class="invoice-date">
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-right">
                                           <tr>
                                               <td>

                                               </td>
                                               <td>

                                               </td>
                                           </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-2 pull-right">
                                <h6 class="text-center">Tanda Tangan</h6>
                                <br><br>
                                <hr style="color:black; background-color:black;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- <script>window.print()</script> -->
</body>

</html>
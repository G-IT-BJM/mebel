<?php 
    include "koneksi.php";

    $bulan  = $_POST["bulan"];
    $tahun  = $_POST["tahun"];

    $sql    = mysqli_query($conn, "SELECT * FROM tpemesanan WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun' ");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cetak Laporan Pemesanan</title>
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
                                        <div class="logo">
                                            <img src="img/logo.png" alt="logo" style="border-radius:0%;width:60%;">
                                        </div>
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
                                        <h5>Laporan Pemesanan</h5>
                                        <p><?= date("F", strtotime("2000-$bulan-01"))."/".$tahun ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <ul class="invoice-date">
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="table-responsive mt-5">
                                <table class="table table-bordered text-right">
                                    <thead>
                                        <tr class="text-capitalize">
                                            <th class="text-center" style="width: 5%;">No.</th>
                                            <th class="text-left" style="width: 20%;">Kode Pesanan</th>
                                            <th class="text-left" style="width: 20%;">Pelanggan</th>
                                            <th class="text-left" style="width: 20%;">Nama Barang</th>
                                            <th class="text-left" style="width: 20%;">Tanggal</th>
                                            <th>Jumlah Pesanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            while($data = mysqli_fetch_array($sql)) {
                                        ?>
                                                <tr>
                                                    <td class="text-center"><?= $no ?></td>
                                                    <td class="text-left"><?= $data["no_pesanan"] ?></td>
                                                    <?php $join = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mpelanggan WHERE id_pelanggan = '$data[id_pelanggan]'")) ?>
                                                    <td class="text-left"><?= $join["nama_p"] ?></td>
                                                    <td class="text-left"><?= $data["namabarang"] ?></td>
                                                    <td class="text-left"><?= date("d-m-Y", strtotime($data["tanggal"])) ?></td>
                                                    <td><?= $data["jpesanan"] ?></td>
                                                </tr>
                                        <?php
                                                $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
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
    <script>window.print()</script>
</body>

</html>
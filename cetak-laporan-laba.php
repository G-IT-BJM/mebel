<?php 
    include "koneksi.php";

    $bulan  = $_POST["bulan"];
    $tahun  = $_POST["tahun"];

    $sql    = mysqli_query($conn, "SELECT *, a.jumlah, b.jumlah AS j_t_rusak, SUM(a.harga_jual) AS h_jual, SUM(a.total_untung) AS t_untung, SUM(b.total_rusak) AS t_rusak FROM tproduksi AS a LEFT JOIN trusak AS b ON a.no_produksi = b.no_produksi WHERE month(a.tanggalprod) = '$bulan' AND year(a.tanggalprod) = '$tahun' ");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cetak Laporan Laba & Rugi</title>
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
                                        <h5>Laporan Laba & Rugi</h5>
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
                                            <th class="text-center" style="width: 5%; vertical-align : middle;text-align:center;" rowspan="2">No.</th>
                                            <th class="text-left" style="width: 15%; vertical-align : middle;text-align:center;" rowspan="2">Bulan</th>
                                            <th class="text-left" style="width: 15%; vertical-align : middle;text-align:center;" rowspan="2">Tahun</th>
                                            <th class="text-center" colspan="2">Laba</th>
                                            <th rowspan="2" style="vertical-align : middle;text-align:center;">Laba Rugi</th>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align : middle;text-align:center;">Kotor</th>
                                            <th style="vertical-align : middle;text-align:center;">Bersih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            while($data = mysqli_fetch_array($sql)) {
                                                // $sql2    = mysqli_fetch_array(mysqli_query($conn, "SELECT *,SUM(total_rusak) AS t_rusak FROM trusak WHERE no_produksi = '$data[no_produksi]' "));
                                                $t_jual     = $data["h_jual"];
                                                $t_untung   = $data["t_untung"];
                                                $t_rusak    = $data["t_rusak"];
                                        ?>
                                                <tr>
                                                    <td class="text-center"><?= $no ?></td>
                                                    <td class="text-left"><?= date("F", strtotime("2000-$bulan-01")) ?></td>
                                                    <td class="text-left"><?= $tahun ?></td>
                                                    <td><?= number_format($t_jual,0) ?></td>
                                                    <td><?= number_format($t_untung,0) ?></td>
                                                    <td><?= number_format($t_rusak,0) ?></td>
                                                </tr>
                                        <?php
                                                $no++;
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
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
    <!-- <script>window.print()</script> -->
</body>

</html>
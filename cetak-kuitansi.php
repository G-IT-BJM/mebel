<?php 
    include "koneksi.php";

    $id     = $_GET["kode_pemesanan"];
    $sql    = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tpemesanan WHERE no_pesanan = '$id'"));
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cetak Kuitansi</title>
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
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-lg-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-area">
                            <div class="">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="logo">
                                            <img src="img/logo.png" alt="logo" style="border-radius:0%;width:100%;">
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
                                        <h5>Kuitansi</h5>
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
                                               <td style="width: 70%">
                                                    <table>
                                                        <tr>
                                                            <td style="width: 30%" class="text-left">Tanggal</td>
                                                            <td style="width: 5%">:</td>
                                                            <td class="text-left"><?= date("d F Y", strtotime($sql["tanggal"])) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 30%" class="text-left">Kode Pemesanan</td>
                                                            <td style="width: 5%">:</td>
                                                            <td class="text-left"><?= $sql["no_pesanan"] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 30%" class="text-left">Nama Pelanggan</td>
                                                            <td style="width: 5%">:</td>
                                                            <?php 
                                                                $joinn = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mpelanggan WHERE id_pelanggan = '".$sql["id_pelanggan"]."'"))
                                                            ?>
                                                            <td class="text-left"><?= $joinn["nama_p"] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 30%" class="text-left">Jumlah Pesanan</td>
                                                            <td style="width: 5%">:</td>
                                                            <td class="text-left"><?= $sql["jpesanan"] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 30%" class="text-left">Nama Barang</td>
                                                            <td style="width: 5%">:</td>
                                                            <td class="text-justify">
                                                                <?= $sql["namabarang"] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 30%" class="text-left">Ukuran (Cm)</td>
                                                            <td style="width: 5%">:</td>
                                                            <td class="text-left"><?= $sql["jhitung"] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 30%" class="text-left">Keterangan</td>
                                                            <td style="width: 5%">:</td>
                                                            <td class="text-left"><?= $sql["ket"] ?></td>
                                                        </tr>
                                                    </table>
                                               </td>
                                               <td>
                                                    <h6 class="text-center">CATATAN : </h6>
                                                    <br>
                                                    <p class="text-justify">Sebagai Bukti bahwa Anda melakukan Pemesanan. Simpan dan Bawa kembali jika
                                                    mendatangi Kami Mebel CV. Sumber Bahagia.</p>
                                               </td>
                                           </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-3 pull-right">
                                <h6 class="text-center">Hormat Kami</h6>
                                <br><br>
                                <hr style="color:black; background-color:black;">
                            </div>
                            <div class="col-3 pull-right">
                                <h6 class="text-center">Tanda Terima</h6>
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
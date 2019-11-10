<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

        <div class="main-content">
        <?php include "header-turunan.php"; ?>
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20">
                                    <?php $q = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS JUMLAH FROM tpemesanan WHERE (no_pesanan) NOT IN (SELECT no_pesanan FROM tproduksi GROUP BY tproduksi.no_pesanan)")) ?>
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

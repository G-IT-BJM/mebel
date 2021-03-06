<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<!-- main content area start -->
<div class="main-content">
    <?php include "header-turunan.php"; ?>
    <div class="main-content-inner">
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">
                            <h4>LAPORAN PENGAMBILAN UPAH TUKANG</h4>
                            <hr>
                        </div>
                        <form class="form-horizontal" action="cetak-laporan-upah-tukang.php" target="_BLANK" method="post" enctype="multipart/form-data">
                        <div class="header-title">
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="bulan" class="col-form-label">Tukang</label>
                                        <select class="custom-select" name="tukang">
                                            <option selected="selected">Pilih . . .</option>
                                            <?php 

                                            $q = mysqli_query($conn,"SELECT * FROM mtukang");
                                            while ($r = mysqli_fetch_array($q)) {
                                            ?>
                                                <option value="<?php echo $r['id_tukang'] ?>"><?php echo $r['id_tukang']; ?> - <?php echo $r['nama']; ?></option>
                                            <?php
                                            }

                                             ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="bulan" class="col-form-label">Bulan</label>
                                        <select class="custom-select" name="bulan">
                                            <option selected="selected">Pilih . . .</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="bulan" class="col-form-label">Tahun</label>
                                        <select class="custom-select" name="tahun">
                                            <option selected="selected">Pilih . . .</option>
                                            <?php
                                                $now=date('Y');
                                                for ($a = $now; $a >= 2018; $a--) {
                                                     echo "<option value='$a'>$a</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>                                
                                <div class="col-sm-3 pull-right">
                                    <div class="form-group">
                                        <label for="bulan" class="col-form-label">.</label>
                                        <a href=""><button class="btn btn-primary form-control" type="submit">Cetak <span class="fa fa-print"></span></button></a>
                                    </div>
                                </div>
                            </div>
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
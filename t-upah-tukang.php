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
                        <?php 
                            $data = mysqli_fetch_array(mysqli_query($conn,"SELECT MAX(no_upah) AS no_ FROM tupah"));
                            $no  = $data['no_'];
                            
                            $noUrut = (int) substr($no, 3, 5);
                            $noUrut++;
                            
                            $char = "UP-";
                            $no = $char . sprintf("%05s", $noUrut);
                        ?>
                        <form action="proses.php" method="post" enctype="multipart/form-data">
                            <h4 class="header-title">TAMBAH DATA UPAH TUKANG</h4>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="kd_upah" class="col-form-label">Kode Upah</label>
                                        <input class="form-control" type="text" id="kd_upah" name="kd_upah" value="<?= $no ?>" required readonly>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tgl" class="col-form-label">Tanggal</label>
                                        <input class="form-control" type="date" value="<?= date("Y-m-d"); ?>" id="tgl" name="tgl" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Nama Tukang</label>
                                        <select class="custom-select" id="kd_tukang" name="kd_tukang" onchange="cek_()" required>
                                            <option value="">Pilih . . .</option>
                                            <?php 
                                                $sql1 = mysqli_query($conn, "SELECT * FROM mtukang WHERE id_tukang IN (SELECT id_tukang FROM tproduksi)");

                                                while($data1 = mysqli_fetch_array($sql1)) {
                                            ?>
                                                    <option value="<?= $data1["id_tukang"] ?>"><?= $data1["nama"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="saldo" class="col-form-label">Saldo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" style="background-color: #007BFF; color: white;">Rp.</div>
                                            </div>
                                            <input class="form-control" type="text" id="saldo" name="saldo" required readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Kode Produksi</label>
                                        <select class="custom-select" id="kd_produksi" name="kd_produksi" required>
                                            <option value="">Pilih . . .</option>
                                            <?php 
                                                //$sql2 = mysqli_query($conn, "SELECT * FROM tproduksi AS a INNER JOIN mtukang AS b ON a.id_tukang = b.id_tukang");

                                                //while($data2 = mysqli_fetch_array($sql2)) {
                                            ?>
                                                    <option class="<?php //echo $data2["id_tukang"] ?>" value="<?php //echo $data2["no_produksi"] ?>"><?php //echo $data2["no_produksi"] ?></option>
                                            <?php
                                                //}
                                            ?>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-4"></div>
                                <div class="col-2"></div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="peng_upah" class="col-form-label">Jumlah Pengambilan Upah</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" style="background-color: #007BFF; color: white;">Rp.</div>
                                            </div>
                                            <input class="form-control uang" type="text" id="peng_upah" name="peng_upah" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="header-title">
                                <a href="upah-tukang.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                            
                                <button type="submit" class="btn btn-success" id="simpan_peng_upah" name="simpan_peng_upah">SIMPAN <span class="fa fa-check-square-o"></span></button>
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
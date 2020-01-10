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
                                        <label for="no_beli" class="col-form-label">Kode Pembelian</label>
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
                                        <input class="form-control" type="date" max='<?php echo date('Y-m-d')?>' value="<?= date("Y-m-d"); ?>" id="tgl_beli" name="tgl_beli" required>
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
                                            <input class="form-control uang" type="text" id="harga_beli" name="harga_beli" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="jml_beli" class="col-form-label">Jumlah Beli (Qty)</label>
                                        <input class="form-control angka" type="text" id="jml_beli" name="jml_beli" min="1" value="1" required>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="jml_beli" class="col-form-label">Satuan</label>
                                        <select class="custom-select" id="satuan" name="satuan" required>
                                            <option value="">Pilih Bahan . . .</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Batang">Batang</option>
                                            <option value="Kaleng">Kaleng</option>
                                            <option value="Bungkus">Bungkus</option>
                                            <option value="Lembar">Lembar</option>
                                            <option value="Buah">Buah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="total" class="col-form-label">Total</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" style="background-color: #007BFF; color: white;">Rp.</div>
                                            </div>
                                            <input class="form-control uang" type="text" id="total" name="total" required readonly>
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
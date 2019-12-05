<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php 
    $id = $_GET['nopbahan'];
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tbelibahan WHERE no_beli = '$id'"));
?>
        
<!-- main content area start -->
<div class="main-content">
    <?php include "header-turunan.php"; ?>
    <div class="main-content-inner">
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="proses.php" method="post" enctype="multipart/form-data">
                            <h4 class="header-title">UBAH DATA PEMBELIAN BAHAN</h4>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="no_beli" class="col-form-label">Kode Pembelian</label>
                                        <input class="form-control" type="text" id="no_beli" name="no_beli" value="<?= $data["no_beli"] ?>" required readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Nama Bahan</label>
                                        <select class="custom-select" id="nm_bahan" name="nm_bahan" required>
                                            <?php 
                                                $join = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mbahan WHERE kd_bahan = '$data[no_bahan]'"));
                                            ?>
                                            <option value="<?= $join["kd_bahan"] ?>" selected><?= $join["nm_bahan"] ?></option>
                                            <option disabled>Pilih Bahan . . .</option>
                                            <?php 
                                                $sql1 = mysqli_query($conn, "SELECT * FROM mbahan");

                                                while($data1 = mysqli_fetch_array($sql1)) {
                                            ?>
                                                    <option value="<?= $data1["kd_bahan"] ?>"><?= $data1["nm_bahan"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tgl_beli" class="col-form-label">Tanggal Beli</label>
                                        <input class="form-control" type="date" id="tgl_beli" name="tgl_beli" value="<?= $data["tgl_beli"] ?>" required>
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
                                            <input class="form-control uang" type="text" id="harga_beli" name="harga_beli" value="<?= $data["hbeli"] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="jml_beli" class="col-form-label">Jumlah Beli (Qty)</label>
                                        <input class="form-control angka" type="text" id="jml_beli" name="jml_beli" min="1" value="<?= $data["jumbeli"] ?>" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="total" class="col-form-label">Total</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" style="background-color: #007BFF; color: white;">Rp.</div>
                                            </div>
                                            <input class="form-control uang" type="text" id="total" name="total" value="<?= $data["total"] ?>" required readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="header-title">
                                <a href="pembelian-bahan.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                            
                                <button type="submit" class="btn btn-success" id="ubah_beli_bahan" name="ubah_beli_bahan">SIMPAN <span class="fa fa-check-square-o"></span></button>
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
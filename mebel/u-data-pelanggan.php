<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php 
    $id = $_GET['idpelanggan'];
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mpelanggan WHERE id_pelanggan = '$id'"));
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
                            <h4 class="header-title">UBAH DATA PELANGGAN</h4>
                            <hr>
                            <div class="form-group">
                                <label for="kd_pel" class="col-form-label">Kode Pelanggan</label>
                                <input class="form-control" type="text" id="kd_pel" name="kd_pel" value="<?= $data["id_pelanggan"] ?>" required readonly style="width: 30%;">
                            
                                <label for="nm_pel" class="col-form-label">Nama</label>
                                <input class="form-control" type="text" id="nm_pel" name="nm_pel" value="<?= $data["nama_p"] ?>" required>
                            
                                <label for="telp" class="col-form-label">Telp.</label>
                                <input class="form-control" type="text" id="telp" name="telp" value="<?= $data["telp_p"] ?>" maxlength="12" required style="width: 50%;">
                            
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" cols="5" rows="5" required><?= $data["alamat_p"] ?></textarea>
                            </div>
                            <hr>
                            <div class="header-title">
                                <a href="m-pelanggan.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                            
                                <button type="submit" class="btn btn-success" id="ubah_pel" name="ubah_pel">SIMPAN <span class="fa fa-check-square-o"></span></button>
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
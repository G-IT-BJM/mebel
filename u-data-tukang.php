<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php 
    $id = $_GET['idtukang'];
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mtukang WHERE id_tukang = '$id'"));
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
                            <h4 class="header-title">UBAH DATA TUKANG</h4>
                            <hr>
                            <div class="form-group">
                                <label for="kd_tukang" class="col-form-label">Kode Tukang</label>
                                <input class="form-control" type="text" id="kd_tukang" name="kd_tukang" value="<?= $data["id_tukang"] ?>" required readonly style="width: 30%;">
                            
                                <label for="nm_tukang" class="col-form-label">Nama</label>
                                <input class="form-control" type="text" id="nm_tukang" name="nm_tukang" value="<?= $data["nama"] ?>" required>
                            
                                <label for="telp" class="col-form-label">Telp.</label>
                                <input class="form-control nohp" type="text" id="telp" name="telp" value="<?= $data["telp"] ?>" maxlength="12" required style="width: 50%;">
                            
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" cols="5" rows="5" required><?= $data["alamat"] ?></textarea>
                            </div>
                            <hr>
                            <div class="header-title">
                                <a href="m-tukang.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                            
                                <button type="submit" class="btn btn-success" id="ubah_tukang" name="ubah_tukang">SIMPAN <span class="fa fa-check-square-o"></span></button>
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
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
                            $data = mysqli_fetch_array(mysqli_query($conn,"SELECT MAX(id_pelanggan) AS no_ FROM mpelanggan"));
                            $no  = $data['no_'];
                            
                            $noUrut = (int) substr($no, 3, 5);
                            $noUrut++;
                            
                            $char = "PL-";
                            $no = $char . sprintf("%05s", $noUrut);
                        ?>
                        <form action="proses.php" method="post" enctype="multipart/form-data">
                            <h4 class="header-title">TAMBAH DATA PELANGGAN</h4>
                            <hr>
                            <div class="form-group">
                                <label for="kd_pel" class="col-form-label">Kode Pelanggan</label>
                                <input class="form-control" type="text" id="kd_pel" name="kd_pel" value="<?= $no ?>" required readonly style="width: 30%;">
                            
                                <label for="nm_pel" class="col-form-label">Nama Pelanggan</label>
                                <input class="form-control" type="text" id="nm_pel" name="nm_pel" required>
                            
                                <label for="telp" class="col-form-label">Telp.</label>
                                <input class="form-control nohp" type="text" id="telp" name="telp" maxlength="12" required style="width: 50%;">
                            
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" cols="5" rows="5" required></textarea>
                            </div>
                            <hr>
                            <div class="header-title">
                                <a href="m-pelanggan.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                            
                                <button type="submit" class="btn btn-success" id="simpan_pel" name="simpan_pel">SIMPAN <span class="fa fa-check-square-o"></span></button>
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
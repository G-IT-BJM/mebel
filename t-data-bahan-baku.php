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
                            $data = mysqli_fetch_array(mysqli_query($conn,"SELECT MAX(kd_bahan) AS no_ FROM mbahan"));
                            $no  = $data['no_'];
                            
                            $noUrut = (int) substr($no, 3, 5);
                            $noUrut++;
                            
                            $char = "BN-";
                            $no = $char . sprintf("%05s", $noUrut);
                        ?>
                        <form action="proses.php" method="post" enctype="multipart/form-data">
                            <h4 class="header-title">TAMBAH DATA BAHAN BAKU</h4>
                            <hr>
                            <div class="form-group">
                                <label for="kd_bb" class="col-form-label">Kode Bahan Baku</label>
                                <input class="form-control" type="text" id="kd_bb" name="kd_bb" value="<?= $no ?>" required readonly style="width: 30%;">
                            
                                <label for="nm_bb" class="col-form-label">Nama</label>
                                <input class="form-control" type="text" id="nm_bb" name="nm_bb" required>
                            </div>
                            <hr>
                            <div class="header-title">
                                <a href="m-bahan-baku.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                            
                                <button type="submit" class="btn btn-success" id="simpan_bb" name="simpan_bb">SIMPAN <span class="fa fa-check-square-o"></span></button>
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
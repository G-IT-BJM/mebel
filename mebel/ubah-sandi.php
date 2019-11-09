<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<!-- main content area start -->
<div class="main-content">
    <?php include "header-turunan.php"; ?>
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-body">
                        <h4 class="header-title">UBAH KATA SANDI</h4>
                        <hr>
                        <form class="needs-validation" novalidate="" action="proses.php" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="pswd">Password Lama</label>
                                    <input type="hidden" class="form-control" id="nama" name="nama" value="<?= $_SESSION['user'] ?>">
                                    <input type="password" class="form-control" id="pswd" name="pswd" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="pswd_1">Password Baru</label>
                                    <input type="password" class="form-control" id="pswd_1" name="pswd_1" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="pswd_2">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="pswd_2" name="pswd_2" required="">
                                </div>
                            </div>
                            <hr>
                            <div class="header-title">
                                <a href="beranda.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>

                                <button type="submit" class="btn btn-success" id="ubah_sandi" name="ubah_sandi">SIMPAN <span class="fa fa-check-square-o"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main content area end -->
<!-- footer area start-->
<?php include "footer.php"; ?>
<!-- footer area end-->
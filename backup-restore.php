<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "proses-backup-restore.php" ?>
        
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
                                    
                        </div>                        
                        <div class="col-lg-12">

                        <?php
                            if (isset($_POST['restore'])) {
                                $nama_file=$_FILES['datafile']['name'];
                                $ukuran=$_FILES['datafile']['size'];
                                $uploaddir='restore/';
                                $alamatfile=$uploaddir.$nama_file;
                                if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile)) {
                                    echo restore($conn,$nama_file);
                                }
                            }          
                                                  
                            if (isset($_POST['backup'])) {
                                $filename = 'backup-'.date('ymdhis');
                                $path = 'backup';
                                echo backup($conn,$filename,$path);
                            }
                        ?>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">CADANGKAN DATABASE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">KEMBALIKAN DATABASE</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <div class="alert alert-success" role="alert">
                                                Klik tombol di bawah ini untuk melakukan pencadangan database.
                                            </div>
                                            <div class="text-left">
                                                <input type="submit" value="CADANGKAN DATABASE" name="backup" class="btn btn-lg btn-success">
                                            </div>
                                        </div>
                                    </form>                                    
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <form enctype="multipart/form-data" method="post" class="form-horizontal">
                                        <div class="form-group">
                                            <div class="alert alert-info" role="alert">
                                                Upload Database yang telah anda cadangkan sebelumnya.
                                            </div>
                                            <input class="form-control" type="file" name="datafile" id="datafile" accept=".sql" required>
                                        </div>
                                        <input type="submit" value="KEMBALIKAN DATABASE" name="restore" class="btn btn-lg btn-info">
                                    </form>                                    
                                </div>
                            </div>
                        </div>
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
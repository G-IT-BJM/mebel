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
                            <h4>MASTER TUKANG</h4>
                            <hr>
                        </div>
                        <div class="header-title">
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <a href="t-data-tukang.php"><button class="btn btn-primary">Tambah Data <span class="fa fa-user-plus"></span></button></a>
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3 pull-right">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="background-color: #007BFF; color: white;"><span class="fa fa-search"></span></div>
                                        </div>
                                        <input type="text" class="form-control" id="cari" name="cari" placeholder="Cari . . .">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Aksi</th>
                                            <th scope="col">Kode Tukang</th>
                                            <th scope="col">Nama Tukang</th>
                                            <th scope="col">Telp.</th>
                                            <th scope="col">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php 
                                            $no = 1;
                                            $sql = mysqli_query($conn, "SELECT * FROM mtukang");

                                            while($data = mysqli_fetch_array($sql)) {
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <ul class="d-flex justify-content">
                                                        <li class="mr-3"><a href="u-data-tukang.php?idtukang=<?= $data['id_tukang'] ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                        <li><a href="proses.php?hapus=datatukang&idtukang=<?=$data['id_tukang'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td><?= $data["id_tukang"] ?></td>
                                                <td><?= $data["nama"] ?></td>
                                                <td><?= $data["telp"] ?></td>
                                                <td><?= $data["alamat"] ?></td>
                                            </tr>
                                        <?php
                                                $no++;    
                                            }
                                        ?>
                                    </tbody>
                                </table>
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
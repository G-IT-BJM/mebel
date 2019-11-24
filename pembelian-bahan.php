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
                            <h4>PEMBELIAN BAHAN</h4>
                            <hr>
                        </div>
                        <div class="header-title">
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <a href="t-pembelian-bahan.php"><button class="btn btn-primary">Tambah Data <span class="fa fa-cart-plus"></span></button></a>
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
                                            <th scope="col">No. Pembelian</th>
                                            <th scope="col">Tanggal Beli</th>
                                            <th scope="col">Nama Bahan</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah Beli (Qty)</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php 
                                            $no = 1;
                                            $sql = mysqli_query($conn, "SELECT * FROM tbelibahan ORDER BY tgl_beli DESC");

                                            while($data = mysqli_fetch_array($sql)) {
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <ul class="d-flex justify-content">
                                                        <li class="mr-3"><a href="u-pembelian-bahan.php?nopbahan=<?= $data['no_beli'] ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                        <li><a href="proses.php?hapus=datapbahan&nopbahan=<?= $data['no_beli'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td><?= $data["no_beli"] ?></td>
                                                <td><?= date("d-m-Y", strtotime($data["tgl_beli"])) ?></td>
                                                <?php $join = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mbahan WHERE kd_bahan = '$data[no_bahan]'")); ?>
                                                <td><?= $join["nm_bahan"] ?></td>
                                                <td class="uang"><?= $data["hbeli"] ?></td>
                                                <td><?php if ($join["nm_bahan"] == 'Paku') { echo $data["jumbeli"]/10 . " Kg"; } else { echo $data["jumbeli"]; } ?></td>
                                                <td class="uang"><?= $data["total"] ?></td>
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
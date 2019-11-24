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
                            <h4>PEMESANAN</h4>
                            <hr>
                        </div>
                        <div class="header-title">
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <a href="t-pemesanan.php"><button class="btn btn-primary">Tambah Data <span class="fa fa-cart-plus"></span></button></a>
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
                                            <th scope="col">Kode Pemesanan</th>
                                            <th scope="col">Nama Pelanggan</th>
                                            <th scope="col">Tanggal Beli</th>
                                            <th scope="col">Ukuran</th>
                                            <th scope="col">Jumlah Pemesanan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php 
                                            $no = 1;
                                            $sql = mysqli_query($conn, "SELECT * FROM tpemesanan ORDER BY tanggal DESC");

                                            while($data = mysqli_fetch_array($sql)) {
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <ul class="d-flex justify-content">
                                                        <li class="mr-3"><a href="cetak-kuitansi.php?kode_pemesanan=<?=$data["no_pesanan"]?>" style="color:black;" target="_BLANK"><span class="fa fa-print" style="color:red;"></span></a> </li>
                                                        <li class="mr-3"><a href="u-pemesanan.php?nopesan=<?= $data['no_pesanan'] ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                        <li><a href="proses.php?hapus=datapemesanan&nopesan=<?= $data['no_pesanan'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td><?= $data["no_pesanan"] ?></td>
                                                <?php $join = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mpelanggan WHERE id_pelanggan = '$data[id_pelanggan]'")); ?>
                                                <td><?= $join["nama_p"] ?></td>
                                                <td><?= date("d-m-Y", strtotime($data["tanggal"])) ?></td>
                                                <td><?= $data["jhitung"] ?></td>
                                                <td><?= $data["jpesanan"] ?></td>
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
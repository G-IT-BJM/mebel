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
                            <h4>KERUSAKAN</h4>
                            <hr>
                        </div>
                        <div class="header-title">
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <a href="t-rusak.php"><button class="btn btn-primary">Tambah Data <span class="fa fa-cart-plus"></span></button></a>
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3 pull-right">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="background-color: #007BFF; color: white;"><span class="fa fa-search"></span></div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Cari . . .">
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
                                            <th scope="col">No. Kerusakan</th>
                                            <th scope="col">No. Produksi</th>
                                            <th scope="col">Tangal</th>
                                            <th scope="col">Jenis Kerusakan</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total Rusak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql = mysqli_query($conn, "SELECT * FROM trusak ORDER BY tgl_data DESC");

                                            while($data = mysqli_fetch_array($sql)) {
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <ul class="d-flex justify-content">
                                                        <li class="mr-3"><a href="u-rusak.php?no_kerusakan=<?=$data['no_kerusakan']?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                        <li><a href="proses_kerusakan.php?hapusRusak=<?=$data['no_kerusakan']?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td><?= $data["no_kerusakan"] ?></td>                                                
                                                <td><?= $data["no_produksi"] ?></td>
                                                <td><?= date("d-m-Y", strtotime($data["tgl_data"])) ?></td>
                                                <td><?php if ($data["jenis_rusak"] == 1) { echo 'Rusak Berat'; } elseif ($data["jenis_rusak"] == 0.5) { echo 'Rusak Sedang'; } else { echo 'Rusak Ringan'; }?></td>
                                                <td><?= $data["jumlah"] ?></td>
                                                <td><?= number_format($data["total_rusak"],0) ?></td>
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
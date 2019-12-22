<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

        <div class="main-content">
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="breadcrumbs-area clearfix">
                            <h5 class="page-title pull-left">CV. SUMBER BAHAGIA</h5>
                        </div>
                    </div>
                    <div class="col-sm-4 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">&nbsp;&nbsp; Admin <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Progress Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-title">
                                    <h4>PRODUKSI</h4>
                                    <hr>
                                </div>
                                <div class="header-title">
                                    <div class="form-row">
                                        <div class="col-sm-3">
                                            <a href="t-produksi.php"><button class="btn btn-primary">Tambah Data <span class="fa fa-cart-plus"></span></button></a>
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
                                                    <th scope="col">Kode Produksi</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Kode Pemesanan</th>
                                                    <th scope="col">Nama Tukang</th>
                                                    <th scope="col">Tanggal Produksi</th>
                                                    <th scope="col">Harga Jual</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <?php 
                                                    $no = 1;
                                                    $sql = mysqli_query($conn, "SELECT j.no_produksi, (SELECT nama_p FROM mpelanggan WHERE mpelanggan.id_pelanggan =( SELECT id_pelanggan FROM tpemesanan WHERE tpemesanan.no_pesanan = j.no_pesanan)) as nama_p, concat(j.no_pesanan,' - ',(SELECT nama_barang from tdetail_pemesanan b WHERE b.id=j.id_detail_pesanan)) no_pesanan, j.tanggalprod, j.harga_jual, (SELECT GROUP_CONCAT((SELECT nama FROM mtukang WHERE mtukang.id_tukang = tdetail_tukang.id_tukang) SEPARATOR ', ') FROM tdetail_tukang WHERE tdetail_tukang.no_pesanan = j.id_detail_pesanan GROUP by no_pesanan) as nama FROM tproduksi j ORDER BY j.tanggalprod ASC");

                                                    while($data = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td>
                                                            <ul class="d-flex justify-content">
                                                                <li class="mr-3"><a href="u-produksi.php?no_produksi=<?= $data['no_produksi'] ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                                <li><a href="proses_produksi.php?hapusProduksi=<?= $data['no_produksi'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="text-danger"><i class="ti-trash"></i></a></li>
                                                            </ul>
                                                        </td>
                                                        <td><?= $data["no_produksi"] ?></td>
                                                        <td><?= $data["nama_p"] ?></td>
                                                        <td><?= $data["no_pesanan"] ?></td>                                                        
                                                        <td><?= $data["nama"] ?></td>
                                                        <td><?= date("d-m-Y", strtotime($data["tanggalprod"])) ?></td>
                                                        <td><?= number_format($data["harga_jual"],0) ?></td>                                                        
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

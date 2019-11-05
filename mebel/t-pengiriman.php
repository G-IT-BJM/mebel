<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php 
    $disabled = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(no_pesanan) AS count1 FROM tpemesanan WHERE no_pesanan NOT IN(SELECT no_pesanan FROM tkirim)"));
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
                        <?php 
                            $data = mysqli_fetch_array(mysqli_query($conn,"SELECT MAX(no_kirim) AS no_ FROM tkirim"));
                            $no  = $data['no_'];
                            
                            $noUrut = (int) substr($no, 3, 5);
                            $noUrut++;
                            
                            $char = "KR-";
                            $no = $char . sprintf("%05s", $noUrut);
                        ?>
                        <form action="proses.php" method="post" enctype="multipart/form-data">
                            <h4 class="header-title">TAMBAH DATA PENGIRIMAN</h4>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="kd_kirim" class="col-form-label">Kode Pengiriman</label>
                                        <input class="form-control" type="text" id="kd_kirim" name="kd_kirim" value="<?= $no ?>" required readonly>
                                    </div>
                                </div>
                                <div class="col-3"></div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tgl" class="col-form-label">Tanggal</label>
                                        <input class="form-control" type="date" value="<?= date("Y-m-d"); ?>" id="tgl" name="tgl" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="no_pesan" class="col-form-label">No. Pemesanan</label>
                                        <select class="custom-select" id="no_pesan" name="no_pesan" onchange="datakirim_()" required <?= ($disabled["count1"] > 0) ? '' : 'disabled' ?>>
                                            <option value="">Pilih . . .</option>
                                            <?php 
                                                $sql1 = mysqli_query($conn, "SELECT * FROM tpemesanan AS a INNER JOIN mpelanggan AS b ON a.id_pelanggan=b.id_pelanggan WHERE no_pesanan IN (SELECT no_pesanan FROM tproduksi) AND no_pesanan NOT IN (SELECT no_pesanan FROM tkirim)");

                                                while($data1 = mysqli_fetch_array($sql1)) {                                                    
                                            ?>
                                                    <option value="<?= $data1["no_pesanan"] ?>"><?= "[".$data1["no_pesanan"]."] ".$data1["nama_p"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <input type="hidden" id="id_pel" name="id_pel">
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tujuan" class="col-form-label">Tujuan</label>
                                        <textarea class="form-control" name="tujuan" id="tujuan" cols="5" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="nm_brg" class="col-form-label">Nama Barang</label>
                                        <input class="form-control" type="text" id="nm_brg" name="nm_brg" required readonly>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="biaya" class="col-form-label">Biaya Kirim</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" style="background-color: #007BFF; color: white;">Rp.</div>
                                            </div>
                                            <input class="form-control uang" type="text" id="biaya" name="biaya" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="jumlah" class="col-form-label">Jumlah Barang</label>
                                        <input class="form-control" type="text" id="jumlah" name="jumlah" required readonly>
                                    </div>
                                </div>
                                <div class="col-4"></div>
                                <div class="col-6">
                                    <hr>
                                    <div class="header-title">
                                        <a href="pengiriman.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                                    
                                        <button type="submit" class="btn btn-success" id="simpan_pengiriman" name="simpan_pengiriman" <?= ($disabled["count1"] > 0) ? '' : 'disabled' ?>>SIMPAN <span class="fa fa-check-square-o"></span></button>
                                    </div> 
                                </div>
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
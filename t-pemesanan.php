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
                            $data = mysqli_fetch_array(mysqli_query($conn,"SELECT MAX(no_pesanan) AS no_ FROM tpemesanan"));
                            $no  = $data['no_'];
                            
                            $noUrut = (int) substr($no, 3, 5);
                            $noUrut++;
                            
                            $char = "PS-";
                            $no = $char . sprintf("%05s", $noUrut);
                        ?>
                        <form action="proses.php" method="post" enctype="multipart/form-data">
                            <h4 class="header-title">TAMBAH DATA PEMESANAN</h4>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="no_pesan" class="col-form-label">Kode Pemesanan</label>
                                        <input class="form-control" type="text" id="no_pesan" name="no_pesan" value="<?= $no ?>" required readonly>
                                    </div>
                                </div>
                                <!-- <div class="col-4">
                                    <div class="form-group"> -->
                                        <!-- <label for="jenis" class="col-form-label">Jenis</label> -->
                                        <input class="form-control" type="hidden" id="jenis" name="jenis" value="Kayu">
                                    <!-- </div> -->
                                <!-- </div> -->
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="jumlah" class="col-form-label">Jumlah Pemesanan</label>
                                        <input class="form-control" type="number" id="jumlah" name="jumlah" min="1" value="1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Nama Pelanggan</label>
                                        <select class="custom-select" id="nm_pel" name="nm_pel" required>
                                            <option selected disabled>Pilih Pelanggan . . .</option>
                                            <?php 
                                                $sql = mysqli_query($conn, "SELECT * FROM mpelanggan ORDER BY id_pelanggan DESC");

                                                while($data = mysqli_fetch_array($sql)) {
                                            ?>
                                                    <option value="<?= $data["id_pelanggan"] ?>"><?= $data["nama_p"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="nm_barang" class="col-form-label">Nama Barang</label>
                                        <input class="form-control" type="text" id="nm_barang" name="nm_barang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tgl_beli" class="col-form-label">Tanggal Beli</label>
                                        <input class="form-control" type="date" value="<?= date("Y-m-d"); ?>" id="tgl_beli" name="tgl_beli" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="ukuran" class="col-form-label">Jenis Perhitungan (Ukuran) / m</label>
                                        <input class="form-control" type="text" id="ukuran" name="ukuran" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-8">
                                    <div class="form-group">
                                        <label for="keterangan" class="col-form-label">Keterangan</label>
                                        <textarea name="ket" id="ket" rows="2" class="form-control" required></textarea>                                        
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="header-title">
                                <a href="pemesanan.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                            
                                <button type="submit" class="btn btn-success" id="simpan_pemesanan" name="simpan_pemesanan">SIMPAN <span class="fa fa-check-square-o"></span></button>
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
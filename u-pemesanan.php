<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php 
    $id = $_GET['nopesan'];
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tpemesanan WHERE no_pesanan = '$id'"));
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
                        <form action="proses.php" method="post" enctype="multipart/form-data">
                            <h4 class="header-title">UBAH DATA PEMESANAN</h4>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="no_pesan" class="col-form-label">No. Pemesanan</label>
                                        <input class="form-control" type="text" id="no_pesan" name="no_pesan" value="<?= $data["no_pesanan"] ?>" required readonly>
                                    </div>
                                </div>
                                <!-- <div class="col-4">
                                    <div class="form-group">
                                        <label for="jenis" class="col-form-label">Jenis</label> -->
                                        <input class="form-control" type="hidden" id="jenis" name="jenis" value="<?= $data["jenis"] ?>" required>
                                    <!-- </div>
                                </div> -->
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="jumlah" class="col-form-label">Jumlah Pemesanan</label>
                                        <input class="form-control" type="number" id="jumlah" name="jumlah" min="1" value="<?= $data["jpesanan"] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Nama Pelanggan</label>
                                        <select class="custom-select" id="nm_pel" name="nm_pel" required>
                                            <?php $join = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mpelanggan WHERE id_pelanggan = '$data[id_pelanggan]'")); ?>
                                            <option value="<?= $join["id_pelanggan"] ?>" selected><?= $join["nama_p"] ?></option>
                                            <option disabled>Pilih Pelanggan . . .</option>
                                            <?php 
                                                $sql1 = mysqli_query($conn, "SELECT * FROM mpelanggan ORDER BY id_pelanggan DESC");

                                                while($data1 = mysqli_fetch_array($sql1)) {
                                            ?>
                                                    <option value="<?= $data1["id_pelanggan"] ?>"><?= $data1["nama_p"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="nm_barang" class="col-form-label">Nama Barang</label>
                                        <input class="form-control" type="text" id="nm_barang" name="nm_barang" value="<?= $data["namabarang"] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tgl_beli" class="col-form-label">Tanggal Beli</label>
                                        <input class="form-control" type="date" value="<?= $data["tanggal"] ?>" id="tgl_beli" name="tgl_beli" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="ukuran" class="col-form-label">Ukuran(P + L + T) / Cm</label>
                                        <input class="form-control" type="text" id="ukuran" name="ukuran" value="<?= $data["jhitung"] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-8">
                                    <div class="form-group">
                                        <label for="ket" class="col-form-label">Keterangan</label>
                                        <textarea name="ket" id="ket" rows="2" class="form-control" required><?= $data["ket"] ?></textarea>                                        
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="header-title">
                                <a href="pemesanan.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>
                            
                                <button type="submit" class="btn btn-success" id="ubah_pemesanan" name="ubah_pemesanan">SIMPAN <span class="fa fa-check-square-o"></span></button>
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
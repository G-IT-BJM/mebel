<?php 
ob_start();
include "header.php";
include "sidebar.php";
include 'proses_pemesanan.php';

$no = @$_GET['nopesan'];

$r = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tpemesanan WHERE no_pesanan = '$no'"));

$tgl_beli = @$r['tanggal'];
$id_pelanggan = @$r['id_pelanggan'];

 ?>

<style>
    .hidden {
        display:none;
    }
    .readonly { 
        pointer-events: none;  
        background:#f2f2f2;
    } 
</style>

<!-- main content area start -->
<div class="main-content">
    <?php include "header-turunan.php"; ?>
    <div class="main-content-inner">
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">                        
                        <form id="headerForm" action="" method="get" method="post" enctype="multipart/form-data">
                            <h4 class="header-title">UBAH DATA PEMESANAN</h4>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="no_pesan" class="col-form-label">Kode Pemesanan</label>
                                        <input class="form-control" type="text" id="no_pesan" name="no_pesan" value="<?= $no ?>" required readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Nama Pelanggan</label>
                                        <select class="custom-select readonly" id="id_pelanggan" name="id_pelanggan" required>
                                            <option selected disabled>Pilih Pelanggan . . .</option>
                                            <?php 
                                                $sql = mysqli_query($conn, "SELECT * FROM mpelanggan ORDER BY id_pelanggan DESC");
                                                while($data = mysqli_fetch_array($sql)) {
                                            ?>
                                                    <option value="<?= $data["id_pelanggan"] ?>" <?php echo $data['id_pelanggan'] == $id_pelanggan ? 'selected' : '' ?>>[<?= $data["id_pelanggan"] ?>] <?= $data["nama_p"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tgl_beli" class="col-form-label">Tanggal Beli</label>
                                        <input class="form-control readonly" type="date" value="<?= $tgl_beli; ?>" id="tgl_beli" name="tgl_beli" required>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <hr>
                        <form id="detailForm" method="POST">
                            <h4 class="header-title">DATA KERANJANG PESANAN</h4>
                            <input type="hidden" name="h_no_pemesanan" id="h_no_pemesanan" value="<?=$no?>">
                            <div class="row">                                
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="nm_barang" class="col-form-label">Nama Barang</label>
                                        <input class="form-control" type="text" id="nm_barang" name="nm_barang" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="ukuran" class="col-form-label">Ukuran(P x L x T) / Cm</label>
                                        <input class="form-control" type="text" id="ukuran" name="ukuran" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="ukuran" class="col-form-label">Jumlah</label>
                                        <input class="form-control" type="number" id="jumlah" name="jumlah" required>
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
                                <div class="col-2">
                                    <div style="padding-top:36px;" class="form-group">                                                
                                        <button type="submit" <?=($id_pelanggan == '') ? 'disabled' : '' ?> class="btn btn-sm btn-success" id="tambah_detail" name="tambah_detail">Tambah <span class="fa fa-check-square-o"></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                            <hr>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Aksi</th>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Ukuran</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 

                                        $query = mysqli_query($conn,"SELECT * FROM tdetail_pemesanan WHERE no_pesanan = '$no'");
                                        $count = mysqli_num_rows($query);
                                        if ($count > 0) {
                                            $n = 1;
                                            while ($data = mysqli_fetch_array($query)) {
                                        ?>

                                        <tr>
                                            <td><?php echo $n; ?></td>
                                            <td>
                                                <ul class="d-flex justify-content">                                                                
                                                    <li><span onclick="hapusDetail('<?=$data['id']?>');" class="text-danger"><i class="ti-trash"></i></span></li>
                                                </ul>
                                            </td>
                                            <td><?php echo $data['nama_barang']; ?></td>
                                            <td><?php echo $data['ukuran']; ?></td>
                                            <td><?php echo $data['jumlah']; ?></td>
                                            <td><?php echo $data['ket']; ?></td>
                                        </tr>

                                        <?php 
                                            $n++; 
                                            } 
                                        } else {?>
                                            <tr>
                                                <td align="center" colspan="6">Belum ada data</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>                                                    
                        <div class="header-title">
                            <?php $s = mysqli_num_rows(mysqli_query($conn,"select * from tdetail_pemesanan where no_pesanan = '$no'")); ?>
                            <button type="submit" class="btn btn-primary" <?=($id_pelanggan == '' OR $s < 0 ) ? 'disabled' : '' ?> id="simpan_pemesanan" name="simpan_pemesanan">SIMPAN PEMESANAN<span class="fa fa-check-square-o"></span></button>
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
<script> 
    $("#headerForm .form-control, #headerForm .custom-select").click(function() {
        var id = this.id;            

        $('#headerForm .form-control, #headerForm .custom-select').on('change', function(e) {
            $("#headerForm").submit();
        });
    });

    $("#headerForm .custom-select").change(function() {
        var id = this.id;            
        $("#headerForm").submit();            
    });

    function hapusDetail(id) {
        var konfirmasi = confirm("ingin menghapus data ini?");
        var value = id;
        if (konfirmasi) {
            $.ajax({ 
                type: 'POST', 
                url: 'proses_pemesanan.php', 
                data: { hapusData: value }, 
                success: function (data) { 
                    location.reload();
                }
            });
        }            
    }

    $("#simpan_pemesanan").click(function() {

        var confrim = confirm("Ingin menyimpan pemesanan?");                

        if (confrim) {
            var datax = 'simpan_pemesanan=true&'+$("#headerForm").serialize();            
            $.ajax({ 
                type: 'POST', 
                url: 'proses_pemesanan.php', 
                data: datax, 
                success: function (data) {                     
                    location.href = 'pemesanan.php';
                }
            });
        // }     
        }
    }); 

</script>
<?php ob_end_flush(); ?>
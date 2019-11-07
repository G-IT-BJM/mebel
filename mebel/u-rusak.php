<?php 

include "header.php";

?>

<style>
    .hidden {
        display:none;
    }
</style>

<?php

include "sidebar.php";

error_reporting(0);

$u = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM trusak WHERE no_kerusakan = '".$_GET['no_kerusakan']."'"));

$q = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tproduksi JOIN tpemesanan WHERE tproduksi.no_pesanan = tpemesanan.no_pesanan AND no_produksi = '".$u['no_produksi']."'"));

$tgl_rusak  = @$u['tgl_data'];
$no_pesanan = @$_GET['no_pesanan'] == '' ? @$q['no_pesanan'] : $_GET['no_pesanan'];
$no_produksi = @$_GET['no_produksi'] == '' ? @$q['no_pesanan'] : $_GET['no_pesanan'];
$jumlah_rusak = @$_GET['jumlah_rusak'] == '' ? @$u['jumlah'] : @$_GET['jumlah_rusak'];
$jenis_rusak = @$_GET['jenis_rusak'] == '' ? @$u['jenis_rusak'] : @$_GET['jenis_rusak'];

$total_rusak = round($jumlah_rusak * $jenis_rusak * (@$q['harga_jual']/$q['jumlah']));
$namabarang = @$q['namabarang'];
$jumlah = @$q['jumlah'] == '' ? 0 : @$q['jumlah'];

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
                        <form id="rusakForm" enctype="multipart/form-data">
                            <h4 class="header-title">UBAH DATA KERUSAKAN</h4>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="no_pesan" class="col-form-label">No. Kerusakan</label>
                                        <input class="form-control" type="text" id="no_kerusakan" name="no_kerusakan" value="<?= $u['no_kerusakan'] ?>" required readonly>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="tgl_rusak" class="col-form-label">Tanggal Rusak</label>
                                        <input class="form-control" type="text" id="tgl_rusak" name="tgl_rusak" value="<?=$tgl_rusak?>" readonly>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="col-form-label">No. Pesanan</label>
                                        <input class="form-control" type="text" id="no_pesanan" name="no_pesanan" value="<?= $q['no_pesanan'] ?>" required readonly>
                                        <!-- <select class="custom-select" id="no_pesanan" name="no_pesanan" required>
                                            <option value="">Pilih No. Pesanan . . .</option>
                                            <?php 
                                                $sql = mysqli_query($conn, "SELECT no_pesanan FROM tproduksi WHERE (no_pesanan, no_produksi) NOT IN (SELECT no_pesanan, no_produksi FROM trusak GROUP BY tproduksi.no_pesanan) GROUP BY no_pesanan");

                                                while($data = mysqli_fetch_array($sql)) {
                                            ?>
                                                    <option value="<?= $data["no_pesanan"] ?>" <?=$no_pesanan == $data["no_pesanan"] ? 'selected' : '' ?>><?= $data["no_pesanan"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select> -->
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="col-form-label">No. Produksi</label>
                                        <input class="form-control" type="text" id="no_produksi" name="no_produksi" value="<?= $u['no_produksi'] ?>" required readonly>
                                        <!-- <select class="custom-select" id="no_produksi" name="no_produksi" required>
                                            <option value="">Pilih No. Produksi . . .</option>
                                            <?php 
                                                $sql = mysqli_query($conn, "SELECT no_produksi FROM tproduksi WHERE (no_produksi) NOT IN (SELECT no_produksi FROM trusak) AND no_pesanan = '$no_pesanan'");

                                                while($data = mysqli_fetch_array($sql)) {
                                            ?>
                                                    <option value="<?= $data["no_produksi"] ?>" <?=$no_produksi == $data["no_produksi"] ? 'selected' : '' ?>><?= $data["no_produksi"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select> -->
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">                                
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Nama Barang</label>
                                        <input class="form-control" type="text" id="nm_barang" name="nm_barang" required value="<?=$namabarang?>" readonly>
                                    </div>
                                </div>             
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Jumlah Produksi</label>
                                        <input class="form-control" type="number" value="<?=$jumlah?>" id="jumlah_produksi" name="jumlah_produksi" required readonly>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Jumlah Kerusakan</label>
                                        <input class="form-control" type="number" value="<?=$jumlah_rusak?>" id="jumlah_rusak" name="jumlah_rusak" required>
                                        <p id="warning" class="hidden" style="font-size:12px;color:red;">Jumlah tidak sesuai</p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Jenis Kerusakan</label>
                                        <select class="custom-select" id="jenis_rusak" name="jenis_rusak" required>
                                            <option value="">Pilih Jenis Kerusakan . . .</option>
                                            <option <?= $jenis_rusak == '1' ? 'selected' : '' ?> value="1">Berat</option>
                                            <option <?= $jenis_rusak == '0.50' ? 'selected' : '' ?> value="0.50">Sedang</option>
                                            <option <?= $jenis_rusak == '0.25' ? 'selected' : '' ?> value="0.25">Ringan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Total Kerusakan</label>
                                        <input class="form-control" type="text" id="total_rusak" name="total_rusak" readonly required value="<?=$total_rusak?>">
                                    </div>
                                </div>
                            </div>
                        </form>
                            <hr>
                            <div class="header-title">
                                <a href="rusak.php"><button type="button" class="btn btn-danger">BATAL <span class="fa fa-close"></span></button></a>                            
                                <button type="submit" <?= ($no_pesanan == '' || $no_produksi == '' || $jumlah_rusak == '' || $jenis_rusak == '') ? 'disabled' : '' ?> class="btn btn-success" id="ubah_kerusakan" name="ubah_kerusakan">SIMPAN <span class="fa fa-check-square-o"></span></button>
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

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>

<?php include "footer.php"; ?>
<!-- footer area end-->

<script>
    $("#rusakForm .form-control, #rusakForm .custom-select").click(function() {
        var id = this.id;            
        $('#rusakForm .form-control, #rusakForm .custom-select').on('change', function(e) {
            $("#rusakForm").submit();
        });
    });
    $("#rusakForm .custom-select").change(function() {
        var id = this.id;            
        $("#rusakForm").submit();            
    });

    $("#jumlah_rusak").change(function() {            
        $("#rusakForm").submit();            
    });

    $("#no_produksi").change(function() {
        $("#nm_barang").val('');
        $("#jumlah_produksi").val('');
        $("#jumlah_rusak").val('');
        $("#jenis_rusak").val('');
        $("#total_rusak").val('');
        $("#rusakForm").submit();        
    });

    $("#no_pesanan").change(function() {
        $("#no_produksi").val('');
        $("#nm_barang").val('');
        $("#jumlah_produksi").val('');
        $("#jumlah_rusak").val('');
        $("#jenis_rusak").val('');
        $("#total_rusak").val('');
        $("#rusakForm").submit();        
    });

    $(document).on('keyup', 'input[name=jumlah_rusak]', function () {
            var _this = $(this);
            var min = parseInt(_this.attr('min')) || 1;
            var max = parseInt(_this.attr('max')) || <?=$jumlah == '' ? 0 : $jumlah;?>;
            var val = parseInt(_this.val()) || (min - 1);
            if(val < min)
                _this.val( min );
            if(val > max)
                _this.val( max );
    });
    $(document).on('change', 'input[name=jumlah_rusak]', function () {
            var _this = $(this);
            var min = parseInt(_this.attr('min')) || 1;
            var max = parseInt(_this.attr('max')) || <?=$jumlah == '' ? 0 : $jumlah;?>;
            var val = parseInt(_this.val()) || (min - 1);
            if(val < min)
                _this.val( min );
            if(val > max)
                _this.val( max );
    });    

    $("#ubah_kerusakan").click(function() {
            
        var jumlah = $("#jumlah_rusak").val();
        if (jumlah > <?=$jumlah?>) {
            $('#warning').removeClass('hidden');
            $('#jumlah_rusak').focus;
        } else {
            var datax = 'ubah_kerusakan=true&'+$("#rusakForm").serialize();
            // alert(datax);
            $.ajax({ 
                type: 'POST', 
                url: 'proses_kerusakan.php',
                data: datax, 
                success: function (data) {                     
                    location.href = 'rusak.php';
                }
            });
        }     
    });

</script>
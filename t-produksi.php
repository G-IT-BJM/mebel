<?php 
session_start();
include "koneksi.php";
include "proses_produksi.php";

$no_pesanan = @$_GET['no_pesanan'];

$q = mysqli_query($conn,"SELECT ket,no_pesanan,jhitung, namabarang,(jpesanan - IFNULL((select sum(jumlah) from tproduksi where tproduksi.no_pesanan = tpemesanan.no_pesanan GROUP by no_pesanan), 0)) as jumlah FROM tpemesanan WHERE (no_pesanan, jpesanan) NOT IN (SELECT no_pesanan, sum(jumlah) FROM tproduksi GROUP BY tproduksi.no_pesanan) AND tpemesanan.no_pesanan = '$no_pesanan'");
$r = mysqli_fetch_array($q);

$jumlah_pesanan = @$r['jumlah'] == '' ? 0 : $r['jumlah'];
$nama_barang = @$r['namabarang'];
$jumlah = @$_GET['jumlah_pemesanan'];
$id_tukang = @$_GET['id_tukang'];
$ukuran = @$r['jhitung'];
$ket = @$r['ket'];

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CV. Sumber Bahagia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        .hidden {
            display:none;
        }
        .readonly { 
            pointer-events: none;  
            background:#f2f2f2;
        } 
    </style>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- Sidebar -->
        <?php include "sidebar.php"; ?>
        <!-- end sidebar -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- page title area start -->
            <?php include 'header-turunan.php'; ?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Progress Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <?php 
                                    $data = mysqli_fetch_array(mysqli_query($conn,"SELECT MAX(no_produksi) AS no_ FROM tproduksi"));
                                    $no  = $data['no_'];
                                    
                                    $noUrut = (int) substr($no, 4, 5);
                                    $noUrut++;
                                    
                                    $char = "PRD-";
                                    $no_trans = $char . sprintf("%05s", $noUrut);
                                ?>
                                <form id="headerForm" action="" method="get" enctype="multipart/form-data">
                                    <h4 class="header-title">TAMBAH DATA PRODUKSI</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="no_pesan" class="col-form-label">Kode Produksi</label>
                                                <input class="form-control" type="text" id="no_produksi" name="no_produksi" value="<?= $no_trans ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Kode Pemesanan</label>
                                                <select class="custom-select" id="no_pesanan" name="no_pesanan" required>
                                                    <option value="">Pilih No Pemesanan . . .</option>
                                                    <?php 
                                                        $sql = mysqli_query($conn, "SELECT no_pesanan, (select nama_p from mpelanggan where mpelanggan.id_pelanggan = tpemesanan.id_pelanggan) as nm_pelanggan, (jpesanan - IFNULL((select sum(jumlah) from tproduksi where tproduksi.no_pesanan = tpemesanan.no_pesanan GROUP by no_pesanan), 0)) as jumlah FROM tpemesanan WHERE (no_pesanan, jpesanan) NOT IN (SELECT no_pesanan, sum(jumlah) FROM tproduksi GROUP BY tproduksi.no_pesanan)");

                                                        while($data = mysqli_fetch_array($sql)) {
                                                    ?>
                                                            <option value="<?= $data["no_pesanan"] ?>" <?=$no_pesanan == $data["no_pesanan"] ? 'selected' : '' ?>><?= $data["no_pesanan"]." - ".$data["nm_pelanggan"] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="jumlah" class="col-form-label">Jumlah Pemesanan</label>
                                                <input class="form-control" type="number" id="jumlah_pemesanan" name="jumlah_pemesanan" value='<?=$jumlah_pesanan?>' required readonly>
                                            </div>
                                        </div>
                                        <!-- <div class="col-2">
                                            <div class="form-group">
                                                <label for="jumlah" class="col-form-label">Jumlah</label>
                                                <input class="form-control" type="number" id="jumlah" name="jumlah" value="<?=$jumlah?>" required>
                                                <p id="warning" class="hidden" style="font-size:12px;color:red;">Jumlah tidak sesuai</p>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="nm_barang" class="col-form-label">Tanggal Produksi</label>
                                                <input class="form-control" type="text" id="tanggalprod" name="tanggalprod" required readonly value="<?php echo date('Y-m-d') ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="nm_barang" class="col-form-label">Nama Barang</label>
                                                <input class="form-control" type="text" id="nama_barang" name="nama_barang" required readonly value="<?=$nama_barang ?>">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="nm_barang" class="col-form-label">Ukuran</label>
                                                <input class="form-control" type="text" id="ukuran" name="ukuran" required readonly value="<?=$ukuran ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Nama Tukang</label>
                                                <select class="custom-select" id="id_tukang" name="id_tukang" required>
                                                    <option value="">Pilih Tukang . . .</option>
                                                    <?php 
                                                        $sql = mysqli_query($conn, "SELECT * FROM mtukang ORDER BY id_tukang DESC");

                                                        while($data = mysqli_fetch_array($sql)) {
                                                    ?>
                                                            <option value="<?= $data["id_tukang"] ?>" <?=$id_tukang == $data["id_tukang"] ? 'selected' : '' ?>><?= $data["nama"] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>                                        
                                    </div> 
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label class="col-form-label">Keterangan</label>
                                                <textarea name="ket" id="ket" rows="2" class="form-control" disabled><?=$ket?></textarea>
                                            </div>
                                        </div> 
                                    </div>                                   
                                </form>
                                <hr>
                                <form id="detailForm" method="POST">
                                    <h4 class="header-title">TAMBAH BAHAN YANG DIPERLUKAN</h4>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="jumlah" class="col-form-label">Bahan Baku</label>
                                                <select class="custom-select" id="kd_bahan" name="kd_bahan" required <?=($no_pesanan == '' OR $id_tukang == '') ? 'disabled' : '' ?>>
                                                    <option value="">Pilih Bahan Baku . . .</option>
                                                    <?php 
                                                        $sql = mysqli_query($conn, "SELECT no_bahan, (select mbahan.nm_bahan FROM mbahan WHERE tbelibahan.no_bahan = mbahan.kd_bahan) nm_bahan, (sum(jumbeli) - IFNULL((SELECT sum(jumlah) FROM tdetail_produksi WHERE tdetail_produksi.kd_bahan = tbelibahan.no_bahan GROUP BY tdetail_produksi.kd_bahan),0)) stok FROM tbelibahan GROUP BY no_bahan");

                                                        while($data = mysqli_fetch_array($sql)) {
                                                    ?>
                                                            <option value="<?= $data["no_bahan"] ?>"><?= $data["nm_bahan"] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="jumlah" class="col-form-label">Stok</label>
                                                <input class="form-control" type="number" id="stok" name="stok" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="jumlah" class="col-form-label">Jumlah</label>
                                                <input class="form-control" type="number" id="jumlah_pakai" name="jumlah_pakai" min="1" value="" required <?=($no_pesanan == '' OR $id_tukang == '') ? 'disabled' : '' ?>>                                                
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="jumlah" class="col-form-label">Total Jumlah</label>
                                                <input class="form-control" type="number" id="total_jumlah_pakai" name="total_jumlah_pakai" min="1" readonly required <?=($no_pesanan == '' OR $id_tukang == '') ? 'disabled' : '' ?>>
                                                <p id="warning" class="hidden" style="font-size:11px;color:red;">Jumlah tidak sesuai</p>
                                                <input type="hidden" name="harga" id="harga">
                                                <input type="hidden" name="h_no_produksi" id="h_no_produksi" value="<?=$no_trans ?>">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div style="padding-top:36px;" class="form-group">                                                
                                                <button type="submit" class="btn btn-sm btn-success" id="tambah_detail" name="tambah_detail" <?=($no_pesanan == '' OR $id_tukang == '') ? 'disabled' : '' ?>>Tambah <span class="fa fa-check-square-o"></span></button>
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
                                                    <th scope="col">Nama Bahan Baku</th>
                                                    <th scope="col">Harga Satuan</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Subtotal</th>                                                                                                                                                           
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no = 1;     
                                                    
                                                    $total[] = '';

                                                    $sql = mysqli_query($conn, "SELECT * FROM tdetail_produksi JOIN mbahan WHERE tdetail_produksi.kd_bahan = mbahan.kd_bahan AND tdetail_produksi.no_produksi = '$no_trans'");

                                                    while($data = mysqli_fetch_array($sql)) {                                                        

                                                        $total[$data['id']] = $data["jumlah"] * $data["harga_satuan"];
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td>
                                                            <ul class="d-flex justify-content">                                                                
                                                                <li><span onclick="hapusDetail('<?=$data['id']?>');" class="text-danger"><i class="ti-trash"></i></span></li>
                                                            </ul>
                                                        </td>
                                                        <td><?= $data["nm_bahan"] ?></td>
                                                        <td><?= number_format($data["harga_satuan"],0) ?></td>
                                                        <td><?= $data["jumlah"] ?></td>
                                                        <td><?= number_format($data["jumlah"] * $data["harga_satuan"],0) ?></td>
                                                    </tr>
                                                <?php
                                                        $no++;
                                                    }
                                                ?>                                                    
                                            </tbody>
                                            <?php 

                                            $qq = mysqli_num_rows(mysqli_query($conn,"select * from tdetail_produksi inner join mbahan on tdetail_produksi.kd_bahan = mbahan.kd_bahan WHERE tdetail_produksi.no_produksi = '$no_trans' AND mbahan.nm_bahan like '%Ulin%'"));
                                            $ee = mysqli_num_rows(mysqli_query($conn,"select * from tdetail_produksi inner join mbahan on tdetail_produksi.kd_bahan = mbahan.kd_bahan WHERE tdetail_produksi.no_produksi = '$no_trans' AND mbahan.nm_bahan like '%Kayu%'"));
                                            
                                            if ($qq >= 1 && $ee >= 1) {
                                                $upah = 10000;
                                            } elseif ($qq <= 0 && $ee >= 1) {
                                                $upah = 5000;
                                            } else {
                                                $upah = 0;
                                            }

                                            $u = explode('x',$ukuran);
                                            $ukurannya = (@$u['0']/100) * (@$u['1']/100);
                                            $upah_tukang = $ukurannya * $upah * $jumlah;

                                            ?>
                                            <form id="hargaForm">
                                                <tfoot class="text-uppercase">
                                                    <tr>
                                                        <th colspan="2"></th>
                                                        <th>Upah Tukang</th>
                                                        <th><?=number_format($upah_tukang,0);?><input type="hidden" name="upah_tukang" value="<?=$upah_tukang;?>"></th>
                                                        <th>Total</th>
                                                        <th><?=number_format(array_sum($total),0)?></th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"></th>
                                                        <th>Total Untung</th>
                                                        <th><?=number_format($upah_tukang,0);?></th>
                                                        <th>Total Jual</th>
                                                        <th><?=number_format(($upah_tukang + array_sum($total) + $upah_tukang),0);?><input type="hidden" name="total_jual" value="<?=($upah_tukang + array_sum($total) + $upah_tukang);?>"></th>
                                                    </tr>                                                
                                                </tfoot>
                                            </form>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <?php $s = mysqli_num_rows(mysqli_query($conn,"select * from tdetail_produksi inner join mbahan on tdetail_produksi.kd_bahan = mbahan.kd_bahan WHERE tdetail_produksi.no_produksi = '$no_trans'")); ?>
                                <button type="submit" class="btn btn-sm btn-primary" id="simpan_produksi" name="simpan_produksi" <?=($s < 1 OR $no_pesanan == '' OR $id_tukang == '')  ? 'disabled' : '' ?>>Simpan Produksi <span class="fa fa-check-square-o"></span></button>
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

        $("#jumlah").change(function() {            
            $("#headerForm").submit();            
        });

        $("#kd_bahan").change(function() {
            $("#jumlah_pakai").val('');
            $("#total_jumlah_pakai").val('');
            var value = $("#kd_bahan").val();
            $.ajax({ 
                type: 'GET', 
                url: 'ajax-stok.php', 
                data: { kd_bahan: value }, 
                success: function (data) {                     
                    if (data['stok'] <= 0) {
                        alert('Stok Sedang Kosong!');
                        $("#stok").val('');
                        $("#total_jumlah_pakai").val('');
                        $('#jumlah_pakai').prop('disabled', true);
                        $('#tambah_detail').prop('disabled', true);
                    } else {
                        $("#stok").val(data['stok']);                        
                        $("#harga").val(data['harga']);
                        $('#jumlah_pakai').prop('disabled', false);
                        $('#total_jumlah_pakai').attr('max', data['stok']);
                        $('#tambah_detail').prop('disabled', false);
                    }
                }
            });     
        });        

        function hapusDetail(id) {
            var konfirmasi = confirm("ingin menghapus data ini?");
            var value = id;
            if (konfirmasi) {
                $.ajax({ 
                    type: 'POST', 
                    url: 'proses_produksi.php', 
                    data: { hapusData: value }, 
                    success: function (data) { 
                        location.reload();
                    }
                });
            }            
        }

        $('#jumlah_pakai').keyup(function(){
            var jumlah_pakai = $('#jumlah_pakai').val() == '' ? 0 : $('#jumlah_pakai').val();
            var stok = $('#stok').val();
            var jumlah_pemesanan = $('#jumlah_pemesanan').val();
            var total_jumlah = jumlah_pakai * jumlah_pemesanan;
            if (total_jumlah <= stok) {
                $('#total_jumlah_pakai').val(total_jumlah);
                $('#warning').addClass('hidden');
                $('#tambah_detail').removeAttr('disabled');
            } else {
                $('#total_jumlah_pakai').val(total_jumlah);
                $('#warning').removeClass('hidden');
                $('#jumlah').focus;
                $('#tambah_detail').attr('disabled','disabled');
            }
            
        })

        // $(document).on('keyup', 'input[name=jumlah]', function () {
        //     var _this = $(this);
        //     var min = parseInt(_this.attr('min')) || 1;
        //     var max = parseInt(_this.attr('max')) || <?=$jumlah_pesanan ?>;
        //     var val = parseInt(_this.val()) || (min - 1);
        //     if(val < min)
        //         _this.val( min );
        //     if(val > max)
        //         _this.val( max );
        // });

        $("#simpan_produksi").click(function() {

            var confrim = confirm("Ingin menyimpan produksi?");
            
            if (confrim) {
                // var jumlah = $("#jumlah").val();

            // if (jumlah > <?=$jumlah_pesanan?>) {
            //     $('#warning').removeClass('hidden');
            //     $('#jumlah').focus;
            // } else {
                var datax = 'simpan_produksi=true&'+$("#hargaForm").serialize()+'&'+$("#headerForm").serialize();            
                $.ajax({ 
                    type: 'POST', 
                    url: 'proses_produksi.php', 
                    data: datax, 
                    success: function (data) {                     
                        location.href = 'produksi.php';
                    }
                });
            // }     
            }
        }); 

    </script>

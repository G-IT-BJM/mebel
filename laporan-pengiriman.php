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
                            <h4>LAPORAN PENGIRIMAN</h4>
                            <hr>
                        </div>
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="header-title">
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="bulan" class="col-form-label">Bulan</label>
                                        <select class="custom-select" name="bulan" id="bulan">
                                            <option selected="selected">Pilih . . .</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="bulan" class="col-form-label">Tahun</label>
                                        <select class="custom-select" name="tahun" id="tahun">
                                            <option selected="selected">Pilih . . .</option>
                                            <?php
                                                $now=date('Y');
                                                for ($a = $now; $a >= 2018; $a--) {
                                                     echo "<option value='$a'>$a</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3 pull-right">
                                    <div class="form-group">
                                        <label for="bulan" class="col-form-label">.</label>
                                        <button class="btn btn-primary form-control" type="button" name="lihat_data_reg" id="lihat_data_reg">Lihat <span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>


                        <div class="table-responsive">
                            <table class="table table-bordered text-right" >
                                <thead>
                                    <tr class="text-capitalize">
                                        <th class="text-center" style="width: 5%;">No.</th>
                                        <th class="text-left" style="width: 10%;">Aksi</th>
                                        <th class="text-left" style="width: 10%;">Tanggal</th>
                                        <th class="text-left" style="width: 20%;">Pelanggan</th>
                                        <th class="text-left" style="width: 30%;">Tujuan</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable11">

                                </tbody>
                            </table> 
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
<script>
    $(function() {
        $("#lihat_data_reg").on('click',function(){
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            $.ajax({
                url: 'proses.php',
                type: 'POST',
                data: {
                    'bulan': bulan,
                    'tahun': tahun
                },
                success: function (data) {
                    // $('#myTable11').html("");
                    $('#myTable11').html(data);
                    // $('#btn').removeAttr('disabled');
                }
            });
        });
    });
</script>
<!-- footer area end-->
<?php
include 'koneksi.php';
include 'menu.php';
?>
 <div class="row row-bg">
             <div class="col-sm-6 col-md-3"> 
             <div class="statbox widget box box-shadow">
              <div class="widget-content"> 
              <div class="visual cyan">  
              <div class="statbox-sparkline">30,20,15,30,22,25,26,30,27</div>
              </div> 
              <div class="title">Pesanan Baru</div> 
              <div class="value">2</div> <a class="more" href="javascript:void(0);">Lihat Detail <i class="pull-right icon-angle-right"></i></a> </div> </div> </div> <div class="col-sm-6 col-md-3"> <div class="statbox widget box box-shadow"> <div class="widget-content"> <div class="visual green"> <div class="statbox-sparkline">20,30,30,29,22,15,20,30,32</div> </div> <div class="title">Pesanan Belum Selesai</div> <div class="value">2</div> <a class="more" href="javascript:void(0);">Lihat Detail <i class="pull-right icon-angle-right"></i></a> </div> </div> </div> <div class="col-sm-6 col-md-3 hidden-xs"> <div class="statbox widget box box-shadow"> <div class="widget-content"> <div class="visual yellow"> <i class="icon-dollar"></i> </div> <div class="title">Produksi Belum Selesai</div> <div class="value">2</div> <a class="more" href="javascript:void(0);">Lihat Detail <i class="pull-right icon-angle-right"></i></a> </div> </div> </div> <div class="col-sm-6 col-md-3 hidden-xs"> <div class="statbox widget box box-shadow"> <div class="widget-content"> <div class="visual red"> <i class="icon-user"></i> </div> <div class="title">Pelanggan</div> <div class="value">30</div> <a class="more" href="javascript:void(0);">Lihat Detail <i class="pull-right icon-angle-right"></i></a> </div> </div> </div> </div>
<!-- Modal Laporan Beli -->
<div class="modal fade " id="pembelianbulan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Cetak Pembelian Perbulan</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form action="halaman.php?go=LPBeliBulan" target="_blank" method="POST">
                                              <div class="col-sm-6">
                                                <select name="bulan" class="form-control">
                                                  <option value="">Pilih Bulan</option>
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
                                                  <option value="12">November</option>
                                                  <option value="12">Desember</option>
                                                </select>
                                              </div>
                                              <div class="col-sm-6">
                                                <select name="tahun" class="form-control m-bot15">
                                                <option value="">Pilih Tahun</option>
<?php 
$querybelibulan = "SELECT YEAR(tgl_beli) FROM tbelibahan GROUP BY YEAR(tgl_beli)";
$sqlbelibulan = mysql_query($querybelibulan);
while ($hasil = mysql_fetch_array($sqlbelibulan)) {
  echo "<option value=". $hasil['YEAR(tgl_beli)']. ">". $hasil['YEAR(tgl_beli)']."</option>";
}
?> 
                                                </select>
                                              </div>

                                                <input type="submit" class="btn btn-danger" name="beli_bulan" value="Cetak Laporan">
                                              </form>

                                          </div>
                                      </div>
                                  </div>
                            </div>


<!-- end Modal -->
<!-- Modal Laporan Beli Tahun -->
                          <div class="modal fade " id="pembeliantahun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Cetak Pembelian Pertahun</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form action="halaman.php?go=LPBeliTahun" target="_blank" method="POST">
                                                <select class="form-control m-bot15" name="cetak_laporan">
                                                  <option value="">Pilih Tahun</option>
<?php 
$querybelitahun = "SELECT YEAR(tgl_beli) FROM tbelibahan GROUP BY YEAR(tgl_beli)";
$sqlbelitahun = mysql_query($querybelitahun);
while ($hasil = mysql_fetch_array($sqlbelitahun)) {
  echo "<option value=". $hasil['YEAR(tgl_beli)']. ">". $hasil['YEAR(tgl_beli)']."</option>";
}
?> 
                                                </select>
                                                <input type="submit" class="btn btn-danger" name="beli_tahun" value="Cetak Laporan">
                                              </form>

                                          </div>
                                      </div>
                                  </div>
                            </div>

<!-- End Modal -- >
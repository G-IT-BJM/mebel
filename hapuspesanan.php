<?php
include 'koneksi.php';
$no   = $_GET['no_pesanan']; 
$sql  ="DELETE FROM tpemesanan WHERE no_pesanan ='$no'";
$proses = mysql_query($sql);
if($proses){
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=Pemesanan'>";
}
else {
  echo"<script>alert('Ada kesalahan saat menghapus data')</script>";
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=Pemesanan'>";
}


?>
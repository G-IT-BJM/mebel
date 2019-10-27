<?php
include 'koneksi.php';
$no   = $_GET['kd_bahan']; 
$sql  ="DELETE FROM mbahan WHERE kd_bahan ='$no'";
$proses = mysql_query($sql);
if($proses){
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=BahanBaku'>";
}
else {
  echo"<script>alert('Ada kesalahan saat menghapus data')</script>";
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=BahanBaku'>";
}


?>
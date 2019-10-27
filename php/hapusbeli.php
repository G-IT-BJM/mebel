<?php
include 'koneksi.php';
$no   = $_GET['no_beli']; 
$sql  ="DELETE FROM tbelibahan WHERE no_beli ='$no'";
$proses = mysql_query($sql);
if($proses){
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=Pembelian'>";
}
else {
  echo"<script>alert('Ada kesalahan saat menghapus data')</script>";
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=Pembelian'>";
}


?>
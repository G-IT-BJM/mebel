<?php
include 'koneksi.php';
$no   = $_GET['id_tukang']; 
$sql  ="DELETE FROM mtukang WHERE id_tukang ='$no'";
$proses = mysql_query($sql);
if($proses){
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=Tukang'>";
}
else {
  echo"<script>alert('Ada kesalahan saat menghapus data')</script>";
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=Tukang'>";
}


?>
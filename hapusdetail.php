<?php
include 'koneksi.php';
$no   = $_GET['no_bahan']; 
$sql  ="DELETE FROM tdetailbahan WHERE no_bahan ='$no'";
$proses = mysql_query($sql);
if($proses){
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=DetailBahan'>";
}
else {
  echo"<script>alert('Ada kesalahan saat menghapus data')</script>";
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=DetailBahan'>";
}


?>
<?php
include 'koneksi.php';
$no   = $_GET['id_pelanggan']; 
$sql  ="DELETE FROM mpelanggan WHERE id_pelanggan ='$no'";
$proses = mysql_query($sql);
if($proses){
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=Pelanggan'>";
}
else {
  echo"<script>alert('Ada kesalahan saat menghapus data')</script>";
  echo "<meta http-equiv='refresh' content='0;halaman.php?go=Pelanggan'>";
}


?>
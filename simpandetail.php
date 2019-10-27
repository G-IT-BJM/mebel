<?php
	include "koneksi.php";
	$sql=" select * from tdetailbahan where kd_bahan ='$_POST[select]'";
	$proses=mysql_query($sql);
	$data=mysql_fetch_array($proses);
	$cari=mysql_num_rows($proses);
		if ($cari=='0'){
	$sql2= "INSERT INTO tdetailbahan (no_bahan,kd_bahan,harga_satuan,stok)
	VALUES ('$_POST[kdb]','$_POST[select]','$_POST[harga]','$_POST[stok]')";
	$proses2= mysql_query($sql2);
		if ($proses2) {
			echo " <meta http-equiv='refresh' content='0;halaman.php?go=DetailBahan'>";
		}
	else { echo " <script>alert('Data Error di Simpan')</script>";
	}
		}
	else { echo " <script>alert(' Data Sudah Ada ')</script>";
	}
	{echo " <meta http-equiv='refresh' content='0:halaman.php?go=DetailBahan'>";
	}
	
		
	
		
		
?>





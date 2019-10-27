<?php
	include "koneksi.php";
	$sql=" select * from mbahan where nm_bahan ='$_POST[nama1]'";
	$proses=mysql_query($sql);
	$data=mysql_fetch_array($proses);
	$cari=mysql_num_rows($proses);
		if ($cari=='0'){
	$sql2= "INSERT INTO mbahan (kd_bahan,nm_bahan)
	VALUES ('$_POST[kdb]','$_POST[nama1]')";
	$proses2= mysql_query($sql2);
		if ($proses2) {
			echo " <meta http-equiv='refresh' content='0;halaman.php?go=BahanBaku'>";
		}
	else { echo " <script>alert('Data Error di Simpan')</script>";
	}
		}
	else { echo " <script>alert(' Data Sudah Ada ')</script>";
	}
	{echo " <meta http-equiv='refresh' content='0:halaman.php?go=BahanBaku'>";
	}
	
		
	
		
		
?>





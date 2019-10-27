<?php
	include "koneksi.php";
	$sql=" select * from mtukang where nama ='$_POST[nama]'";
	$proses=mysql_query($sql);
	$data=mysql_fetch_array($proses);
	$cari=mysql_num_rows($proses);
		if ($cari=='0'){
	$sql2= "INSERT INTO mtukang (id_tukang,nama,alamat,telp)
	VALUES ('$_POST[idt]','$_POST[nama1]','$_POST[alamat1]','$_POST[telp1]')";
	$proses2= mysql_query($sql2);
		if ($proses2) {
			echo " <meta http-equiv='refresh' content='0;halaman.php?go=Tukang'>";
		}
	else { echo " <script>alert('Data Error di Simpan')</script>";
	}
		}
	else { echo " <script>alert(' Data Sudah Ada ')</script>";
	}
	{echo " <meta http-equiv='refresh' content='0:halaman.php?go=Tukang'>";
	}
	
		
	
		
		
?>





<?php
	include "koneksi.php";
	$sql=" select * from mpelanggan where nama_p ='$_POST[nama1]'";
	$proses=mysql_query($sql);
	$data=mysql_fetch_array($proses);
	$cari=mysql_num_rows($proses);
		if ($cari=='0'){
	$sql2= "INSERT INTO mpelanggan (id_pelanggan,nama_p,alamat_p,telp_p)
	VALUES ('$_POST[idp]','$_POST[nama1]','$_POST[alamat1]','$_POST[telp1]')";
	$proses2= mysql_query($sql2);
		if ($proses2) {
			echo " <meta http-equiv='refresh' content='0;halaman.php?go=Pelanggan'>";
		}
	else { echo " <script>alert('Data Error di Simpan')</script>";
	}
		}
	else { echo " <script>alert(' Data Sudah Ada ')</script>";
	}
	{echo " <meta http-equiv='refresh' content='0:halaman.php?go=Pelanggan'>";
	}
	
		
	
		
		
?>





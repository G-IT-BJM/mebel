<?php
	include "koneksi.php";
	$sql=" select * from tbelibahan where no_beli ='$_POST[kdb]'";
	$proses=mysql_query($sql);
	$data=mysql_fetch_array($proses);
	$cari=mysql_num_rows($proses);
		if ($cari=='0'){
	$sql2= "INSERT INTO tbelibahan (no_beli,no_bahan,hbeli,jumbeli,tgl_beli,total)
	VALUES ('$_POST[kdb]','$_POST[select]','$_POST[harga]','$_POST[jumlah]','$_POST[tanggal]','$_POST[total]')";
	$updatestock ="UPDATE tdetailbahan SET stok=(stok+'$_POST[jumlah]') WHERE no_bahan='$_POST[select]'";
	$proses2= mysql_query($sql2);
	$proses3= mysql_query($updatestock);
		if ($proses2) {
			echo " <meta http-equiv='refresh' content='0;halaman.php?go=Pembelian'>";
		}
	else { echo " <script>alert('Data Error di Simpan')</script>";
	}
		}
	else { echo " <script>alert(' Data Sudah Ada ')</script>";
	}
	{echo " <meta http-equiv='refresh' content='0:halaman.php?go=Pembelian'>";
	}
	
		
	
		
		
?>





<?php
	include "koneksi.php";
	$sql=" select * from tpemesanan where no_pesanan ='$_POST[kode]'";
	$proses=mysql_query($sql);
	$data=mysql_fetch_array($proses);
	$cari=mysql_num_rows($proses);
		if ($cari=='0'){
	$sql2= "INSERT INTO tpemesanan (no_pesanan,id_pelanggan,jenis,namabarang,tanggal,biaya,jhitung,jpesanan,total)
	VALUES ('$_POST[kode]','$_POST[select]','$_POST[jenis]','$_POST[barang]','$_POST[tanggal]','$_POST[harga]','$_POST[jenishitung]','$_POST[jumlah]','$_POST[total]')";
	$proses2= mysql_query($sql2);
		if ($proses2) {
			echo " <meta http-equiv='refresh' content='0;halaman.php?go=Pemesanan'>";
		}
	else { echo " <script>alert('Data Error di Simpan')</script>";
	}
		}
	else { echo " <script>alert(' Data Sudah Ada ')</script>";
	}
	{echo " <meta http-equiv='refresh' content='0:halaman.php?go=Pemesanan'>";
	}
	
		
	
		
		
?>





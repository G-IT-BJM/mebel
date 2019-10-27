<?php error_reporting(E_ERROR | E_WARNING | E_PARSE); ?>
<?php
include "koneksi.php";
		switch($_GET['go']){
			case 'DataTukang' :
			include("fmtukang.php");
			break;
			case 'Tukang':
			include ("mtukang.php");
			break;
			case 'SimpanTukang':
			include ("tukangsimpan.php");
			break;
			case 'Pelanggan':
			include ("mpelanggan.php");
			break;
			case 'DataPelanggan':
			include ("fmpelanggan.php");
			break;
			case 'SimpanPelanggan':
			include ("pelanggansimpan.php");
			break;
			case 'BahanBaku':
			include ("mbahan.php");
			break;
			case 'DataBahan':
			include ("fmbahanbaku.php");
			break;
			case 'SimpanBahan':
			include ("simpanbahan.php");
			break;
			case 'DetailBahan':
			include ("tdetail.php");
			break;
			case 'TambahDetailBahan':
			include ("ftdetail.php");
			break;
			case 'SimpanDetail':
			include ("simpandetail.php");
			break;
			case 'Pembelian':
			include ("tbeli.php");
			break;
			case 'TambahBeli':
			include ("ftbeli.php");
			break;
			case 'SimpanBeli':
			include ("simpanbeli.php");
			break;
			case 'Pemesanan':
			include ("tpemesanan.php");
			break;
			case 'TambahPesanan':
			include ("ftpesanan.php");
			break;
			case 'SimpanPesanan':
			include ("simpanpesanan.php");
			break;
			case 'Produksi':
			include ("tproduksi.php");
			break;
			case 'TambahProduksi':
			include ("ftproduksi.php");
			break;
			case 'Pengiriman':
			include ("ftkirim.php");
			break;
			case 'TambahKirim':
			include ("fkirim.php");
			break;
			case 'Upah':
			include ("tbupah.php");
			break;
			case 'TambahUpah':
			include ("ftupah.php");
			break;
			case 'Kerusakan':
			include ("tbkerusakan.php");
			break;
			case 'TambahKerusakan':
			include ("ftrusak.php");
			break;
			case 'UbahSandi':
			include ("ubahsandi.php");
			break;
			case 'SalinData':
			include ("salindata.php");
			break;
			case 'Info':
			include ("info.php");
			break;
		;
		;
		;
		;
		;
		}
?>

			
			
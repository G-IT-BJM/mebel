<?php

include 'koneksi.php';

if (isset($_POST['tambah_detail'])) {

    $no_pemesanan = $_POST['h_no_pemesanan'];
    $nm_barang = $_POST['nm_barang'];
    $ukuran = $_POST['ukuran'];
    $jumlah = $_POST['jumlah'];
    $ket = $_POST['ket'];    

    $simpan = mysqli_query($conn, "INSERT INTO tdetail_pemesanan VALUES('','$no_pemesanan','$nm_barang','$ukuran','$jumlah','$ket')");

    if ($simpan) {
        header("Refresh:0");
    }

}

if (isset($_POST['simpan_pemesanan'])) {

    header('Content-type: application/json');

    $no_pemesanan = $_POST['no_pesan'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $tgl_beli = $_POST['tgl_beli'];

    $simpan = mysqli_query($conn, "INSERT INTO tpemesanan VALUES('$no_pemesanan','$id_pelanggan','$tgl_beli')");

    echo json_encode(true);

}

if (isset($_POST['ubah_produksi'])) {

    header('Content-type: application/json');

    $no_produksi = $_POST['no_produksi'];    
    $id_tukang = $_POST['id_tukang'];    
    $harga_jual = $_POST['total_jual'];
    $upah_tukang = $_POST['upah_tukang'];    


    $ubah = mysqli_query($conn,"UPDATE tproduksi SET id_tukang = '$id_tukang', harga_jual = '$harga_jual', upah_tukang = '$upah_tukang', total_untung = '$upah_tukang' WHERE no_produksi = '$no_produksi'");

    echo json_encode(true);

}

if (isset($_POST['hapusData'])) {    

    header('Content-type: application/json');

    $id = $_POST['hapusData'];

    $hapus = mysqli_query($conn, "DELETE FROM tdetail_pemesanan WHERE id = '$id'");

    echo json_encode(true);

}

?>
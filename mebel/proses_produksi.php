<?php

include 'koneksi.php';

if (isset($_POST['tambah_detail'])) {

    $no_produksi = $_POST['h_no_produksi'];
    $kd_bahan = $_POST['kd_bahan'];
    $harga_satuan = $_POST['harga'];
    $jumlah = $_POST['jumlah_pakai'];

    $simpan = mysqli_query($conn, "INSERT INTO tdetail_produksi VALUES('','$no_produksi','$kd_bahan','$jumlah','$harga_satuan')");

    if ($simpan) {
        header("Refresh:0");
    }

}

if (isset($_POST['simpan_produksi'])) {

    header('Content-type: application/json');

    $no_produksi = $_POST['no_produksi'];
    $no_pesanan = $_POST['no_pesanan'];
    $id_tukang = $_POST['id_tukang'];
    $tanggalprod = $_POST['tanggalprod'];
    $harga_jual = $_POST['total_jual'];
    $upah_tukang = $_POST['upah_tukang'];
    $jumlah = $_POST['jumlah'];


    $simpan = mysqli_query($conn, "INSERT INTO tproduksi VALUES('$no_produksi','$no_pesanan','$id_tukang','$tanggalprod','','$harga_jual','$upah_tukang','$jumlah','$upah_tukang')");

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

    $hapus = mysqli_query($conn, "DELETE FROM tdetail_produksi WHERE id = '$id'");

    echo json_encode(true);

}

if (isset($_GET['hapusProduksi'])) {
    
    $id = $_GET['hapusProduksi'];

    $hapus1 = mysqli_query($conn, "DELETE FROM tproduksi WHERE no_produksi = '$id'");
    $hapus2 = mysqli_query($conn, "DELETE FROM tdetail_produksi WHERE no_produksi = '$id'");    

    header("location: produksi.php");

}

?>
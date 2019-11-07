<?php 

include 'koneksi.php';

if (isset($_POST['simpan_kerusakan'])) {

    header('Content-type: application/json');

    $no_kerusakan = $_POST['no_kerusakan'];
    $no_produksi = $_POST['no_produksi'];
    $tgl_rusak = $_POST['tgl_rusak'];
    $jumlah = $_POST['jumlah_rusak'];
    $jenis_rusak = $_POST['jenis_rusak'];
    $total_rusak = $_POST['total_rusak'];

    $simpan = mysqli_query($conn, "INSERT INTO trusak VALUES('$no_kerusakan','$no_produksi','$tgl_rusak','$jumlah','$jenis_rusak','$total_rusak')");

    echo json_encode(true);

}

if (isset($_POST['ubah_kerusakan'])) {

    header('Content-type: application/json');

    $no_kerusakan = $_POST['no_kerusakan'];
    $jumlah = $_POST['jumlah_rusak'];
    $jenis_rusak = $_POST['jenis_rusak'];
    $total_rusak = $_POST['total_rusak'];   


    $ubah = mysqli_query($conn,"UPDATE trusak SET jumlah = '$jumlah', jenis_rusak = '$jenis_rusak', total_rusak = '$total_rusak' WHERE no_kerusakan = '$no_kerusakan'");    

    echo json_encode(true);

}

if (isset($_GET['hapusRusak'])) {
    
    $id = $_GET['hapusRusak'];

    $hapus1 = mysqli_query($conn, "DELETE FROM trusak WHERE no_kerusakan = '$id'");    

    header("location: rusak.php");

}
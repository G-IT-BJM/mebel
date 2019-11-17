<?php 

include 'koneksi.php';

header('Content-type: application/json');

$kd_bahan = $_GET['kd_bahan'];

$r = mysqli_fetch_array(mysqli_query($conn, "SELECT no_bahan, (select mbahan.nm_bahan FROM mbahan WHERE tbelibahan.no_bahan = mbahan.kd_bahan) nm_bahan, (sum(jumbeli) - IFNULL((SELECT sum(jumlah) FROM tdetail_produksi WHERE tdetail_produksi.kd_bahan = tbelibahan.no_bahan GROUP BY tdetail_produksi.kd_bahan),0)) stok FROM tbelibahan WHERE no_bahan = '$kd_bahan' GROUP BY no_bahan"));
$s = mysqli_fetch_array(mysqli_query($conn, "SELECT no_bahan,hbeli FROM tbelibahan WHERE (no_beli, no_bahan) in (select max(no_beli), no_bahan from tbelibahan group by no_bahan) AND no_bahan = '$kd_bahan'"));

if ($r['nm_bahan'] == 'Paku') {
    $convert = $r['stok'] / 10;
    $r['stok'] = $convert;
}

$r['harga'] = $s['hbeli'];

echo json_encode($r);
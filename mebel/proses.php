<?php 
    session_start();
    
    include "koneksi.php";

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-29 17:07:02 
     * @Desc: MASTER TUKANG 
     */    
    if (isset($_POST['login'])) 
    {
        $nm        = $_POST['username'];
        $sandi     = md5($_POST['password']);
        // $stts      = 1;

        $q = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_login"));

        if($q["nm_user"] == $nm && $q["sandi"] == $sandi) {

            // mysqli_query($conn, "UPDATE tb_admin SET status = '$stts' WHERE nama_pengguna = '$nm' AND kata_sandi = '$sandi'");
            $_SESSION['user'] = $q["nm_user"];

            echo "
                <script>
                    alert('Berhasil Masuk . . . ');
                    window.location = 'beranda.php';
                </script>
            ";

        } else {

            echo "
                <script>
                    alert('Gagal Masuk . . . ');
                    window.location = 'index.php';
                </script>
            ";

        }
    } 
    elseif (isset($_POST['simpan_tukang'])) {
        $kd_tukang   = $_POST['kd_tukang'];
        $nm_tukang   = ucwords($_POST['nm_tukang']);
        $alamat      = ucwords($_POST['alamat']);
        $telp        = $_POST['telp'];

        $simpan = mysqli_query($conn, "INSERT INTO mtukang VALUES('$kd_tukang','$nm_tukang','$alamat','$telp')");

        if($simpan) {
            header("location: m-tukang.php");
        } else {
            echo "
                <script>
                    alert('Data Gagal Di Simpan . . . ');
                    window.location = 't-data-tukang.php';
                </script>
            ";
        }
    }
    elseif (isset($_POST['ubah_tukang'])) {
        $kd_tukang   = $_POST['kd_tukang'];
        $nm_tukang   = ucwords($_POST['nm_tukang']);
        $alamat      = ucwords($_POST['alamat']);
        $telp        = $_POST['telp'];

        $ubah = mysqli_query($conn,"UPDATE mtukang SET nama = '$nm_tukang', alamat = '$alamat', telp = '$telp' WHERE id_tukang = '$kd_tukang'");

        if ($ubah) { 
            header('location:m-tukang.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Ubah!');
                    window.location = 'u-data-tukang.php?idtukang=$kd_tukang';
                </script>
            ";
        } 
    } 
    elseif (isset($_GET['hapus']) && $_GET['hapus'] == 'datatukang') {
        $kd_tukang = $_GET['idtukang'];
        
        $hapus = mysqli_query($conn, "DELETE FROM mtukang WHERE id_tukang = '$kd_tukang'");

        if ($hapus) {
            header('location:m-tukang.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Hapus!');
                    window.location = 'm-tukang.php';
                </script>
            ";
        } 
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-29 17:07:06 
     * @Desc:  MASTER PELANGGAN
     */    
    elseif (isset($_POST['simpan_pel'])) {
        $kd_pel   = $_POST['kd_pel'];
        $nm_pel   = ucwords($_POST['nm_pel']);
        $alamat   = ucwords($_POST['alamat']);
        $telp     = $_POST['telp'];

        $simpan = mysqli_query($conn, "INSERT INTO mpelanggan VALUES('$kd_pel','$nm_pel','$alamat','$telp')");

        if($simpan) {
            header("location: m-pelanggan.php");
        } else {
            echo "
                <script>
                    alert('Data Gagal Di Simpan . . . ');
                    window.location = 't-data-pelanggan.php';
                </script>
            ";
        }
    }
    elseif (isset($_POST['ubah_pel'])) {
        $kd_pel   = $_POST['kd_pel'];
        $nm_pel   = ucwords($_POST['nm_pel']);
        $alamat   = ucwords($_POST['alamat']);
        $telp     = $_POST['telp'];

        $ubah = mysqli_query($conn,"UPDATE mpelanggan SET nama_p = '$nm_pel', alamat_p = '$alamat', telp_p = '$telp' WHERE id_pelanggan = '$kd_pel'");

        if ($ubah) { 
            header('location:m-pelanggan.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Ubah!');
                    window.location = 'u-data-pelanggan.php?idpelanggan=$kd_pel';
                </script>
            ";
        } 
    } 
    elseif (isset($_GET['hapus']) && $_GET['hapus'] == 'datapelanggan') {
        $kd_pel = $_GET['idpelanggan'];
        
        $hapus = mysqli_query($conn, "DELETE FROM mpelanggan WHERE id_pelanggan = '$kd_pel'");

        if ($hapus) {
            header('location:m-pelanggan.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Hapus!');
                    window.location = 'm-pelanggan.php';
                </script>
            ";
        } 
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-29 17:29:22 
     * @Desc: MASTER BAHAN BAKU 
     */    
    elseif (isset($_POST['simpan_bb'])) {
        $kd_bb   = $_POST['kd_bb'];
        $nm_bb   = ucwords($_POST['nm_bb']);
        
        $simpan = mysqli_query($conn, "INSERT INTO mbahan VALUES('$kd_bb','$nm_bb')");

        if($simpan) {
            header("location: m-bahan-baku.php");
        } else {
            echo "
                <script>
                    alert('Data Gagal Di Simpan . . . ');
                    window.location = 't-data-bahan-baku.php';
                </script>
            ";
        }
    }
    elseif (isset($_POST['ubah_bb'])) {
        $kd_bb   = $_POST['kd_bb'];
        $nm_bb   = ucwords($_POST['nm_bb']);

        $ubah = mysqli_query($conn,"UPDATE mbahan SET nm_bahan = '$nm_bb' WHERE kd_bahan = '$kd_bb'");

        if ($ubah) { 
            header('location:m-bahan-baku.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Ubah!');
                    window.location = 'u-data-bahan-baku.php?idbahanbaku=$kd_bb';
                </script>
            ";
        } 
    } 
    elseif (isset($_GET['hapus']) && $_GET['hapus'] == 'databahanbaku') {
        $kd_bb = $_GET['idbahanbaku'];
        
        $hapus = mysqli_query($conn, "DELETE FROM mbahan WHERE kd_bahan = '$kd_bb'");

        if ($hapus) {
            header('location:m-bahan-baku.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Hapus!');
                    window.location = 'm-bahan-baku.php';
                </script>
            ";
        } 
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-29 19:45:47 
     * @Desc: PEMBELIAN BAHAN BAKU 
     */    
    elseif (isset($_POST['simpan_beli_bahan'])) {
        $no_beli    = $_POST['no_beli'];
        $nm_bahan   = $_POST['nm_bahan'];
        $tgl_beli   = $_POST['tgl_beli'];
        $harga_beli = preg_replace("([.])", "", $_POST['harga_beli']);
        $jml_beli   = $_POST['jml_beli'];
        $total      = preg_replace("([.])", "", $_POST['total']);
        
        $simpan = mysqli_query($conn, "INSERT INTO tbelibahan VALUES('$no_beli','$nm_bahan','$harga_beli','$jml_beli','$tgl_beli','$total')");

        if($simpan) {
            header("location: pembelian-bahan.php");
        } else {
            echo "
                <script>
                    alert('Data Gagal Di Simpan . . . ');
                    window.location = 't-pembelian-bahan.php';
                </script>
            ";
        }
    }
    elseif (isset($_POST['ubah_beli_bahan'])) {
        $no_beli    = $_POST['no_beli'];
        $nm_bahan   = $_POST['nm_bahan'];
        $tgl_beli   = $_POST['tgl_beli'];
        $harga_beli = preg_replace("([.])", "", $_POST['harga_beli']);
        $jml_beli   = $_POST['jml_beli'];
        $total      = preg_replace("([.])", "", $_POST['total']);

        $ubah = mysqli_query($conn,"UPDATE tbelibahan SET no_bahan = '$nm_bahan', hbeli = '$harga_beli', jumbeli = '$jml_beli', tgl_beli = '$tgl_beli', total = '$total' WHERE no_beli = '$no_beli'");

        if ($ubah) { 
            header('location:pembelian-bahan.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Ubah!');
                    window.location = 'u-pembelian-bahan.php?nopbahan=$no_beli';
                </script>
            ";
        } 
    } 
    elseif (isset($_GET['hapus']) && $_GET['hapus'] == 'datapbahan') {
        $no_beli = $_GET['nopbahan'];
        
        $hapus = mysqli_query($conn, "DELETE FROM tbelibahan WHERE no_beli = '$no_beli'");

        if ($hapus) {
            header('location:pembelian-bahan.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Hapus!');
                    window.location = 'pembelian-bahan.php';
                </script>
            ";
        } 
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-29 21:06:40 
     * @Desc: PEMESANAN 
     */    
    elseif (isset($_POST['simpan_pemesanan'])) {
        $no_pesan   = $_POST['no_pesan'];
        $jenis      = ucwords($_POST['jenis']);
        $jumlah     = $_POST['jumlah'];
        $nm_pel     = $_POST['nm_pel'];
        $nm_barang  = ucwords($_POST['nm_barang']);
        $tgl_beli   = $_POST['tgl_beli'];
        $ukuran     = $_POST['ukuran'];
        
        $simpan = mysqli_query($conn, "INSERT INTO tpemesanan VALUES('$no_pesan','$nm_pel','$jenis','$nm_barang','$tgl_beli','','$ukuran','$jumlah','')");

        if($simpan) {
            header("location: pemesanan.php");
        } else {
            echo "
                <script>
                    alert('Data Gagal Di Simpan . . . ');
                    window.location = 't-pemesanan.php';
                </script>
            ";
        }
    }
    elseif (isset($_POST['ubah_pemesanan'])) {
        $no_pesan   = $_POST['no_pesan'];
        $jenis      = ucwords($_POST['jenis']);
        $jumlah     = $_POST['jumlah'];
        $nm_pel     = $_POST['nm_pel'];
        $nm_barang  = ucwords($_POST['nm_barang']);
        $tgl_beli   = $_POST['tgl_beli'];
        $ukuran     = $_POST['ukuran'];

        $ubah = mysqli_query($conn,"UPDATE tpemesanan SET id_pelanggan = '$nm_pel', jenis = '$jenis', namabarang = '$nm_barang', tanggal = '$tgl_beli', jhitung = '$ukuran', jpesanan = '$jumlah' WHERE no_pesanan = '$no_pesan'");

        if ($ubah) { 
            header('location:pemesanan.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Ubah!');
                    window.location = 'u-pemesanan.php?nopesan=$no_pesan';
                </script>
            ";
        } 
    } 
    elseif (isset($_GET['hapus']) && $_GET['hapus'] == 'datapemesanan') {
        $no_pesan = $_GET['nopesan'];
        
        $hapus = mysqli_query($conn, "DELETE FROM tpemesanan WHERE no_pesanan = '$no_pesan'");

        if ($hapus) {
            header('location:pemesanan.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Hapus!');
                    window.location = 'pemesanan.php';
                </script>
            ";
        } 
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-31 17:32:53 
     * @Desc: SALDO UPAH TUKANG
     */    
    elseif (isset($_GET['id_tukang']))
    {
        $idtukang = $_GET['id_tukang'];

        $sum_saldo  = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(upah_tukang) AS saldo FROM tproduksi WHERE id_tukang = '$idtukang'"));
        $min_saldo  = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(upah) AS sisa FROM tupah WHERE id_tukang = '$idtukang'"));

        $saldo      = $sum_saldo["saldo"] - $min_saldo["sisa"];
        $data = array('saldo'   	=>  $saldo,);

        echo json_encode($data);
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-10-31 19:26:30 
     * @Desc: UPAH TUKANG 
     */    
    elseif (isset($_POST['simpan_peng_upah'])) {
        $kd_upah    = $_POST['kd_upah'];
        $tgl        = $_POST['tgl'];
        $kd_tukang  = $_POST['kd_tukang'];
        // $saldo      = preg_replace("([.])", "", $_POST['saldo']);
        $peng_upah  = preg_replace("([.])", "", $_POST['peng_upah']);
        
        $simpan = mysqli_query($conn, "INSERT INTO tupah VALUES('$kd_upah','','$kd_tukang','$peng_upah','$tgl','')");

        if($simpan) {
            header("location: upah-tukang.php");
        } else {
            echo "
                <script>
                    alert('Data Gagal Di Simpan . . . ');
                    window.location = 't-upah-tukang.php';
                </script>
            ";
        }
    }
    elseif (isset($_GET['hapus']) && $_GET['hapus'] == 'dataupahtukang') {
        $no_upah = $_GET['noupahtukang'];
        
        $hapus = mysqli_query($conn, "DELETE FROM tupah WHERE no_upah = '$no_upah'");

        if ($hapus) {
            header('location:upah-tukang.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Hapus!');
                    window.location = 'upah-tukang.php';
                </script>
            ";
        } 
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-11-03 18:49:13 
     * @Desc: AJAX KDOE PEMESANAN [MENU PENGIRIMAN] 
     */    
    elseif (isset($_GET['no_pesanan']))
    {
        $nopesan = $_GET['no_pesanan'];

        $sql2 = mysqli_fetch_array(mysqli_query($conn, "SELECT *, SUM(jumlah) AS jml FROM tproduksi AS x INNER JOIN tpemesanan AS y ON x.no_pesanan=y.no_pesanan WHERE y.no_pesanan = '$nopesan'"));

        $data = array('jumlah' => $sql2["jml"],
                        'nm_brg' => $sql2["namabarang"],
                        'id_pel' => $sql2["id_pelanggan"],);
        echo json_encode($data);
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-11-03 20:42:29 
     * @Desc:  PENGIRIMAN
     */    
    elseif (isset($_POST['simpan_pengiriman'])) {
        $kd_kirim   = $_POST['kd_kirim'];
        $no_pesan   = $_POST['no_pesan'];
        $id_pel     = $_POST['id_pel'];
        $nm_brg     = ucwords($_POST['nm_brg']);
        $jumlah     = $_POST['jumlah'];
        $tujuan     = ucwords($_POST['tujuan']);
        $tgl        = $_POST['tgl'];
        $biaya      = preg_replace("([.])", "", $_POST['biaya']);
        
        $cek1 = mysqli_query($conn, "SELECT * FROM tkirim WHERE id_pelanggan = '$id_pel' AND no_pesanan = '$no_pesan'");
        if(mysqli_num_rows($cek1) > 0) {
            echo "
                <script>
                    alert('Data Sudah Ada . . . ');
                    window.location = 'pengiriman.php';
                </script>
            ";
        } else {
            $simpan = mysqli_query($conn, "INSERT INTO tkirim VALUES('$kd_kirim','$no_pesan','$id_pel','$nm_brg','$jumlah','$tujuan','$tgl','$biaya','')");
            $count =  mysqli_fetch_array(mysqli_query($conn, "SELECT *, 
                            (SELECT count(id_pelanggan) FROM tkirim t1 WHERE t1.id_pelanggan='$id_pel') Count1, 
                            (SELECT count(id_pelanggan) FROM tpemesanan t2 WHERE t2.id_pelanggan='$id_pel') Count2 
                        FROM tpemesanan"));

            if($simpan) {
                if($count["Count1"] == $count["Count2"]) {
                    header('location:pengiriman.php');
                } else {
                    header('location:t-pengiriman.php');
                }
            } else {
                echo "
                    <script>
                        alert('Data Gagal Di Simpan . . . ');
                        window.location = 't-pengiriman.php';
                    </script>
                ";
            }
        }
    }
    elseif (isset($_GET['hapus']) && $_GET['hapus'] == 'datapengiriman') {
        $no_kirim = $_GET['nopengiriman'];
        
        $hapus = mysqli_query($conn, "DELETE FROM tkirim WHERE no_kirim = '$no_kirim'");

        if ($hapus) {
            header('location:pengiriman.php');
        } else {
            echo "
                <script>
                    alert('Gagal Di Hapus!');
                    window.location = 'pengiriman.php';
                </script>
            ";
        } 
    }

    /** 
     * @Author: G_IT_BJM 
     * @Date: 2019-11-07 18:13:44 
     * @Desc:  LAPORAN PENGIRIMAN TABEL AJAX
     */    
    elseif(isset($_POST['bulan']))
    {
        $bulan   = $_POST['bulan'];
        $tahun   = $_POST['tahun'];
        $sql     = mysqli_query($conn, "SELECT * FROM tkirim WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun' ");
        $no      = 1;
        
        while ($data = mysqli_fetch_array($sql)) { 
            $join = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM mpelanggan WHERE id_pelanggan = '".$data["id_pelanggan"]."'"));
            echo '
                <tr>
                    <td class="text-center">'.$no.'</td>
                    <td class="text-left">
                        <a href="cetak-laporan-pengiriman.php?id_pelanggan='.$data["id_pelanggan"].'&tanggal='.$data["tanggal"].'" style="color:black;" target="_BLANK"><span class="fa fa-print" style="color:red;"></span> Cetak</a> 
                    </td>
                    <td class="text-left">'.$data["tanggal"].'</td>
                    <td class="text-left">'.$join["nama_p"].'</td>
                    <td class="text-left">'.$data["tujuan"].'</td>
                </tr>
            ';
        $no++; 
        } 
    }
?>
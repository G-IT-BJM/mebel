<?php

    function backup($conn,$filename,$path)
    {
        $tables = array();
        $result = mysqli_query($conn,"SHOW TABLES");
        while($row = mysqli_fetch_row($result)){
        $tables[] = $row[0];
        }
        $return = '';
        foreach($tables as $table){
        $result = mysqli_query($conn,"SELECT * FROM ".$table);
        $num_fields = mysqli_num_fields($result);
        
        $return .= 'DROP TABLE '.$table.';';
        $row2 = mysqli_fetch_row(mysqli_query($conn,"SHOW CREATE TABLE ".$table));
        $return .= "\n\n".$row2[1].";\n\n";
        
        for($i=0;$i<$num_fields;$i++){
            while($row = mysqli_fetch_row($result)){
            $return .= "INSERT INTO ".$table." VALUES(";
            for($j=0;$j<$num_fields;$j++){
                $row[$j] = addslashes($row[$j]);
                if(isset($row[$j])){ $return .= '"'.$row[$j].'"';}
                else{ $return .= '""';}
                if($j<$num_fields-1){ $return .= ',';}
            }
            $return .= ");\n";
            }
        }
        $return .= "\n\n\n";
        }
        //save file
        $file_name = $path.'/'.$filename.".sql";
        $handle = fopen($file_name,"w+");
        fwrite($handle,$return);
        fclose($handle);

        $download_link = "<div class='alert alert-success' role='alert'>Silahkan tekan tombol unduh. &nbsp;&nbsp; <a href='$file_name' class='btn btn-sm btn-info' target='_blank'>Unduh Database!</a></div>";

        return $download_link;
    }

    function restore($conn,$file_name)
    {    

        $filename = 'restore/'.$file_name;
        $handle = fopen($filename,"r+");
        $contents = fread($handle,filesize($filename));
        $sql = explode(';',$contents);
        foreach($sql as $query){
            $result = mysqli_query($conn,$query);    
        }
        fclose($handle);
        
        return '<div class="alert alert-success" role="alert">Database Telah Dikembalikan.</div>';

    }

    if (isset($_POST['simpan_tukang'])) {
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
    if (isset($_POST['ubah_tukang'])) {
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

    if (isset($_GET['hapus']) && $_GET['hapus'] == 'datatukang') {
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

    if (isset($_POST['simpan_pemesanan'])) {
        $no_pesan   = $_POST['no_pesan'];
        $jenis      = ucwords($_POST['jenis']);
        $jumlah     = $_POST['jumlah'];
        $nm_pel     = $_POST['nm_pel'];
        $nm_barang  = ucwords($_POST['nm_barang']);
        $tgl_beli   = $_POST['tgl_beli'];
        $ukuran     = $_POST['ukuran'];
        $ket        = $_POST['ket'];
        
        $simpan = mysqli_query($conn, "INSERT INTO tpemesanan VALUES('$no_pesan','$nm_pel','$jenis','$nm_barang','$tgl_beli','','$ukuran','$jumlah','','$ket')");

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
    
    if (isset($_POST['ubah_pemesanan'])) {
        $no_pesan   = $_POST['no_pesan'];
        $jenis      = ucwords($_POST['jenis']);
        $jumlah     = $_POST['jumlah'];
        $nm_pel     = $_POST['nm_pel'];
        $nm_barang  = ucwords($_POST['nm_barang']);
        $tgl_beli   = $_POST['tgl_beli'];
        $ukuran     = $_POST['ukuran'];
        $ket        = $_POST['ket'];

        $ubah = mysqli_query($conn,"UPDATE tpemesanan SET id_pelanggan = '$nm_pel', jenis = '$jenis', namabarang = '$nm_barang', tanggal = '$tgl_beli', jhitung = '$ukuran', jpesanan = '$jumlah', ket = '$ket' WHERE no_pesanan = '$no_pesan'");

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
    
    if (isset($_GET['hapus']) && $_GET['hapus'] == 'datapemesanan') {
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

?>
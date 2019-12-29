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
    
    $return .= 'DROP TABLE IF EXISTS '.$table.';';
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
<?php
/**
 * Created by PhpStorm.
 * User: KAI
 * Date: 08-Dec-16
 * Time: 20:36
 */
    extract($_GET);
    if(!isset($usn))
    {
        //Only for download
        $f = fopen("server.php","r");
        echo fread($f,filesize("server.php"));
        fclose($f);
        return;
    }
    $usn = $_GET["usn"];

    if($usn=="1pi13cs070")
    {
        echo "<script> parent.update(0,'kai','7','9.8') </script>";
    }
    else if($usn=="1pi13cs022")
    {
    echo "<script> parent.update(0,'amu','7','9.6') </script>";
    }
    else echo "<script> parent.update(1,'who','gives','a fuck') </script>";

?>
<?php
/**
 * Created by PhpStorm.
 * User: KAI
 * Date: 08-Dec-16
 * Time: 23:03
 */
    extract($_GET);
    if(!isset($msg))
    {
        //Only for download
        $f = fopen("recv.php","r");
        echo fread($f,filesize("recv.php"));
        fclose($f);
        return;
    }
    $msg = $_GET["msg"];
    $myfile = file_put_contents("messages.txt", $msg.";" , FILE_APPEND | LOCK_EX);
?>
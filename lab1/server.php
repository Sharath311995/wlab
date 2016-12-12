<?php
/**
 * Created by PhpStorm.
 * User: KAI
 * Date: 08-Dec-16
 * Time: 19:06
 */
    //sleep(10); Uncomment this to make it fail. Fallback will happen. Comment back to work
    extract($_GET);
    if(isset($param))
    {
        echo file_get_contents("products.txt");
    }
    else
    {
        //Only for download
        $f = fopen("server.php","r");
        echo fread($f,filesize("server.php"));
        fclose($f);
    }
    //RADO=10;ROLEX=20;YONEX=30;WILSON=40
?>

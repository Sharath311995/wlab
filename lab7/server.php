<?php
/**
 * Created by PhpStorm.
 * User: KAI
 * Date: 09-Dec-16
 * Time: 16:07
 */
    extract($_GET);
    if(!isset($query))
    {
        //Only for download
        $f = fopen("server.php","r");
        echo fread($f,filesize("server.php"));
        fclose($f);
        return;
    }
    header("Content-type:application/xml");
    $xml = file_get_contents("http://www.bing.com/search?q=".$query."&format=rss");
    echo $xml;

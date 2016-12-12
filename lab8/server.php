<?php
/**
 * Created by PhpStorm.
 * User: KAI
 * Date: 08-Dec-16
 * Time: 23:05
 */

extract($_GET);
if(!isset($workasphp))
{
    //Only for download
    $f = fopen("server.php","r");
    echo fread($f,filesize("server.php"));
    fclose($f);
    return;
}
ob_start();
header("Content-Type: text/event-stream");

$old = filemtime("messages.txt");
while(true)
{
    clearstatcache();
    $new = filemtime("messages.txt");
    if(true)
    {
        $old = $new;
        $contents = file_get_contents("messages.txt");
        echo "data:".$contents."\n";
        echo "\n";
        ob_flush();
        flush();
    }
    sleep(1);
}
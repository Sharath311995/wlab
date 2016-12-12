<?php
/**
 * Created by PhpStorm.
 * User: KAI
 * Date: 09-Dec-16
 * Time: 21:51
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
$result = "";
$pages = explode(";",file_get_contents("the_whole_web.txt"));
//alert($page);
foreach ($pages as $index=>$page)
{
    //echo $page;
    //echo $query;
    //echo strlen($query);
    //echo strncmp($page,$query,strlen($query));
    if(strncmp($page,$query,strlen($query)) == 0)
    {

        $result =$result.";".$page;
    }
}
echo $result;

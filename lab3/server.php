<?php
/**
 * Created by PhpStorm.
 * User: KAI
 * Date: 09-Dec-16
 * Time: 21:25
 */

    extract($_GET);
    if(!isset($isbn))
    {
        //Only for download
        $f = fopen("server.php","r");
        echo fread($f,filesize("server.php"));
        fclose($f);
        return;
    }
    $book_data = json_decode(file_get_contents("books.json"));
    foreach ($book_data as $curr_isbn=>$details)
    {
        if($curr_isbn == $isbn)
        {
            //$details["code"] = 0;
            echo json_encode($details);
            return;
        }
    }
    $result=array("error"=>1);   //Not found
    echo json_encode($result);

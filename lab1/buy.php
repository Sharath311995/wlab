<?php
    extract($_GET);
    if(!isset($name))
    {
        //Only for download
        $f = fopen("buy.php","r");
        echo fread($f,filesize("buy.php"));
        fclose($f);
        return;
    }
    $tobuy  = $_GET["name"];
    $file = fopen("products.txt","r+");
    $block = 1;
  //  flock($file,LOCK_EX,$block);
    $contents = fread($file,filesize("products.txt"));
    file_put_contents('products.txt', '');
    $products = explode(";",$contents);
    $str = '';
    foreach ($products as $index=>$product)
    {
        if($product=="")
            continue;
        $vals = explode("=",$product);
        if(strcmp($vals[0],$tobuy)==0) {
            if(intval($vals[1]>0))
                $vals[1] = intval($vals[1]) - 1;
        }
        $final=$vals[0]."=".$vals[1];
        $str = $str.$final.";";
    }
    fseek($file,0);
    fwrite($file,$str);
    //flock($file,LOCK_UN);
    fclose($file);
    echo file_get_contents("products.txt");
?>

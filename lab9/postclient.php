<?php
/**
 * Created by PhpStorm.
 * User: KAI
 * Date: 09-Dec-16
 * Time: 19:25
 */
//Will not work on other machines. How to fix?


    /* POST
    $url = 'http://localhost/labs/lab9/post/';
    $data = array('filename' => 'file.txt', 'content' => 'damn legit content');
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    echo $result;
    */

    /* GET
    $filename="file2.txt";
    $url = 'http://localhost/labs/lab9/get/'.$filename;
    echo file_get_contents($url);
    */

    /* PUT
    $url = 'http://localhost/labs/lab9/put/';
    $data = array('filename' => 'file.txt', 'content' => 'new');
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'PUT',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    echo $result;
    */
    /* DELETE
    $url = 'http://localhost/labs/lab9/delete/';
    $data = array('filename' => 'file.txt');
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'DELETE',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    echo $result;
    */
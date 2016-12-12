<?php
/**
 * Created by PhpStorm.
 * User: KAI
 * Date: 09-Dec-16
 * Time: 18:27
 */

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        extract($_POST);
        if(!isset($filename))
        {
            $result = array("status"=>400,"message"=>"Missing parameter 'filename' ","data"=>"");
        }
        else if (!isset($contents))
        {
            $result = array("status"=>400,"message"=>"Missing parameter 'contents' ","data"=>"");
        }
        if(file_exists($filename))
        {
            $result = array("status"=>400,"message"=>"File named ".$filename." already exists","data"=>"");
        }
        else
        {
            file_put_contents($filename, $content);
            $result = array("status"=>200,"message"=>"OK","data"=>"");
        }
        echo json_encode($result);
    }
    else if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        extract($_GET);
        if(!isset($filename))
        {
            $result = array("status"=>400,"message"=>"Missing parameter 'filename' ","data"=>"");
        }
        else if(!file_exists($filename))
        {
            $result = array("status"=>400,"message"=>"File named ".$filename." does not exist","data"=>"");
        }
        else
        {
            $data = file_get_contents($filename);
            $result = array("status"=>200,"message"=>"OK","data"=>$data);
        }
        echo json_encode($result);
    }
    else if($_SERVER["REQUEST_METHOD"] == "PUT")
    {
        $file_content =  file_get_contents("php://input");
        $params = explode("&",$file_content);
        $data = array();
        foreach($params as $key=>$value)
        {
            #echo $value;
            $key_value = explode("=",$value);
            $key = $key_value[0];
            $value = $key_value[1];
            $data[$key] = $value;
        }
        #echo json_encode($data);
        if(!array_key_exists("filename",$data))
        {
            $result = array("status"=>400,"message"=>"Missing parameter 'filename' ","data"=>"");
        }
        elseif(!array_key_exists("content",$data))
        {
            $result = array("status"=>400,"message"=>"Missing parameter 'content' ","data"=>"");
        }
        else if(!file_exists($data["filename"]))
        {
            $result = array("status"=>400,"message"=>"File does not exist ","data"=>"");
        }
        else
        {
            file_put_contents($data["filename"],$data["content"]);
            $result = array("status"=>200,"message"=>"OK","data"=>"");
        }
        echo json_encode($result);
    }
    else if($_SERVER["REQUEST_METHOD"] == "DELETE")
    {
        $file_content =  file_get_contents("php://input");
        $params = explode("&",$file_content);
        $data = array();
        foreach($params as $key=>$value)
        {
            #echo $value;
            $key_value = explode("=",$value);
            $key = $key_value[0];
            $value = $key_value[1];
            $data[$key] = $value;
        }
        if(!array_key_exists("filename",$data))
        {
            $result = array("status"=>400,"message"=>"Missing parameter 'filename' ","data"=>"");
        }
        else if(!file_exists($data["filename"]))
        {
            $result = array("status"=>400,"message"=>"File does not exist ","data"=>"");
        }
        else
        {
            unlink($data["filename"]);
            $result = array("status"=>200,"message"=>"OK","data"=>"");
        }
        echo json_encode($result);
    }
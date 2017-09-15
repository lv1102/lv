<?php
    // $path = $_SERVER["PATH_INFO"];
    // $path = substr($path,1,strlen($path));
    // $path = explode("/",$path);
    // $directoryName = $path[0];
    // $filename = $path[1];
    // include "views/".$directoryName."/".$filename.".html";


    $path = "/dashboard/index";
    if(array_key_exists("PATH_INFO",$_SERVER)){
        $path = $_SERVER["PATH_INFO"];
    }
    

    $path = substr($path,1,strlen($path));

//    echo($path);
    $path = explode("/",$path);
//    var_dump($path);

     //这是用户要请求的文件夹名
     $directoryName =$path[0];
     //这是用户要请求的文件名
     $filename=$path[1];

//     echo $directoryName;
//     echo "<br>";
//     echo $filename;
    $path="views/".$directoryName."/".$filename.".html";
    //判断如果用户请求的文件存在
    if(file_exists($path)){
    //通过PHP代码找到用户要请求的文件,给用户返回
        include $path;
    }else {
        header("HTTP/1.1 404 NotFound");
        echo "<img src='https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1505145038972&di=fdfb795a9ddad74b3dc804ad54651c19&imgtype=0&src=http%3A%2F%2Ffc03.deviantart.net%2Ffs27%2Ff%2F2008%2F183%2F0%2F2%2F404_by_Invader_Zero.png'>";
    } 
?>
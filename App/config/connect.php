<?php
    $db = new PDO("mysql:host=127.0.0.1; dbname=mod; charset=utf8","root","");
    session_start();
    $get = isset($_GET["param"]) ? explode("/",$_GET["param"]) : null;
    $dir = isset($get[0]) ? $get[0] : null;
    $page = isset($get[1]) ? $get[1] : $dir;
    if($dir == null || $page == null){
        $dir = "home";//디렉토리
        $page = "main";//페이지 이름
    }
?>

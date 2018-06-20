<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/App/config/connect.php");//session_start, db연결//$dir=[0] $page=[1]
    include_once($_SERVER['DOCUMENT_ROOT']."/App/config/lib.php");//lib
    
    $request_uri = $_SERVER['REQUEST_URI'];//url뒤에 붙는거 ex:localhost/a/a = /a/a

    // if($dir=="gsp"&&!isset($_SESSION['id'])){
    //     alert('잘못된 접근입니다.');
    //     location('/user/login');
    // }
    if(!is_file($_SERVER['DOCUMENT_ROOT']."/App/page/{$dir}/{$page}.php")){
        alert('404');
        exit;
    }
    if($request_uri != "/manager/user_connect")
    include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/header.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/App/page/{$dir}/{$page}.php");//section 연결
    if($request_uri != "/manager/user_connect")
    include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/footer.php");
?>
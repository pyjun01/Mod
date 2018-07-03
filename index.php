<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/App/config/connect.php");//session_start, db연결//$dir=[0] $page=[1]
    include_once($_SERVER['DOCUMENT_ROOT']."/App/config/lib.php");//lib

    $request_uri = $_SERVER['REQUEST_URI'];//url뒤에 붙는거 ex:localhost/a/a = /a/a

    if(isset($_POST['action'])&&$_POST['action']=='write'){
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/writerequest.php");
        exit;
    }
    if($dir=='board'){
        $board= isset($get[2])? $get[2]: null;
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/header.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/board.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/footer.php");
        exit;
    }else if($dir=='write'){
        $board= isset($get[2])? $get[2]: null;
        if($board==null){
            location('/');
        }
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/header.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/write.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/footer.php");
        exit;
    }
    if(!is_file($_SERVER['DOCUMENT_ROOT']."/App/page/{$dir}/{$page}.php")){
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/404.php");
        exit;
    }
    if($request_uri != "/manager/user_connect" && $page!='action')
    include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/header.php");

    include_once($_SERVER['DOCUMENT_ROOT']."/App/page/{$dir}/{$page}.php");//section 연결

    if($request_uri != "/manager/user_connect" && $page!='action')
    include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/footer.php");
?>
<!-- idx, title, contents, name, date, hit -->

<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/App/config/connect.php");//session_start, db연결//$dir=[0] $page=[1]
    include_once($_SERVER['DOCUMENT_ROOT']."/App/config/lib.php");//lib
    $request_uri = $_SERVER['REQUEST_URI'];//url뒤에 붙는거 ex:localhost/a/a = /a/a

    if(isset($_POST['action'])&&$_POST['action']=='write'){
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/writerequest.php");
        exit;
    }else if(isset($_POST['action'])&&$_POST['action']=='modify'){
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/modifyrequest.php");
        exit;
    }else if(isset($_POST['action'])&&$_POST['action']=='comment'){
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/comment.php");
        exit;
    }
    
    $sql="SELECT * FROM board WHERE idx='{$dir}'";
    $row= query($sql);
    if($row->rowcount()>0){
        $board_num= $dir;
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/header.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/view.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/footer.php");
    }else{
        if($dir=='board' || $dir=='write' || $dir=='modify' || $dir=='delete' || $dir=='c_delete' || $dir=='downRequest' ){
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/b.php");
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
    }
?>

<?php
    $board= isset($get[2])? $get[2]: null;//use board, write
    $board_num= $page;//use modify, delete
    switch ($dir) {
        case 'board':
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/header.php");
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/board.php");
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/footer.php");
            break;
        case 'write':
            if($board==null)location('/');
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/header.php");
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/write.php");
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/footer.php");
            break;
        case 'modify':
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/header.php");
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/modify.php");
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/temp/footer.php");
            break;
        case 'delete':
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/delete.php");
            break;
        case 'downRequest':
            include_once($_SERVER['DOCUMENT_ROOT']."/App/page/board/downRequest.php");
            break;
        default:
            location('/');
            break;
    }
?>

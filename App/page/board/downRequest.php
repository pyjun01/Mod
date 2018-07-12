<?php 
    $sql = "SELECT * FROM board_file WHERE post_idx='{$board_num}'";
    $file = query($sql)->fetch();
    // echo $file['file_name'];
    header("content-disposition: attachement; filename=\"{$file['file_name']}"."."."{$file['file_extension']}\"");
    readfile($_SERVER['DOCUMENT_ROOT']."/App/page/board/files/{$file['hash']}"."."."{$file['file_extension']}");
    location("/");
    exit;
?>
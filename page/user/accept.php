<?php
  	include_once($_SERVER["DOCUMENT_ROOT"]."/page/connect.php");
    $sql = "update user set agree=1 where idx='{$_GET['idx']}'";
    // echo $sql;
    $db->query($sql);
    echo "<script>alert('회원 수락했습니다.');location.replace('../manager/manager');</script>"; exit;
?>

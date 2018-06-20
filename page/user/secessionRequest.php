<?php
  	include_once("/page/connect.php");
    $sql = "delete from user where idx='{$_GET['idx']}'";
    $db->query($sql);
    echo "<script>alert('탈퇴 시켰습니다.');location.replace('../manager/manager');</script>"; exit;
?>

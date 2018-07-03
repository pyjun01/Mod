<?php
    if(empty($_GET['idx'])){
      Check(true);
    }
    $sql = "DELETE FROm user WHERE idx= '{$_GET['idx']}'";
    query($sql);
    alert('탈퇴 시켰습니다.');
    location('/manager/manager');
?>

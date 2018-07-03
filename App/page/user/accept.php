<?php
    Check('','잘못된 접근입니다.','/');
    if(empty($_GET['idx'])){
        location('/');
    }
    $sql = "UPDATE user SET agree=1 WHERE idx= '{$_GET['idx']}'";
    query($sql);
    alert('회원 수락했습니다.');
    location('/manager/manager');
?>

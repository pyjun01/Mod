<?php
    Check('',"잘못된 접근입니다.");
    if(empty($_POST['board_name']))
        location('/');

    $sql="SELECT * FROM board_list WHERE board_name='{$_POST['board_name']}' AND board_master='{$_SESSION['user']['name']}'";
    $row= $db->query($sql);
    if($row->rowcount()>0){
        alert('중복된 이름입니다.');
        location('/');
    }

    $sql="INSERT INTO board_list SET board_name='{$_POST['board_name']}', board_master='{$_SESSION['user']['name']}'";
    $row=$db->query($sql);
    location('/');
?>
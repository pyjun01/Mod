<?php
    Check('',"잘못된 접근입니다.");
    if(empty($_POST['board_name']))
        location('/');
    $board_name= htmlspecialchars($_POST['board_name']);
    $sql="SELECT * FROM board_list WHERE board_name=:board_name AND board_owner='{$_SESSION['user']['name']}'";
    $row=$db->prepare($sql);
    $row->bindparam(":board_name", $board_name);
    $row->execute();
    $result= $row->rowcount();
    if($result>0){
        alert('중복된 이름입니다.');
        location('/');
    }

    $sql="INSERT INTO board_list SET board_name=:board_name, board_owner='{$_SESSION['user']['name']}', wdate=now()";
    $row=$db->prepare($sql);
    $row->bindparam(":board_name", $board_name);
    $row->execute();
    location('/board');
?>

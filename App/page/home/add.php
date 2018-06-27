<?php
    $db= new PDO("mysql:host=localhost;dbname=mod;charset=utf8","root","");

    if(empty($_POST['user_name']) || empty($_POST['board_name'])){
        echo "false";
        exit();
    }
    $sql="SELECT * FROM board_list WHERE board_name='{$_POST['board_name']}' AND board_master='{$_POST['user_name']}'";
    $row= $db->query($sql);
    if($row->rowcount()>0){
        echo "false";
        exit();
    }

    $sql="INSERT INTO board_list SET board_name='{$_POST['board_name']}', board_master='{$_POST['user_name']}'";
    $row=$db->query($sql);
    if($row)
        echo "true";
    else
        echo "false";
 ?>

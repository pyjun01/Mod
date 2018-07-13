<?php
    if(empty($_POST['idx'])){
        echo "N";
    }
    session_Start();
    $db= new PDO("mysql:host=127.0.0.1; dbname=mod; charset=utf8","root","");
    $board_num=$_POST['idx'];
    $sql="SELECT * FROM comments WHERE idx='{$board_num}'";
    $row= $db->query($sql);
    if($row->rowcount()>0){
        $r=$row->fetch();
        if($_SESSION['user']['name']==$r['name'] || $_SESSION['user']['user_level']==1){
            $sql="DELETE FROM comments WHERE idx= '{$board_num}'";
            $db->query($sql);
            echo "Y";
        }else{
            echo "N";
        }
    }else{
        echo "N";
    }
 ?>

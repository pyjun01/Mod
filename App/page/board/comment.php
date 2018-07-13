<?php
    Check();
    if(empty($_POST['text']) || empty($_POST['idx'])){
        Check(true);
    }
    $text= preg_replace("/\s+/", "", $_POST['text']);
    if(strlen($text)>0){
        $text=htmlspecialchars($_POST['text']);
        $idx=$_POST['idx'];
        $date=date('Y-m-d H:i:s');
        $sql="INSERT INTO comments SET board_idx='{$idx}', name='{$_SESSION['user']['name']}', text=:text, recommend='0', date='{$date}'";
        $row= $db->prepare($sql);
        $row->bindparam(":text", $text);
        $row->execute();
        location();
    }else{
        location();
    }
?>

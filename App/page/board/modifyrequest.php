<?php
    Check();
    if(empty($_POST['title']) || empty($_POST['area'])){
        Check(true);
    }
    $sql= "SELECT * FROM board WHERE idx='{$page}'";
    $row= query($sql);
    if($row->rowcount()>0){
        $sql= "UPDATE board SET title= '{$_POST["title"]}', contents= '{$_POST['area']}' WHERE idx= '{$page}'";
        $row= query($sql);
        location("/{$page}");
    }else{
        location("/");
    }
 ?>

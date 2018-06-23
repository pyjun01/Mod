<?php
    if(empty($_GET['idx'])){
        Check(true);
    }
    $sql="SELECT borrow FROM books WHERE idx='{$_GET['idx']}'";
    $row= query($sql)->fetch();
    if($row[0] == "yes"){
        Check(true);
    }else{
        $sql= "UPDATE books SET borrow='yes', borrower_idx='{$_SESSION['user']['idx']}' WHERE idx='{$_GET['idx']}'";
        echo $sql;
        query($sql);
        location('/library/library');
    }
 ?>

<?php
    if(empty($_GET['idx'])){
        location();
    }
    $sql="SELECT * FROM books WHERE idx='{$_GET['idx']}' AND borrower_idx='{$_SESSION['user']['idx']}'";
    $row= query($sql);
    if($row->rowcount()>0){
        $sql="UPDATE books SET borrow='no', borrower_idx='0' WHERE idx='{$_GET['idx']}'";
        query($sql);
        location();
    }else{

    }
 ?>

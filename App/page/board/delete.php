<?php
    $sql="SELECT * FROM board WHERE idx='{$board_num}'";
    $row= query($sql);
    if($row->rowcount()>0){
        $r=$row->fetch();
        if($_SESSION['user']['name']==$r['board_owner'] || $_SESSION['user']['name']==$r['name']){
            $url= "/board/{$r['board_owner']}/{$r['board_name']}";

            $sql="SELECT * FROM board_file WHERE post_idx='{$board_num}'";
            $row= query($sql);
            if($row->rowcount()>0){
                $sql="DELETE FROM board_file WHERE post_idx='{$board_num}'";
                query($sql);
            }

            $sql="DELETE FROM board WHERE idx= '{$board_num}'";
            query($sql);

            location($url);
        }else{
            location('/');
        }
    }else{
        location('/');
    }
 ?>

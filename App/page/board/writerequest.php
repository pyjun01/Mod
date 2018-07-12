<?php
    $a= explode('/',urldecode($_SERVER['HTTP_REFERER']));
    $owner= $a[count($a)-2];
    $board= $a[count($a)-1];

    // echo $owner.'/'.$board.'<br />';
    $sql= "SELECT * FROM board_list WHERE board_name='{$board}' AND board_owner='{$owner}'";
    $row= query($sql);
    if($row->rowcount()>0){
        $title= htmlspecialchars($_POST['title']);
        $contents= htmlspecialchars($_POST['area']);
        $name= $_SESSION['user']['name'];
        $date= date('Y-m-d H:i:s');
        $sql= "INSERT INTO board SET title=:title, contents=:contents, name=:name, date=:date, hit='0', board_owner=:owner, board_name=:board";
        $row=$db->prepare($sql);
    	$row->bindparam(":title",$title);
    	$row->bindparam(":contents",$contents);
        $row->bindparam(":name",$name);
        $row->bindparam(":date",$date);
        $row->bindparam(":owner",$owner);
        $row->bindparam(":board",$board);
    	$row->execute();

        $sql= "SELECT * FROM board WHERE title='{$title}' AND contents='{$contents}' AND name='{$name}' AND date='{$date}' AND board_owner='{$owner}' AND board_name='{$board}'";
        $row=$db->prepare($sql);
    	$row->bindparam(":title",$title);
    	$row->bindparam(":contents",$contents);
        $row->bindparam(":name",$name);
        $row->bindparam(":date",$date);
        $row->bindparam(":owner",$owner);
        $row->bindparam(":board",$board);
    	$row->execute();

        $result= $row->fetch();
        $post_idx= $result['idx'];
        if(isset($_FILES) && !empty($_FILES['file']['name'])){

            $array_name= explode('.', $_FILES['file']['name']);
            $file_name="";
            foreach ($array_name as $key => $value) {
                if(count($array_name)-1!=$key)
                $file_name= $file_name.$array_name[$key];
            }
            $file_extension= $array_name[count($array_name)-1];
            $hash= hash('sha256', $date.$file_name);


            $dir= $_SERVER["DOCUMENT_ROOT"]."/App/page/board/files/";
            $upload_file = $hash.".".$file_extension;//파일 해쉬 이름

            $upload_dir = $dir.$upload_file;//full dir
            echo $upload_dir;

            if(is_uploaded_file($_FILES['file']['tmp_name'])){// 업로드
                if(!move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir)){// 업로드
                    echo "upload error";
                    exit;
                }
            }
            $sql= "INSERT INTO board_file SET file_name= :file_name, file_extension=:file_extension, hash= '{$hash}', post_idx='{$post_idx}', down=0, date='{$date}'";
            $row=$db->prepare($sql);
        	$row->bindparam(":file_name",$file_name);
            $row->bindparam(":file_extension",$file_extension);
            $row->execute();
            if($row){
                location("/{$post_idx}");
            }else{
                echo "DB upload error";
                exit;
            }
        }
        location("/{$post_idx}");
    }else{
        echo "없는 게시판";
    }

?>

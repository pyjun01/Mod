<?php
    Check();
    if(empty($_POST['title']) || empty($_POST['area'])){
        Check(true);
    }
    $sql= "SELECT * FROM board WHERE idx='{$page}'";
    $row= query($sql);

    if($row->rowcount()>0){
        $title= htmlspecialchars($_POST['title']);
        $contents= htmlspecialchars($_POST['area']);
        $name= $_SESSION['user']['name'];
        $date= date('Y-m-d H:i:s');
        $sql= "UPDATE board SET title= :title, contents= :contents WHERE idx= '{$page}'";
        $row=$db->prepare($sql);
    	$row->bindparam(":title",$title);
    	$row->bindparam(":contents",$contents);
    	$row->execute();
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
            if(is_uploaded_file($_FILES['file']['tmp_name'])){// 업로드
                if(!move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir)){// 업로드
                    echo "upload error";
                    exit;
                }
            }
            $sql = "SELECT * FROM board_file WHERE post_idx='{$page}'";
            $ImgCheck = $db->query($sql);
            if($ImgCheck->rowCount() > 0){
                $sql= "UPDATE board_file SET file_name= :file_name, file_extension= :file_extension, hash='{$hash}' WHERE post_idx= '{$page}'";
                $row=$db->prepare($sql);
            	$row->bindparam(":file_name",$file_name);
                $row->bindparam(":file_extension",$file_extension);
                $row->execute();
            }else{
                $sql= "INSERT INTO board_file SET file_name= :file_name, file_extension=:file_extension, hash= '{$hash}', post_idx='{$page}', down=0, date='{$date}'";
                $row=$db->prepare($sql);
            	$row->bindparam(":file_name",$file_name);
                $row->bindparam(":file_extension",$file_extension);
                $row->execute();
            }
        }else{
            $sql = "DELETE FROM board_file WHERE post_idx='{$page}'";
            query($sql);
        }
        location("/{$page}");
    }else{
        location("/");
    }
 ?>

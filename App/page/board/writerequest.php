<?php
    $a= explode('/',urldecode($_SERVER['HTTP_REFERER']));
    $owner= $a[count($a)-2];
    $board= $a[count($a)-1];

    echo $owner.'/'.$board.'<br />';
    $sql= "SELECT * FROM board_list WHERE board_name='{$board}' AND board_owner='{$owner}'";
    $row= query($sql);

    if($row->rowcount()>0){
        
        $title= $_POST['title'];
        $contents= $_POST['area'];
        $name= $_SESSION['user']['name'];
        $date= date('Y-m-d H:i:s');

        echo "INSERT INTO board SET title='{$title}', content='{$contents}', name='{$name}', date='{$date}', hit='0', board_owner='{$owner}', board_name='{$board}'";
        
        if(isset($_FILES)){
            echo "<br />";


            $sql="SELECT * FROM board WHERE title='{$title}' AND content='{$contents}' AND name='{$name}' AND date='{$date}' AND board_owner='{$owner}' AND board_name='{$board}'";
            echo $sql;
            echo "<br/>";

            $array_name= explode('.', $_FILES['file']['name']);
            $file_name="";
            foreach ($array_name as $key => $value) {
                if(count($array_name)-1!=$key)
                $file_name= $file_name.$array_name[$key];
            }
            $file_extension= $array_name[count($array_name)-1];
            $hash= hash('sha256', $date.$file_name);
            $post_name= $owner.'/'.$board.'/'.$post_idx;
            
            
            $dir= $_SERVER["DOCUMENT_ROOT"]."/App/page/board/files/";
            $upload_file = $hash.".".$file_extension;//파일 해쉬 이름

            $upload_dir = $dir.$upload_file;//full dir
            

            if(is_uploaded_file($_FILES['file']['tmp_name'])){// 업로드
                if(!move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir)){// 업로드
                    echo "upload error";
                    exit;
                }
            }

            /*
                file_name=       $_FILES['file']['name']
                file_extension=  확장자
                hash=            $file_hash
                post_name=       $owner.'/'.$board.'/'.$post_idx
                down=            0
                time=            date("YmdHis", time())
            */
            echo "<br/>";
            
            $sql= "INSERT INTO board_file SET file_name= '{$file_name}', file_extension='{$file_extension}', hash= '{$hash}', post_name='{$post_name}', date=".date('Y-m-d H:i:s').", down=0, time='{$date}'";
            echo $sql;
            // $row= query($sql);
            // if(!$row){
            //     echo "DB upload error";
            //     exit;
            // }
        }
    }else{
        echo "없는 게시판";
    }
    
?>
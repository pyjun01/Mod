<?php
	Check();
	
	if( ($_POST['title'] == "") || ($_POST['area'] == "") ){
		alert('빈칸을 모두 채워주세요.');
		location('/gsp/write');
	}else{
		$sql = "INSERT INTO noticeboard SET title= '{$_POST['title']}', contents= '{$_POST['area']}', name= '{$_SESSION['name']}'";
		$result = query($sql);
    }
	/* 파일 업로드 */
	// if(!$_FILES["file"]["name"]){
	// 	echo "asdsd";
	// }
	if(isset($_FILES)){
		$date = date("YmdHis", time());
		$dir = $_SERVER["DOCUMENT_ROOT"]."/App/page/gsp/files/";
		$name = explode(".",$_FILES['file']['name']);
		$type = $name[count($name)-1];
		$file_hash = $date.$_FILES['file']['name'];
		$file_hash = md5($file_hash);
		$upfile = $dir.$file_hash.".".$type;
		$upload_file = explode("/",$upfile);
		$upload_file = $upload_file[6];
		// echo $upload_file;
		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			if(!move_uploaded_file($_FILES['file']['tmp_name'],$upfile)){
				echo "upload error";
				exit;
			}
		}
		$query = "INSERT INTO file SET name= '{$_FILES['file']['name']}', hash= '{$upload_file}', time='{$date}', down='0'";
		$file_result = query($query);
		if(!$file_result){
			echo "DB upload error";
			exit;
		}
	}
	alert('업로드 성공');
	location('/gsp/gsp');
?>

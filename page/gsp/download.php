<?php
	/*include_once($_SERVER["DOCUMENT_ROOT"]."/page/connect.php");
	$sql = "select * from file where idx = '{$_GET['idx']}'";
	$result  = $db->query($sql);
	if(!$result){
		echo "error";
		exit;
	}
	$data = $result->fetch();

	$dir = $_SERVER["DOCUMENT_ROOT"]."/page/gsp/files/";
	$file_name = $data["name"];
	$file_hash = $data["hash"];
	echo $dir.$file_name;
	if(file_exists($dir.$file_hash)){ // 파일의 존재 유무 검사
		header("Content-Type:Application/octet-stream");
        header("Content-Disposition: attachment; filename=".$file_name);
        header("Content-Transfer-Encoding: binary"); // 이진법 형태임을 명시

		$query = "update file set down={file_down+1} where idx='{$_GET['idx']}'";
		$result = $db->query($query);
		if(!$result){
			echo "update error";
			exit;
		}
	}
	else{
		echo "<script>
			alert('파일이 없습니다');

		</script>";
		exit;
	}*/
	include_once("/page/connect.php");
	$sql = "select name,hash from file where idx = '{$_GET['idx']}'";
	$data  = $db->query($sql)->fetch();

	header("Content-Type: text/html; charset=UTF-8");
	$file = $data["name"];
	header("Cache-Control:private");
	header('Content-Type:application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$file.'"');
 	readfile($_SERVER["DOCUMENT_ROOT"]."/page/gsp/files".$file);

	$sql = "update file set down = down+1 where idx='{$_GET['idx']}'";
	$result = $db->query($sql);
?>

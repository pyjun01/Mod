<?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/page/connect.php");
	$sql = "select * from books where idx='{$_GET['idx']}'";
	$data = $db->query($sql)->fetch();
	echo $data["title"];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
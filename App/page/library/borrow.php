<?php
	$sql = "SELECT * FROM books WHERE idx='{$_GET['idx']}'";
	$data = query($sql)->fetch();
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
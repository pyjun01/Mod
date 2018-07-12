<?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/page/connect.php");
	$result = $db->query("select * from user where id='{$_POST['id']}' ")->fetch();

	if(isset($result[0])){
		echo "false";
	}else{
		echo "success";
	}

?>

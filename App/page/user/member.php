<?php
	if(empty($_POST['id'])){
		Check(true);
	}
	$sql= "SELECT * FROM user WHERE id= '{$_POST['id']}'";
	$result= query($sql)->fetch();

	if(isset($result[0])){
		echo "false";
	}else{
		echo "success";
	}
?>

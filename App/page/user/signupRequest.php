<?php
	if(empty($_POST['id'])){
		alert('잘못된 접근입니다.');
		location('/');
	}

	$sql = "INSERT INTO user SET name= :name, grade= :grade, id= :id, pw= :pw, phone_num= :num";
	$row=$db->prepare($sql);
	$row->bindparam(":name",$_POST['name']);
	$row->bindparam(":grade",$_POST['grade']);
	$row->bindparam(":id",$_POST['id']);
	$row->bindparam(":pw",$_POST['pw']);
	$row->bindparam(":num",$_POST['num']);

	$result = $row->execute();
	
	alert('회원가입 되었습니다. 관리자 승인후 활동하실 수 있습니다.');
	location('/');
?>

<?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/page/connect.php");

	if(empty($_POST['id'])){
		echo "<script>alert('잘못된 접근입니다.');location.replace('/');</script>";
		exit;
	}

	$sql = "select * from user where id = :id &&  pw = :pw";
	$row=$db->prepare($sql);
	$row->bindparam(":id",$_POST['id']);
	$row->bindparam(":pw",$_POST['pw']);
	$row->execute();

 	$member = $row->fetch();

 	if($member['id'] == ""){
		echo "<script>alert('아이디나 비밀번호가 잘못되었습니다.');location.replace('/');</script>"; exit;
	}
		if($_POST["id"] == $member["id"] && $_POST["pw"] == $member["pw"]){
			if($member["agree"] == 0) {
				echo "<script>alert('회원 가입 승인 후 활동 하실 수 있습니다.');location.replace('/');</script>";
				return false;
			}
			$_SESSION["id"] = $_POST["id"];
			$_SESSION["pw"] = $_POST["pw"];
			$_SESSION["grade"] = $member["grade"];
			$_SESSION["name"] = $member["name"];
			$_SESSION["num"] = $member["phone_num"];
			echo "<script>alert('로그인 완료.');location.replace('/');</script>";
		}else{
			# failed with id and password
			echo "<script>alert('아이디나 비밀번호가 잘못되었습니다.');location.replace('/');</script>";
		}

?>

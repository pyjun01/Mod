<?php
	Check('',"잘못된 접근입니다.",'/');
	session_destroy();
	alert('로그아웃 되었습니다.');
	location('/');
?>

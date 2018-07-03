<?php
	Check();
	if(empty($_GET['idx'])){
		Check(true);
	}
	$sql = "DELETE FROM noticeboard WHERE idx = '{$_GET['idx']}'";
	query($sql);
	alert('글이 삭제 되었습니다.');
	location('/gsp/gsp');
?>

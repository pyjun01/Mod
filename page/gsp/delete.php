<?php
	include_once("/page/connect.php");
	$sql = "delete from noticeboard where idx = '{$_GET['idx']}'";
	$db->query($sql);
	echo "<script>
			alert('글이 삭제 되었습니다.');
			location='/gsp/gsp';
		</script>";
?>

<?php
	include_once("/page/connect.php");
	$sql = "update noticeboard set title ='{$_POST["title"]}', contents = '{$_POST['area']}' where idx='{$_GET['idx']}'";
	$data = $db->query($sql);
	echo "<script>location='/gsp/gsp'</script>";
?>

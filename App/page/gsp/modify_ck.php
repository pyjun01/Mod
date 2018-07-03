<?php
	Check();
	if(empty($_GET['idx'])){
		Check(true);
	}
	$sql = "UPDATE noticeboard SET title= '{$_POST["title"]}', contents= '{$_POST['area']}' WHERE idx= '{$_GET['idx']}'";
	$data = query($sql);
	location("/gsp/view?idx=".$_GET['idx']);
?>

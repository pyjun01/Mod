<?php
	unset($_SESSION['id']);
	unset($_SESSION['name']);
	unset($_SESSION['grade']);
	unset($_SESSION['pw']);
  unset($_SESSION['num']);
	echo "<script>
			alert('로그아웃 되었습니다.');
			location='/'
		</script>";
?>

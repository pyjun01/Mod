<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/page/connect.php");
if(empty($_SESSION['id'])){echo "<script>alert('잘못된 접근입니다.');location.replace('/');</script>";}
$sql = "select * from noticeboard where name='{$_SESSION["name"]}'";
$result = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<section class="mp_section">
		<article class="mp_main">
			<div class="mp_header">
				<p><span class="amp"><?=$_SESSION["name"]?> </span>님의 정보입니다</p>
			</div>
			<div class="mp_content">
				<div class="infor">
					<div class="infor_header"><p>기본정보</p></div>
					<div class="infor_content">
						<p>이름: <?=$_SESSION["name"]?></p>
						<p>학번: <?=$_SESSION["grade"]?></p>
						<p>전화번호: <?=$_SESSION["num"]?></p>
					</div>
				</div>
				<div class="infor">
					<div class="infor_header"><p>최근 내가 쓴 글</p></div>
					<ul class="infor_content">
					<?php while($data = $result->fetch()){?>
						<li><a href="/gsp/view?idx=<?=$data["idx"]?>"><?=$data["title"]?></a></li>
					<?php } ?>
					</ul>
				</div>
				<div class="infor">
					<div class="infor_header"><p>내가 대출한 도서 목록</p></div>
					<div class="infor_content"></div>
				</div>
				<div class="infor">
					<div class="infor_header"><p></p></div>
					<div class="infor_content"></div>
				</div>
			</div>
		</article>
	</section>
</body>
</html>

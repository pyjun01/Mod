<?php
	Check('',"잘못된 접근입니다.");
	$sql= "SELECT * FROM noticeboard WHERE name='{$_SESSION["name"]}'";
	$result= query($sql);
?>
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
					<div class="infor_content">
						<?php
						  $sql="SELECT book_name FROM books WHERE borrower_idx='{$_SESSION['user']['idx']}'";
						  $row= query($sql);
						  foreach ($row as $key => $value) {
						  	echo "<a href='#'>{$value[0]}</a>";
						  }
						?>
					</div>
				</div>
				<!-- <div class="infor">
					<div class="infor_header"><p></p></div>
					<div class="infor_content"></div>
				</div> -->
				<a href="/home/add" id="board_add" class="waves-effect waves-light btn" style="margin-left:15px;">내 게시판 증설</a>
			</div>
		</article>
	</section>

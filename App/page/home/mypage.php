<?php
	Check('',"잘못된 접근입니다.");
	$sql= "SELECT * FROM board WHERE name='{$_SESSION['user']["name"]}'";
	$row= query($sql);
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
					<?php foreach ($row as $key => $value):?>
						<li><a href="/<?=$value["idx"]?>"><?=$value["title"]?></a></li>
					<?php endforeach; ?>
					</ul>
				</div>
				<div class="infor">
					<div class="infor_header"><p>내가 대출한 도서 목록</p></div>
					<div class="infor_content">
						<?php
						  $sql="SELECT * FROM books WHERE borrower_idx='{$_SESSION['user']['idx']}'";
						  $row= query($sql);
						  foreach ($row as $key => $value) {
						  	echo "<p>{$value['book_name']} <a href='/library/return?idx={$value['idx']}' class='book_return'>반납하기</a></p>";
						  }
						?>
					</div>
				</div>
				<!-- <div class="infor">
					<div class="infor_header"><p></p></div>
					<div class="infor_content"></div>
				</div> -->
				<?php if($_SESSION['user']['user_level']==1): ?>
					<a href="/home/add" id="board_add" class="waves-effect waves-light btn" style="margin-left:15px;">내 게시판 증설</a>
				<?php endif; ?>
			</div>
		</article>
	</section>

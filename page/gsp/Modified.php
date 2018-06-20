<?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/page/connect.php");
	$sql = "select * from noticeboard where idx = '{$_GET['idx']}'";
	$data = $db->query($sql)->fetch();
?>
<section class="board write_board">
	<div class="write_main">
		<p>글 수정하기 <br> <span class="amp">글을 자유롭게 작성하세요</span></p>
		<article class="main_write">
			<form action="/gsp/modify_ck?idx=<?=$data['idx']?>" method="post" enctype="multipart/form-data" id="write_form">
				<fieldset>
					<legend>게시판 글쓰기</legend>
					<div class="field_header input-field col s6">
						<input id="last_name" type="text" class="validate id" name="title" value="<?=$data['title'];?>">
          				<label for="last_name">제목</label>
					</div>
					<div class="tx_area">
						<textarea  required="required" name="area"><?=$data['contents']?></textarea>
					</div>
					<div class="field_footer">
						<div class="submits">
							<input type="file" value="파일업로드" name="file">
							<button type="submit" class="waves-effect waves-light btn">수정</button>
						</div>
					</div>
				</fieldset>
			</form>
		</article>
	</div>
</section>

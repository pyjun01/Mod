<?php
	Check();
?>
<section class="board write_board">
	<div class="write_main">
		<p>게시판 글쓰기 <br> <span class="amp">글을 자유롭게 작성하세요</span></p>
		<article class="main_write">
			<form action="writeRequest" method="post" enctype="multipart/form-data" id="write_form">
				<fieldset>
					<legend>게시판 글쓰기</legend>
					<div class="field_header input-field col s6">
						<input id="last_name" type="text" class="validate id" name="title" required autofocus>
          				<label for="last_name">제목</label>
					</div>
					<div class="tx_area">
						<textarea  required="required" name="area"></textarea>
					</div>
					<div class="field_footer">
						<div class="submits">
							<input type="file" value="파일업로드" name="file">
							<button type="submit" class="waves-effect waves-light btn" 
							>글쓰기</button>
							<!-- in submit btn-> onclick="write_submit()" -->
						</div>
					</div>
				</fieldset>
			</form>
		</article>
	</div>
</section>
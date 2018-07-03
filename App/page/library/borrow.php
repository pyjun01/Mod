<?php
	if(empty($_GET['idx'])){
		echo "404<br />잘못된 접근";
	}else{
		$sql = "SELECT * FROM books WHERE idx='{$_GET['idx']}'";
		$row = query($sql);
		if($row->rowcount()<=0){
			location('/library/library');
		}
		$data= $row->fetch();
		// echo $data["book_name"]."<br />";
		// if($data['borrow']=='yes'){
		// 	echo "이미 빌려감";
		// }else{
		// 	echo "빌리기!";
		// }
	}
?>
<div class="library_wrap">

	<a href="/library/library" class="move_list"><span class="amp">&larr;</span> list</a>

	<div id="intro_wrap">
		<div class="intro_book">

			<div class="book_img_box">
				<img src="/common/images/<?= $data['img'] ?>" />
			</div>

			<div class="book_text_box">
				<p class="borrow_name">
					<?= $data['book_name'] ?>
				</p>
				<ul class="borrow_info browser-default">
					<li><?= $data['author'] ?> 저</li>
					<li><?= $data['publisher'] ?></li>
				</ul>
				<?php
					if($data['borrow']=='yes'):
				?>
				<button type="button" name="button" class="waves-effect waves-light btn">빌리기</button>
				<?php
					else:
				?>
				<button type="button" name="button" class="btn">
					<p>@@@님이 빌려가셨습니다.</p>
					<p>2018-06-21</p>
				</button>
				<?php
					endif;
				?>
			</div>

		</div>
	</div>
</div>
<!-- <div class="books_wrap">
	<ul>
	</ul>
</div> -->

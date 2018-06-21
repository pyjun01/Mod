<?php
	Check('','잘못된 접근입니다.');
	$sql= "SELECT * FROM books ORDER BY idx DESC";
	$result= query($sql);
?>
<!-- YJ -->
<script>
	function _Make_li(v){
		var title= v.title;
		var idx= v.idx;
		var intro= v.intro_text;
		var src= v.img_src;
		//sql 넣을려고
		// console.log(`INSERT INTO books SET book_name="${title}", borrow="no", author="${v.author}", publisher="${v.publisher}", img="${src}"`);
		return `<li>
			<div class="borrow_list">
				<div class="hide_list">
					<div class="Click_link"><a href="/library/borrow?idx=${idx}">빌리기!</a></div>
				</div>
				<div class="list_img_wrap">
					<div class="list_img" style="background:url(${src}) center; background-size: 100% 100%;"></div>
				</div>
				<div class="books_intro_text">
					<h2>${title}</h2>
					<P>${intro}</P>
				</div>
			</div>
		</li>`;
	}
	var book_list="";
	bookslist.data.forEach(
		(v,n) =>{
			book_list+= _Make_li(v);
		}
	);
	$(document).ready(function(){
		$('.books_wrap>ul').html(book_list);
	});
</script>
<!-- //YJ -->
<div class="library_wrap">
	<p class="library_intro">
		모드 도서관<br>
		<span>
			<span class="amp">모드</span>에서 필요한 책을 빌려 보세요.
		</span>
	</p>

</div>
<div class="books_wrap">
	<ul>
	</ul>
</div>
<ul>

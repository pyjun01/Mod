<script>
	function _Make_li(v, yn){
		var title= v.title;
		var idx= v.idx;
		var intro= v.intro_text;
		var src= v.img_src;
		var href;
		if(yn=="yes"){
			href= "<span>이미 대여됨</span>";
		}else{
			href= "<a href='/library/action?idx="+idx+"'>빌리기</a>";
		}
		return `<li class='list_${idx}'>
		<div class="borrow_list">
		<div class="hide_list">
		<div class="Click_link">${href}</div>
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
</script>

<?php
	SessionCheck();
	// Check('','잘못된 접근입니다.');
	$sql= "SELECT * FROM books ORDER BY idx ASC";
	$row= query($sql);
	foreach ($row as $key => $value) {
		$list= "{$value['borrow']}";
?>

<script>
		book_list+= _Make_li(bookslist.data[<?= $key ?>], '<?= $list ?>');
</script>

<?php
    }
?>

<!-- YJ -->
<script>
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

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
				<div id="board_add_form">
					<input type="text" name="board_name" placeholder="게시판 이름" id="board_name" style="width:400px;" />
					<button type="button" id="board_add" class="waves-effect waves-light btn" style="margin-left:15px;">내 게시판 증설</button>
				</div>
				<script>
				function _Animate(t) {
					if(t[0].id=='error_icon'){
						$('#board_name').css({'transition':'unset'});
						$('#board_name').css({'border':'1px solid #FF3333'});
						setTimeout(function(){
							$('#board_name').css({'border':''});
							$('#board_name').css({'transition':''});
							$('#board_name').focus();
						},1300);
					}
					t.css({
						width: 0,
						height: 0,
						left: $(window).width() / 2+ "px",
						top: $(window).height() / 2+ "px"
					});
					t.animate({
						width:'250px',
						height:'250px',
						left: parseInt(t.css('left'), 10) - 125 +"px",
						top: parseInt(t.css('top'), 10) - 125 +"px"
					}, 500);
					setTimeout(function (){
						t.animate({top: parseInt(t.css('top'), 10)+10+"px" },100);
						t.animate({top: '-400px'},200);
						setTimeout(function () {
							t.remove();
						},300);
					},520);
				}
				$(window).resize(function() {
					$('#pop_icon').css({
						left: ($(window).width()-$('#pop_icon').width()) / 2+ "px",
						top: ($(window).height()-$('#pop_icon').height()) / 2+ "px",
					});
				});
				$('#board_add').on("click",function (){
					if($('.pop_icon').length<1){
						var v=$("#board_name").val();
						$.ajax({
					        url: "../App/page/home/add.php",
					        type: "post",
					        data: {
								board_name: v,
								user_name: '<?= $_SESSION['user']['name'] ?>'
							},
					        dataType: "text",
					        success: function(data) {
								if(data=="true"){
									$('body').prepend("<img src='../common/images/success.png' alt='success' class='pop_icon' id='success_icon'/>");
									_Animate($('#success_icon'));
								}else{
									$('body').prepend("<img src='../common/images/error.png' alt='error' class='pop_icon' id='error_icon' />");
									_Animate($('#error_icon'));
								}
							},
							error: function(d) {
								alert('error: '+d);
							}
						});
					}
				});
				</script>
			</div>
		</article>
	</section>

<?php
	if(empty($board_num))
		Check(true);
	$sql= "SELECT * FROM board WHERE idx='{$board_num}'";
	$row= query($sql)->fetch();
	$owner= $row['board_owner'];

	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if(!$pageWasRefreshed) {
		$sql = "UPDATE board SET hit = hit+1 WHERE idx = '{$board_num}'";
    	query($sql);
	}

    $sql= "SELECT * FROM board_file WHERE post_idx='{$board_num}'";
    $file= query($sql);
    if($file->rowcount()>0){
		$img = $file->fetch();
		// print_r($img);
	}
	$fileCheck = false;
?>
<section class="view_section">
	<article class="view_main mains">
		<div class="view_header view_box">
			<p><?=$row['title'];?><br> <span class="amp">작성자 : <?=$row['name'];?></span></p>
		</div>
		<div class="view_content not_view_box">
			<div class="view_box_content">
				<p><?=$row["contents"]?></p>
			</div>
			<?php if(isset($img)): ?>

			<div class='files_box'>
				<?php
				//file= img
				$file_Name= $img['file_name'].".".$img['file_extension'];
				if(isset($img) && $img['file_extension'] == 'jpg' || $img['file_extension'] == 'png' || $img['file_extension'] == 'gif'):?>
				<p>
					<label>
						<input type="checkbox" class='img_check'>
						<span>첨부된 이미지 보기</span>
						<img src='./App/page/board/files/<?=$img['hash'].".".$img['file_extension']?>' alt="<?=$img['file_name']?>" class='board_img'>
					</label>
				</p>
				<?php
				endif;
				//file= not img
				if(isset($img) && $img['file_extension'] != 'jpg' || $img['file_extension'] != 'png' || $img['file_extension'] != 'gif'):
					$fileCheck = true;
				?>
				<label>
					<input type="checkbox" class='img_check'>
					<span>첨부된 파일 보기</span>
					<span class='file_icon'>
						<img src="/common/images/file_icon.png" alt="file_icon.png" />
						<pre><a href="/downRequest/<?=$board_num?>"><?= $file_Name ?></a></pre>
					</span>
				</label>
				<?php endif;?>
			</div>
			<?php endif;?>
			<div class="gsp_view_box_footer">
				<ul class="footer_ui">
				<?php
					if($fileCheck){
						echo "<li><a href='/downRequest/{$board_num}' class='waves-effect waves-light btn'>첨부 파일 다운로드</a></li>";
					}
					if(isset($_SESSION['user'])){
						if($row["name"]==$_SESSION['user']["name"]){
							echo "<li><a href='/modify/{$row["idx"]}' class='waves-effect waves-light btn'>수정</a></li>
                            <li><a href='/delete/{$row["idx"]}' class='waves-effect waves-light btn'>삭제</a></li>";
                        }else if($row["board_owner"]==$_SESSION['user']['name']){
                            echo "<li><a href='/delete/{$row["idx"]}' class='waves-effect waves-light btn'>삭제</a></li>";
                        }
					}
				?>
				</ul>
			</div>
		</div>
		<div class="view_footer view_box ">
			<div class="comment_title">
				<?php
					$sql= "SELECT * FROM comments WHERE board_idx='{$board_num}' ORDER BY idx DESC";
					$row=query($sql);
					$length= $row->rowcount();
					echo "<b class='amp'>{$length}</b>개의 댓글"
				?>
			</div>
			<div class="comment_input">
				<form class="comment_form" action=""  method="POST">
					<div class="formwrite">
						<div class="Name">
							<?= $_SESSION['user']['name'] ?>
						</div>
						<textarea class="text" name="text" rows="8" cols="80" placeholder="주제와 무관한 댓글, 타인의 권리를 침해하거나 명예를 훼손하는 게시물은 제재를 받을 수 있습니다." maxlength="300"></textarea>
					</div>
					<button type="submit" name="button" id="comment_submit">등록</button>
					<input type="hidden" name="action" value="comment" />
					<input id="comment_hidden" name='idx' type='hidden' value='<?= $board_num ?>'/>
				</form>
				<script>
				</script>
			</div>
			<div class="coment_lists">
				<ul>
					<!-- ul border top right left -->
					<!-- li border bottom  -->
					<?php

						foreach ($row as $key => $value) {
							echo "<li class='comments'>";
								echo "<div class='comments_head'>";
								echo "
								<span class='comment_name'>{$value['name']}</span>
								<span class='comment_date'>{$value['date']}</span>
								";
								if($_SESSION['user']['name']==$value['name'] || $_SESSION['user']['name']==$owner)
									echo "<a class='comment_delete' href='{$value['idx']}'>삭제</a>";
								echo "</div>";
								echo "<div class='comments_text'>";
								echo "{$value['text']}";
								echo "</div>";
							echo "</li>";
						}
					?>
				</ul>
			</div>
		</div>
		<script>
			$(".comment_delete").on("click",function (e){
				e.preventDefault();
				if(confirm('정말로 삭제하시겠습니까?')){
					var num= $(this).attr('href');
					var tbtn= $(this);
					$.ajax({
						url:'./App/page/board/c_delete.php',
						method:'POST',
						data:{
							idx:num
						},
						dataType:'text',
						success: function (r){
							if(r=="Y"){
								alert('삭제가 완료되었습니다.');
								tbtn.parents('.comments').remove();
							}
						}
					});
				}
			});
		</script>
	</article>
</section>

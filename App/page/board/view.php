<?php
	if(empty($board_num))
		Check(true);
	$sql= "SELECT * FROM board WHERE idx='{$board_num}'";
	$row= query($sql)->fetch();

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
			<?php if(isset($img)){?>
			<div class='files_box'>
				<?php

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

				if(isset($img) && $img['file_extension'] != 'jpg' || $img['file_extension'] != 'png' || $img['file_extension'] != 'gif'){
					$fileCheck = true;
				?>
<p>
<label>
	<input type="checkbox" class='img_check'>
	<span>첨부된 파일 보기</span>
	<span class='file_icon'>
		<img src="/common/images/file_icon.png" alt="file_icon.png">
		<a href="/downRequest/<?=$board_num?>"><xmp><?=$img['file_name'].".".$img['file_extension']?></xmp></a>
	</span>
</label>
</p>

				<?php }?>
			</div>
				<?php }?>
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
		<div class="view_footer view_box "></div>
	</article>
</section>

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

    }
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
			<div class="gsp_view_box_footer">
				<ul class="footer_ui">
				<?php
					if(isset($_SESSION['user'])){
						if($row["name"]==$_SESSION['user']["name"]){
							echo "<li><a href='/modify/{$row["idx"]}' class='waves-effect waves-light btn'>수정</a></li>
                            <li><a href='/delete/{$row["idx"]}' class='waves-effect waves-light btn'>삭제</a></li>";
                        }else if($row["board_owner"]==$_SESSION['user']['name']){
                            echo "<li><a href='/modify/{$row["idx"]}' class='waves-effect waves-light btn'>삭제</a></li>";
                        }
					}
				?>
				</ul>
			</div>
		</div>
		<div class="view_footer view_box "></div>
	</article>
</section>

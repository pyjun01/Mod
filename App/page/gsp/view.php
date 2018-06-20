<?php
	if(empty($_GET['idx']))
		Check(true);
	$sql = "SELECT * FROM noticeboard WHERE idx= '{$_GET['idx']}'";
	$data = $db->query($sql)->fetch();

	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
	if(!$pageWasRefreshed) {
		$hit = "UPDATE noticeboard SET hit = hit+1 WHERE idx = '{$_GET['idx']}'";
    	query($hit);
	}

	$file_sql = "SELECT * FROM file ORDER BY idx DESC";
	$file_data = query($file_sql)->fetch();
?>
<section class="view_section">
	<article class="view_main mains">
		<div class="view_header view_box">
			<p><?=$data['title'];?><br> <span class="amp">작성자 : <?=$data['name'];?></span></p>
		</div>
		<div class="view_content not_view_box">
			<div class="view_box_content">
				<p><?=$data["contents"]?></p>
			</div>
			<div class="gsp_view_box_footer">
				<ul class="footer_ui">

				<?php
					if(isset($_SESSION["id"])){
						if($data["name"]== $_SESSION["name"]){
				?>
							<li><a href="/gsp/Modified?idx=<?=$data["idx"]?>" class="waves-effect waves-light btn">수정</a></li>
							<li><a href="/gsp/delete?idx=<?=$data["idx"]?>" class="waves-effect waves-light btn">삭제</a></li>
				<?php 
						}
					}
				?>

				</ul>
			</div>
		</div>
		<div class="view_footer view_box "></div>
	</article>
</section>

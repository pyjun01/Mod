<?php
	if(empty($_GET['idx'])){
		location('/');
	}
	$sql = "SELECT * FROM notice WHERE idx= '{$_GET['idx']}'";
	$data = query($sql)->fetch();

	$us_sql= "SELECT * FROM user ORDER BY idx DESC";
	$us_data= query($us_sql)->fetch();
?>
<section class="view_section">
	<article class="view_main mains">
		<div class="view_header view_box">
			<p><?=$data['title'];?><br> <span class="amp"><?=$data['date']?></span></p>
		</div>
		<div class="view_content not_view_box">
			<div class="view_box_content">
				<p><?=$data["content"]?></p>
			</div>
		</div>
	</article>
</section>

<?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/page/connect.php");
	$sql = "select * from notice where idx = '{$_GET['idx']}'";
	$result = $db->query($sql);
	$data = $result->fetch();

	$us_sql = "select * from user order by idx desc";
	$us_data = $db->query($us_sql)->fetch();
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

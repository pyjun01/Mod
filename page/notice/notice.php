<?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/page/connect.php");
	$sql = "select * from notice order by idx desc";
	$result = $db->query($sql);
?>
<section class="notice_section">
	<article class="notice_main mains">
		<div class="notice_header notice_box">
			<p>공지사항<br><span class="amp">모드 공지사항입니다.</span></p>
		</div>
		<table class="striped centered">
              <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>날짜</th>
                    <th>조회</th>
                </tr>
              </thead>
              <tbody>
              	<?php while($data = $result->fetch()) {?>
                <tr>
                  <td><?=$data["idx"]?></td>
                  <td><a href="/notice/notice_view?idx=<?=$data["idx"]?>"><?=$data["title"]?></a></td>
                  <td><?php $time =  explode(" ", $data["date"]); echo $time[0]; ?></td>
                  <td><?=$data["hit"]?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>

		<div class="notice_footer notice_box"></div>
	</article>
</section>

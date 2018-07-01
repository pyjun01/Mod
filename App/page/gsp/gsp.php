<?php
	if($dir!='gsp'){
		if($page=='board'){
			$name="게시판 리스트";
		}else{
			$sql="SELECT * FROM board_list WHERE board_master='{$page}'";
			$row=query($sql);
			if($row->rowcount()>1){
				$name= $page." 게시판";
			}
			if($board==null){
				echo "a";
			}else{
				echo $board;
			}
		}
	}else{
		$sql = "SELECT * FROM noticeboard ORDER BY idx DESC";
		$result = query($sql);
		$name= "모드 게시판";
	}
?>
<section class="board_section">
	<article class="board_main mains">
		<div class="board_header board_box">
			<p><?= $name ?><br><span class="amp">자유롭게 글을 써보세요!</span></p>
		</div>
		<table class="striped centered">
			<thead>
				<tr>
					<th>번호</th>
					<th>제목</th>
					<th>글쓴이</th>
					<th>날짜</th>
					<th>조회</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($result as $key => $data): ?>
					<tr>
						<td><?=$data["idx"]?></td>
						<td>
							<a href="/gsp/view?idx=<?=$data["idx"]?>" class="title">
								<?=$data["title"]?>
							</a>
						</td>
						<td><?=$data["name"]?></td>
						<td>
							<?php
								$time =  explode(" ", $data["date"]);
								echo $time[0];
							?>
						</td>
						<td><?=$data["hit"]?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
        </table>
		<div class="board_footer board_box ">
			<a href="/gsp/write" class="waves-effect waves-light btn">글쓰기</a>
		</div>
	</article>
</section>

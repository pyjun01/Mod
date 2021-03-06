<section class="board_section">
	<article class="board_main mains">
		<div class="board_header board_box">
			<?php
				if($page=='board'&&$board==null){// $dir만 보드고 나머지 없으면
					
				?>
				<table class='highlight centered'>
					<thead>
						<tr>
							<th>번호</th>
							<th>담당자</th>
							<th>제목</th>
							<th>날짜</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$i = 1;
							$sql= "SELECT * FROM board_list ORDER BY idx DESC";
							$row= query($sql);
							foreach ($row as $key => $value) {?>
							<tr>
								<td><?=$i?></td>
								<td><?=$value['board_owner']?></td>
								<td>
								<?php 									
									echo "<a href='/board/{$value['board_owner']}/{$value['board_name']}'>{$value['board_name']}</a>";									
								?>
								</td>
								<td><?=$value['wdate']?></td>
							</tr>
							<?php 
							$i++;
							}		
						?>						
					</tbody>
				</table>
				<?php 
				}else if($page!='board'&&$board==null){// 관리자 이름만 있으면
					$sql= "SELECT * FROM user WHERE user_level=1 AND name='{$page}'";//관리자인지 찾아봄
					$row= query($sql);
					if($row->rowcount()>0){//관리자면
						echo "<p>{$page} 게시판 리스트</p>";
						$sql= "SELECT * FROM board_list WHERE board_owner='{$page}'";
						$row= query($sql);
						echo "<ul>";
						foreach ($row as $key => $value) {
							echo "<li><a href='/board/{$page}/{$value['board_name']}'>{$value['board_name']}</a></li>";
						}
						echo "</ul>";
					}else{//아니면
						location('/');
					}
				}else if($page!='board'&&$board!=null){// 게시판이름까지 있으면
					$sql= "SELECT * FROM board_list WHERE board_owner='{$page}' AND board_name='{$board}'";
					$row =query($sql);
					if($row->rowcount()>0){
			?>
				<div class="board_header board_box">
					<a href="/board">게시판 리스트로</a>
					<p><?= $board ?> 게시판<br><span class="amp">자유롭게 글을 써보세요!</span></p>
				</div>
			</div>
				<?php
					$sql= "SELECT * FROM board WHERE board_owner='{$page}' AND board_name='{$board}'";
					$row= query($sql);
					echo "<table class='striped centered'>
							<thead>
								<tr>
									<th>번호</th>
									<th>제목</th>
									<th>글쓴이</th>
									<th>날짜</th>
									<th>조회</th>
								</tr>
							</thead>
						<tbody>";
						$i = 1;
					foreach ($row as $key => $value):
					$time= explode(" ", $value["date"]);
					echo "<tr>
							<td>{$i}</td>
							<td><a href='/{$value['idx']}' class='title'>{$value['title']}</a></td>
							<td>{$value['name']}</td>
							<td>{$time[0]}</td>
							<td>{$value['hit']}</td>
						</tr>";
						$i++;
					endforeach;
					?>
					</tbody>
						</table>
						<?php if(isset($_SESSION['id'])){?>
						<div class='board_footer board_box'><a href='/write/<?=$page?>/<?=$board?>' class='waves-effect waves-light btn'>글쓰기</a></div>
						<?php }?>
					<?php
					}else{
						// location('/');
					}
				}
			?>
	</article>
</section>
<script src="/common/js/board.js"></script>

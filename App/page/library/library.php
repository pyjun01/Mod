<?php
	Check('','잘못된 접근입니다.');

	$sql= "SELECT * FROm books ORDER BY idx DESC";
	$result= query($sql);
?>
<div class="library_wrap">
	<p class="library_intro">
		모드 도서관<br>
		<span>
			<span class="amp">모드</span>에서 필요한 책을 빌려 보세요.
		</span>
	</p>

</div>
<div class="books_wrap">
	<ul>
		<li>
			<div class="borrow_list">
				<div class="hide_list">
					<div class="Click_link"><a href="#">빌리기!</a></div>
				</div>
				<div class="list_img_wrap">
					<div class="list_img" style="background:url('../common/images/html.jpg') center; background-size: 100% 100%;"></div>
				</div>
				<div class="books_intro_text">
					<h2>Html5 & Css3 웹 표준의 정석</h2>
					<P>Html과 css3의 기본적인 웹 표준을 배울 수 있다.</P>
				</div>
			</div>
		</li>
		<li>
			<div class="borrow_list">
				<div class="hide_list">
					<div class="Click_link"><a href="#">빌리기!</a></div>
				</div>
				<div class="list_img_wrap">
					<div class="list_img" style="background:url('../common/images/js.jpg') center; background-size: 100% 100%;"></div>
				</div>
				<div class="books_intro_text">
					<h2>java script + jquery 입문</h2>
					<P>java script과 jquery의 입문자를 위한 책</P>
				</div>
			</div>
		</li>
		<li>
			<div class="borrow_list">
				<div class="hide_list">
					<div class="Click_link"><a href="#">빌리기!</a></div>
				</div>
				<div class="list_img_wrap">
					<div class="list_img" style="background:url('../common/images/angjs.jpg') center; background-size: 100% 100%;"></div>
				</div>
				<div class="books_intro_text">
					<h2>Angular js 인 액션</h2>
					<P>js 프레임 워크 중 하나인 Angular js에 대핸 책</P>
				</div>
			</div>
		</li>
		<li>
			<div class="borrow_list">
				<div class="hide_list">
					<div class="Click_link"><a href="#">빌리기!</a></div>
				</div>
				<div class="list_img_wrap">
					<div class="list_img" style="background:url('../common/images/spring.jpg') center; background-size: 100% 100%;"></div>
				</div>
				<div class="books_intro_text">
					<h2>토비의 스프링</h2>
					<P>java의 프레임워크인 spring를 배울 수 있는 책</P>
				</div>
			</div>
		</li>
		<li>
			<div class="borrow_list">
				<div class="hide_list">
					<div class="Click_link"><a href="#">빌리기!</a></div>
				</div>
				<div class="list_img_wrap">
					<div class="list_img" style="background:url('../common/images/jquery1.jpg') center; background-size: 100% 100%;"></div>
				</div>
				<div class="books_intro_text">
					<h2>jquery 완전 정복 시리즈1</h2>
					<P>jquery 완전 정복 시리즈 1권</P>
				</div>
			</div>
		</li>
		<li>
			<div class="borrow_list">
				<div class="hide_list">
					<div class="Click_link"><a href="#">빌리기!</a></div>
				</div>
				<div class="list_img_wrap">
					<div class="list_img" style="background:url('../common/images/jquery2.jpg') center; background-size: 100% 100%;"></div>
				</div>
				<div class="books_intro_text">
					<h2>jquery 완전 정복 시리즈2</h2>
					<P>jquery 완전 정복 시리즈 2권</P>
				</div>
			</div>
		</li>
		<li>
			<div class="borrow_list">
				<div class="hide_list">
					<div class="Click_link"><a href="#">빌리기!</a></div>
				</div>
				<div class="list_img_wrap">
					<div class="list_img" style="background:url('../common/images/jquery3.jpg') center; background-size: 100% 100%;"></div>
				</div>
				<div class="books_intro_text">
					<h2>jquery 완전 정복 시리즈3</h2>
					<P>jquery 완전 정복 시리즈 3권</P>
				</div>
			</div>
		</li>
		<li>
			<div class="borrow_list">
				<div class="hide_list">
					<div class="Click_link"><a href="#">빌리기!</a></div>
				</div>
				<div class="list_img_wrap">
					<div class="list_img" style="background:url('../common/images/php.jpg') center; background-size: 100% 100%;"></div>
				</div>
				<div class="books_intro_text">
					<h2>Modern php</h2>
					<P>php를 php7 최신 문법으로 배울 수 있다.</P>
				</div>
			</div>
		</li>
	</ul>
</div>
<ul>

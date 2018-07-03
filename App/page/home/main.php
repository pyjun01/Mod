<section>
    <article class="main_slide">
        <ul class="slide_form">
            <li class="slide_1">
                <h2>MASTER OF DESIGN</h2>
                <h3>GREAT WEB DESIGN</h3>
                <p class="discript">모드와 함께하는 웹 디자인</p>
                <?php
                  if(isset($_SESSION['id'])){
                    $select_level_sql = "select * from user where id = '{$_SESSION['id']}'";
                    $user_level = $db->query($select_level_sql)->fetch();
                    $u_level = $user_level['user_level'];
                    if($u_level == 1){
                      $_SESSION['u_level'] = $u_level;
                    }
                  }else{
                    $u_level = 0;
                  }
                ?>
              <?php
                if($u_level == 1){
              ?>
                <div class="btn_box" style="width:480px">
              <?php }else{?>
                <div class="btn_box">
              <?php }?>
                   <?php if(!isset($_SESSION["id"])){?>
                    <a class="slide_signup" href="/user/signup">회원가입</a>
                    <a class="slide_login" href="/user/login">로그인</a>
                    <?php }else {
                      if($u_level == 1){
                    ?>
                      <a class="slide_myp" href="/manager/manager" style="margin-left:20px">관리자 계정</a>
                    <?php }?>
                      <p class="wc_member"><?=$_SESSION["name"]."님 환영합니다."?></p>
                      <a class="slide_myp" href="/home/mypage">마이페이지</a>
                    <?php } ?>
                </div>
            </li>
        </ul>
    </article>
    <article class="main_intro">
        <div class="intro_wrap">
            <h2 class="intro_title">모드는 무엇을 배우나요?</h2>
            <ul class="intro_contents">
                <li class="html">
                    <div class="intro_number">1</div>
                    <div class="icon"></div>
                    <h3>HTML</h3>
                    <p>웹 사이트의 틀을 맞추는 단계<br>레이아웃을 짜는 것</p>
                </li>
                <li class="css">
                    <div class="intro_number">2</div>
                    <div class="icon"></div>
                    <h3>CSS</h3>
                    <p>틀을 맞춘 요소에 스타일을 적용하는 단계<br>옷을 입혀주는 것</p>
                </li>
                <li class="js">
                    <div class="intro_number">3</div>
                    <div class="icon"></div>
                    <h3>JavaScript</h3>
                    <p>웹 페이지를 동적으로 만들기 위해<br>필요한 단계</p>
                </li>
            </ul>
        </div>
    </article>
    <article class="main_img">
        <div class="img_wrap">
            <div class="img_icon"></div>
            <h2 class="img_title"><span class="amp">MOD</span>와 함께하는 웹디자인</h2>
            <p>지금 시대는 IT 시대로 많은 웹 사이트들을 보기 쉽습니다.다양한 디자인들과 다양한 기능들을 가진<br> 웹 사이트들이 많은데 그 사이트들을 직접 만들어 보면 어떨까요?<br><br>모드는 여러분들에게 다양하고이쁜 웹 사이트를 만들수 있는 실력을 길러드립니다. </p>
        </div>
    </article>
    <article class="main_library">
        <div class="library_wrap">
            <h2 class="intro_title">모드에서 빌릴 수 있는 책</h2>
            <div class="library_discript">
                <p><span class="amp">모드</span>에서 빌릴수 있는 <br> 다양한 도서</p>
                <p>저희 모드에서는 동아리 지원금으로 다양한 도서를 구매해 언제든지 책을보고 공부할수있게  동아리 회원들에게 무료로 대여해 드립니다. 아래 버튼을 눌러 책을 빌려보세요 아마 당신의 실력향상에 도움이 될것입니다.</p>
                <a href="/library/library" class="now_borrow">지금 대여하러 가기</a>
            </div>
            <div class="book_list">
                <img src="common/images/html.jpg" alt="이미지1" width="120" class="lib_img">
                <img src="common/images/js.jpg" alt="이미지2" width="120" class="lib_img">
                <img src="common/images/mobile.jpg" alt="이미지3" width="120" class="lib_img">
                <img src="common/images/php.jpg" alt="이미지4" width="120" class="lib_img">
                <img src="common/images/angjs.jpg" alt="이미지5" width="120" class="lib_img">
                <img src="common/images/spring.jpg" alt="이미지6" width="120" class="lib_img">
            </div>
        </div>
    </article>
</section>

<script src="common/js/slide.js"></script>
<script src="common/js/offset.js"></script>
<script src="common/js/scroll.js"></script>
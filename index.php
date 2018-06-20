<?php
   $get = isset($_GET["param"]) ? explode("/",$_GET["param"]) : null;
   $dir = isset($get[0]) ? $get[0] : null;
   $page = isset($get[1]) ? $get[1] : null;
   if($dir == null || $page == null){
      $dir = "home";//디렉토리
      $page = "main";//페이지 이름
   }
	include_once($_SERVER['DOCUMENT_ROOT']."/page/connect.php");//session_start, db연결
  $request_uri = $_SERVER['REQUEST_URI'];//url뒤에 붙는거
  if($request_uri != "/manager/user_connect"){
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <title>MOD - 서울디지텍고등학교 웹디자인 동아리</title>

    <link rel="shortcut icon" href="/common/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/common/css/materialize.min.css"><!-- 버튼 효과여기 -->
    <link rel="stylesheet" type="text/css" href="/common/css/desktop.css"/>
    <link rel="stylesheet" type="text/css" href="/common/css/gsp.css"/>
    <link rel="stylesheet" type="text/css" href="/common/css/intro.css"/>
    <link rel="stylesheet" type="text/css" href="/common/css/notice.css"/>
    <link rel="stylesheet" type="text/css" href="/common/css/mypage.css"/>
    <link rel="stylesheet" type="text/css" href="/common/css/modify.css"/>
    <link rel="stylesheet" type="text/css" href="/common/css/library.css"/>
    <link rel="stylesheet" type="text/css" href="/common/css/manager.css">
    <link rel="stylesheet" type="text/css" href="/common/css/media.css">
    
    <script src="/common/js/jquery.js"></script>
    <script src="/common/js/materialize.min.js"></script>
    <script src="/common/js/wirte_page.js"></script>
    <script src="/common/js/mobile.js"></script>
    <script src="/common/js/notice_view.js"></script>
    <script src="/common/js/script.js"></script>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/page/ajax.php"); //ajax 접속확인 연결?>
    <script type="text/javascript" src="/common/js/manager.js"></script>
</head>
<body>

<div id="wrap">
  <?php if($page == "main"){ ?>
      <header class="h_main">
    <?php }else{ ?>
      <header>
    <?php } ?>
          <div class="header_wrap">
              <h1 class="logo"><a href="/">MOD</a></h1>
              <div class="menu_bar" onclick="menubar_click()"></div>
              <ul class="header_menu">
                   <li class="sub_login sub">
                     <div class="profile_img">
                       <div class="profile"></div>
                     </div>
                     <div class="profile_greeting">
                     <?php if(isset($_SESSION["id"])){?>
                       <p><?=$_SESSION["name"]?>님 환영합니다.</p>
                    <?php } else {?>
                    <p>로그인 해주세요.<br><a href="/user/login" style="color:#fff">로그인 하러가기</a></p>
                     <?php } ?>
                     <div class="close" onclick="close_click()">X</div>
                    </div>
                   </li>
                  <li><a class="h_link" href="/introduce/greetings">인사말</a></li>
                  <li><a class="h_link" href="/introduce/intro">동아리소개</a></li>
                  <li><a class="h_link" href="/gsp/gsp">모드게시판</a></li>
                  <li><a class="h_link" href="/notice/notice">공지사항</a></li>
                  <?php if(!isset($_SESSION["id"])){?>
                  <li><a class="h_link" href="/user/login">로그인</a></li>
                  <li><a class="h_link" href="/user/signup">회원가입</a></li>
                  <?php } else { ?>
            <li><a href="/home/mypage" class="h_link">마이페이지</a></li>
            <li><a class="h_link" href="/user/logout">로그아웃</a></li>
          <?php } ?>
              </ul>
          </div>
      </header>
      <?php
      }
      include_once("./page/{$dir}/{$page}.php");//section 연결
      $request_uri = $_SERVER['REQUEST_URI'];
      if($request_uri != "/manager/user_connect"){
      ?>
      <footer>
          <div class="footer_wrap">
        <div class="info">
            <ul class="info1">
                <li>MOD</li>
                <li>서울특별시 용산구 회나무로12길 27 409호</li>
                <li>대표: 이영국</li>
                <li>회장: 서재우</li>
            </ul>
                  <ul class="info2">
                <li>학교번호: 02-798-3641</li>
                <li>이메일: 5656sanghup@naver.com</li>
                  </ul>
              </div>
              <div class="copy">
                  <ul class="sns">
                      <li class="facebook"></li>
                      <li class="google-plus"></li>
                      <li class="instagram"></li>
                      <li class="twitter"></li>
                      <li class="youtube"></li>
                  </ul>
                  <address>Copyright&copy;2017, MOD All rights reserved</address>
              </div>
          </div>
      </footer>
</div>

</body>
</html>
<?php }?>

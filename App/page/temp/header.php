<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <title>MOD - 서울디지텍고등학교 웹디자인 동아리</title>

    <link rel="shortcut icon" href="/common/images/favicon.ico" type="image/x-icon"><!-- favicon -->
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

    <script>
        var user_name= "<?php echo isset($_SESSION['name'])? $_SESSION['name']: ""; ?>";
        var user_id= "<?php echo isset($_SESSION['id'])? $_SESSION['id']: ""; ?>";
    </script>
    <script type="text/javascript" src="/common/js/CheckOnline.js"></script><!-- Check Ajax Online -->
    <script type="text/javascript" src="/common/js/manager.js"></script>

</head>
<body>
<?php
    $page=="main"
        ?$h= "class='h_main'"
        :$h= "";
?>
<div id="wrap">
    <header <?= $h ?>>
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
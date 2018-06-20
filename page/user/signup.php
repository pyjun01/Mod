<?php
  if(isset($_SESSION['id'])){echo "<script>alert('잘못된 접근입니다.');location.replace('/');</script>"; exit;}
?>
<section id="signup_wrap">
    <div class="form_box">
		<h2>MOD 회원가입</h2>
    <form action="/user/signupRequest" method="post" class="signup_pop">
      <fieldset>
        <legend>Signup</legend>
        <div class="input-field col s6 fl">
          <input id="last_name" type="text" class="validate name" name="name">
          <label for="last_name">이름</label>
        </div>
        <div class="input-field col s6 ">
          <input id="last_name" type="text" class="validate grade" name="grade">
          <label for="last_name">학번 (예:20621)</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate num" name="num">
          <label for="last_name">전화번호 (-없이 입력)</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate id" name="id">
          <label for="last_name">아이디 (영문 숫자 조합 6글자 이상)</label>
          <button type="button" onclick="id_ck()" class="ck_btn">중복확인</button>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate pw" name="pw">
          <label for="last_name">비밀번호 (영문 숫자 조합 6글자 이상)</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate pw_ck" name="pw_ck">
          <label for="last_name">비밀번호 확인</label>
        </div>
        <div class="input">
          <button type="button" class="waves-effect waves-light btn" onclick="su.submit()">회원가입</button>
        </div>
      </fieldset>
    </form>
    </div>
    <div class="blind" id="blind"></div>
    <div class="blind error_pop">
       <div class="error_head">
          <p>로그인 오류</p>
          <span>X</span>
       </div>
       <div class="error_body">
           <p class="msg">

           </p>
       </div>
    </div>
</section>

<script src="/common/js/signup.js"></script>

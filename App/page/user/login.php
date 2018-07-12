<?php 
  LoginCheck();
?>
<section id="login" class="user">
  <div class="form_box">
    <h2>MOD 로그인</h2>
    <form action="./loginRequest" method="post" class="login_pop">
      <fieldset>
        <legend>Login</legend>
        <div class="input-field col s6">
          <input id="last_name_id" type="text" class="validate id" name="id">
          <label for="last_name_id">아이디</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name_pw" type="password" class="validate" name="pw">
          <label for="last_name_pw">비밀번호</label>
        </div>
        <div class="input">
          <button type="submit" class="waves-effect waves-light btn" onclick="login.submit()">로그인</button>
        </div>
      </fieldset>
    </form>
  </div>
</section>

<script src="/common/js/login.js"></script>

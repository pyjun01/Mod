<?php
  if(empty($_SESSION['id']) || empty($_SESSION['u_level'])){
    alert('접근 할 수 없습니다.');
    location('/');
  }
  $all_user_sql= "SELECT * FROM user ORDER BY idx ASC";
  $all_user= query($all_user_sql);
?>
<script type="text/javascript">

</script>

<section>
  <article class="manager_main">
    <p>
      <h1>관리자 페이지</h1><br>
      <span class="amp">모드 회원</span>들을 관리할 수 있습니다.
    </p>

    <div class="nm input-field col s2 offset-s5">
        <input type="checkbox" class="sortBox filled-in" id="filled-in-box" onclick="user_sort()"/>
      <label for="filled-in-box">회원 수락 안된 순으로 정렬</label>
    </div>

    <table class="highlight centered clear" style="margin-top:30px">
      <thead>
        <th>idx</th>
        <th>id</th>
        <th>이름</th>
        <th>학년</th>
        <th>전화번호</th>
        <th>회원 수락</th>
        <th>회원 탈퇴</th>
        <th>접속 여부</th>
      </thead>
      <tbody class="table_body">
      <?php while($data = $all_user->fetch()){?>

        <tr class="table_row">
          <td class="table_list"><?= $data['idx']?></td>
          <td class="table_list"><?= $data['id']?></td>
          <td class="table_list"><?= $data['name']?></td>
          <td class="table_list"><?= $data['grade']?></td>
          <td class="table_list"><?= $data['phone_num']?></td>
          <td class="table_list">
            <?php if($data['agree'] == 1){ ?>
              <a class="btn-flat disabled user_sort" data-agree="no">수락 완료</a>
            <?php }else{?>
            <a class="waves-effect waves-teal btn-flat user_sort" href="../user/accept?idx=<?= $data['idx']?>" data-agree="agree">수락하기</a>
            <?php } ?>
          </td>
          <td class="table_list">
            <a class="waves-effect waves-teal btn-flat" href="../user/secessionRequest?idx=<?= $data['idx']?>">탈퇴 시키기</a>
          </td>
          <td class="table_list">
            로그아웃
          </td>
        </tr>
        <?php }?>
      </tbody>
    </table>
  </article>
</section>

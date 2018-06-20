<script type="text/javascript">
var user_name = "<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}else{echo "";}?>";
var user_id = "<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}else{echo "";}?>";
var now_url = "/manager/user_connect";

if(now_url != "/manager/user_connect"){
  now_url = "../manager/user_connect";
}

if(user_name != ""){
  var user_list = new Array();
  var req_id;
  function cuser(){ //check user
      $.ajax({//ajax보냄
          url : "/manager/user_connect",
          dataType : "text",
          data : {
              "user_name" : user_name,
              "user_id" : user_id
          },
          type : "post",
          success : function(user){
            // console.log(user);

              user_list = user.trim().split("|");

              var max_row = $(".table_row").length;
              for(var i = 0; i < max_row; i++){
                for(var k=0;k<user_list.length-1;k++){
                  if($('.table_list:nth-child(2)').eq(i).text() == user_list[k]){

                    $('.table_list:nth-child(8)').eq(i).html("<span class='amp'>접속중</span>");
                  }
                }
              }
          },
          error : function(){
              console.log('접속자 리스트 갱신 실패');
          }
      });
  }
  var userc = setInterval(cuser,100);//0.1초마다 ajax보냄
}
</script>

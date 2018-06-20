var name = "<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}else{echo "";}?>";
if(name != ""){
function cuser(){ //check user
    $.ajax({
        url : "./manager/user_connect",
        dataType : "text",
        data : {
            "user" : name
        },
        type : "post",
        success : function(user){
            console.log('접속자 리스트 갱신 성공');
            // $('.connect_user').html(user);

            console.log(user);
            // $(".connect_user").append(user);
        },
        error : function(){
            console.log('접속자 리스트 갱신 실패');
        }
    });
}
// cuser();
var userc = setInterval(cuser,1000);
}

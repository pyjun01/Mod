var now_url = "/manager/manager";

if(now_url != "/manager/manager"){
    now_url = "../manager/manager";
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

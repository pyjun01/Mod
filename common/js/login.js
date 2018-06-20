var login = {
    data: {
        id: null, pw: null,

        regId:null, regPw:null, regEmail:null,

        errorLog: null,
    },
    init: function() {
        login.registerEvents();
    },
    submit: function() {
        login.values();
        login.reg();
        login.testAll();
		login.ax();
    },
    values: function() {
        login.data.id = $('.id').val();
        login.data.pw = $('.pw').val();
        login.data.errorLog = "";
    },
    reg: function() {
        login.data.regId = /^[A-Za-z]{1}[A-Za-z0-9]{5,11}$/;
        login.data.regPw = /^[A-Za-z]{1}[A-Za-z0-9]{5,11}$/;
        login.data.regEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    },
    testAll: function() {
        if(login.data.id == "" || login.data.id == null){ alert("아이디를 입력해주세요."); return false; }
        else {
            if(!login.data.regId.test(login.data.id)) {
                if(!login.data.regEmail.test(login.data.id)) {
                    login.data.errorLog+="<p class='error'>error: 아이디가 형식에 맞지 않습니다.</p>";
                }
                else {

                }
            }
        }

        if(login.data.pw == "" || login.data.pw == null) login.data.errorLog+="<p class='error'>error : 비밀번호을 입력하십시오.</p>";
        else if(!login.data.regPw.test(login.data.pw)) login.data.errorLog+="<p class='error'>error: 비밀번호가 형식에 맞지 않습니다.</p>";

        login.data.errorLog != "" ? login.displayErrorLog() : login.signup();
    },
    registerEvents: function() {
        $(window).keydown(function(e) {
            if(e.which == 13) {
                !($('#blind').hasClass('blind') && $('.error_pop').hasClass('blind')) ? login.concealErrorLog() : login.submit();
            }
            if(e.which == 27 || ($('#blind').hasClass('blind') && $('.error_pop').hasClass('blind'))) {
                login.concealErrorLog();
            }
        });
        $('.error_head > span').click(function() {
            login.concealErrorLog();
        });

        $('.stov').click(function() {
            login.stidOverapCheck();
        })
    },
    stidOverapCheck: function() {

    },
    displayErrorLog: function() {
        //$('.error_pop').css("height", (login.data.errorLog.split("/").length-1)*30+40);
        $('.msg').html(login.data.errorLog);
        $('.blind').removeClass('blind');
    },
    concealErrorLog: function() {
        $('#blind').addClass('blind');
        $('.error_pop').addClass('blind');
        $('.msg > p').remove();
    },
    signup: function() {

    },
	ax : function(){
		$.ajax({
			url: "/page/user/loginRequest",
			type: "post",
			data: $(".login_pop").serialize(),
			success: function(res) {
				if(res == "success"){
					alert("환영합니다.");
                    location.href='/';
				}else if(res == "failed1"){
					alert('관리자 승인후 활동하실 수 있습니다.');
					location = "/";
				}else if(res == "failed2"){
					alert('아이디 혹은 비밀번호가 없거나 다릅니다.');
					location="/";
				}
			}
		});
	}
}
login.init();

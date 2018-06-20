function id_ck(){
	id_val($(".id").val().trim());
}
var suc = 0;
var su = {
    data: {
        name: null, stid: null, phone: null,
        id: null, pw: null, pw_ck: null, 
        
        regName:null, regStid:null, regPhone:null,
        regId:null, regPw:null, 
        
        errorLog: null,

        arrayStid:null, arrayId:null
    },
    init: function() {
        su.registerEvents();
    },
    submit: function() {
        su.values();
        su.reg();
        su.testAll();
    },
    values: function() {
        su.data.name = $('.name').val();
        su.data.stid = $('.grade').val();
        su.data.phone = $('.num').val();
        su.data.id = $('.id').val();
        su.data.pw = $('.pw').val();
        su.data.pw_ck = $('.pw_ck').val();
        
        su.data.errorLog = "";
    },
    reg: function() { 
        su.data.regName = /^[가-힣]+$/;
        su.data.regStid = /^[0-9]{5}$/;
        su.data.regPhone = /^(010|011|016|017|018|019)\d{4}\d{4}$/;
        su.data.regId = /^[A-Za-z]{1}[A-Za-z0-9]{5,11}$/;
        su.data.regPw = /^[A-Za-z]{1}[A-Za-z0-9]{5,11}$/;
       
    },
    testAll: function() {        
        if(su.data.name == "" || su.data.name == null) su.data.errorLog+="<p class='error'>error : 이름을 입력하십시오.</p>";
        else if(!su.data.regName.test(su.data.name)) su.data.errorLog+="<p class='error'>error: 이름이 형식에 맞지 않습니다.</p>";
        
        if(su.data.stid == "" || su.data.stid == null) su.data.errorLog+="<p class='error'>error : 학번을 입력하십시오.</p>";
        else if(!su.data.regStid.test(su.data.stid)) su.data.errorLog+="<p class='error'>error: 학번이 형식에 맞지 않습니다.</p>";
        
        if(su.data.phone == "" || su.data.phone == null) su.data.errorLog+="<p class='error'>error : 전화번호를 입력하십시오.</p>";
        else if(!su.data.regPhone.test(su.data.phone)) su.data.errorLog+="<p class='error'>error: 전화번호가 형식에 맞지 않습니다.</p>";
        
        if(su.data.id == "" || su.data.id == null) su.data.errorLog+="<p class='error'>error : 아이디를 입력하십시오.</p>";
        else if(!su.data.regId.test(su.data.id)) su.data.errorLog+="<p class='error'>error: 아이디가 형식에 맞지 않습니다.</p>";
        
        if(su.data.pw == "" || su.data.pw == null) su.data.errorLog+="<p class='error'>error : 비밀번호을 입력하십시오.</p>";
        else if(!su.data.regPw.test(su.data.pw)) su.data.errorLog+="<p class='error'>error: 비밀번호가 형식에 맞지 않습니다.</p>";
        
        if(su.data.pw_ck == "" || su.data.pw_ck == null) su.data.errorLog+="<p class='error'>error : 비밀번호 확인을 입력하십시오.</p>";
        else if(su.data.pw != su.data.pw_ck) su.data.errorLog+="<p class='error'>error : 비밀번호와 비밀번호 확인이 다릅니다.</p>"
        
        su.data.errorLog != "" ? su.displayErrorLog() : su.signup();
    },
    registerEvents: function() {
        $(window).keydown(function(e) {
            if(e.which == 13) {
                !($('#blind').hasClass('blind') && $('.error_pop').hasClass('blind')) ? su.concealErrorLog() : su.submit();
            }
            if(e.which == 27 || ($('#blind').hasClass('blind') && $('.error_pop').hasClass('blind'))) {
                su.concealErrorLog();
            }
        });
        $('.error_head > span').click(function() {
            su.concealErrorLog();
        });
        
        $('.stov').click(function() {
            su.stidOverapCheck();
        })
    },
    stidOverapCheck: function() {
       
    },
    displayErrorLog: function() {
        $('.error_pop').css("height", (su.data.errorLog.split("/").length-1)*30+40);
        $('.msg').html(su.data.errorLog);
        $('.blind').removeClass('blind');
    },
    concealErrorLog: function() {
        $('#blind').addClass('blind');
        $('.error_pop').addClass('blind');
        $('.msg > p').remove();
    },
    signup: function() {
		if(suc != 1){
			alert("아이디 중복확인을 해주세요");
			return false;
		}else{
        	$('.signup_pop').submit();
		}
    }
}
su.init();

function id_val(str){
	var id_test = /^[A-Za-z]{1}[A-Za-z0-9]{5,11}$/;
	if(str==""){
		alert("빈칸을 채워주세요");
		return false;
	}else if(!id_test.test(str)){
		alert("아이디가 형식에 맞지 않습니다.");
		return false;
	}
	$.post("/page/user/member.php", { id: str }, function(data) {
		if(data== "false"){
			alert("중복된 아이디 입니다.");
            $(".ck_btn").css("background","#e74c3c");
		}else{
			alert("사용가능한 아이디 입니다.");
            $(".ck_btn").css("background","#2bbbad");
			suc = 1;
		}
		return false;
	});
	
}
/*$("html,body").on("scroll mousewheel",function(e){
	e.preventDefault();
	e.stopPropagation();
	return false;
});*/
var slide = {
    data: {
        current: null,
        width: null,
        max: null
    },
    init: function() {
        if(slide.isDesktop()) {
            slide.values();
            slide.registerEvents();
            //slide.interval();   
        }
    },
    values: function() {
        slide.data.current = 1;
        slide.data.width = 100;
        slide.data.max = 3;
        $(".slide_form").css({"margin-left":-slide.data.width+"%"});
        $('.slide_btn > li').eq(0).css({"background-color": "#95E0C8"});
    },
    registerEvents: function() {
        $('.slide_btn > li').click(function() {
            slide.data.current = $(this).index()+1;
            slide.slide();
        });
    },
    interval: function() {
        setInterval(slide.next, 5000);  
    },
    next: function() {
		if(slide.data.current==slide.data.max){
			slide.data.current=0;
			$(".slide_form").css({"margin-left":slide.data.current+"%"});
		}
		slide.data.current++;
        slide.slide();
    },
    slide: function() {
		 if ($(".slide_form").is(":animated"))
			return false;
        $('.slide_btn > li').css({"background-color": "#ddd"});
        $('.slide_btn > li').eq(slide.data.current-1).css({"background-color": "#95E0C8"});
        $(".slide_form").stop().animate({"margin-left":-(slide.data.width*slide.data.current)+"%"},3000);
    },
    isDesktop: function() {
        return $(window).width() > 980 ? true : false;
    }
}
//slide.init();
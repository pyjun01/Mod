var scroll = {
    data : {
        current: null,
        currentY: null,
        blockArray: null
    },
    init: function() {
        if(scroll.isDesktop()) {
            scroll.values();
            scroll.registerEvents();    
        }
    },
    values: function() {
        var margin = $(window).height();
        scroll.data.current = 0;
        scroll.data.currentY = $(window).scrollTop();
        scroll.data.blockArray = [
                                    $('.main_slide').offset().top-(margin-700)/2, 
                                    $('.main_intro').offset().top-(margin-700)/2, 
                                    $('.main_img').offset().top-(margin-700)/2, 
                                    $('.main_library').offset().top-(margin-700)/2  , 
                                ];
        $('.nav > li').eq(scroll.data.current).css({"background-color": "#95E0C8"});
        scroll.scrolling();
    },
    registerEvents: function() {
        $('body').bind('mousewheel', function(e){
            if(!$('html, body').is(":animated")) {
                if(e.originalEvent.wheelDelta /120 > 0) {
                    scroll.data.current <= 0 ? scroll.data.current = scroll.data.blockArray.length-1 : scroll.data.current--;
                }
                else{
                    scroll.data.current == scroll.data.blockArray.length-1 ? scroll.data.current = 0 : scroll.data.current++;
                }
                scroll.scrolling();
            }
            e.preventDefault();
            e.stopPropagation();
        });
        $('.nav > li').click(function() {
            scroll.data.current = $(this).index(); 
            scroll.scrolling();
        });
    },
    scrolling: function() {
        $('.nav > li').css({"background-color": "#ddd"});
        $('.nav > li').eq(scroll.data.current).css({"background-color": "#95E0C8"});
        $('html, body').animate({ scrollTop:scroll.data.blockArray[scroll.data.current] }, 'slow');
        scroll.data.currentY = scroll.data.blockArray[scroll.data.current];
    },
    isDesktop: function() {
        return $(window).width() > 980 ? true : false;
    }
}
//scroll.init();
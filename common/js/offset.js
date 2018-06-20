var offset = {
    data : {
        height: null,
        currentY: null,
        blockOffset: null,
        blockHeight: null,
        block: null
    },
    init: function() {
        offset.values();
        offset.registerEvents();   
    },
    values: function() {
        offset.data.height = $(window).height();
        offset.data.currentY = $(window).scrollTop();
        offset.data.blockOffset = [
                                    $('.main_slide').offset().top, 
                                    $('.main_intro').offset().top, 
                                    $('.main_img').offset().top, 
                                    $('.main_library').offset().top, 
                                ];
        
        offset.data.blockHeight = [
                                    Number($('.main_slide').css("height").split("px")[0]), 
                                    Number($('.main_intro').css("height").split("px")[0]), 
                                    Number($('.main_img').css("height").split("px")[0]), 
                                    Number($('.main_library').css("height").split("px")[0]), 
                                ];
        offset.data.block = [
                                    $('.main_slide li > *'), 
                                    $('.main_intro'), 
                                    $('.main_img > *'), 
                                    $('.main_library'), 
                                ];
        for(i in offset.data.block) 
            offset.data.block[i].css("opacity", 0);
		offset.data.block[1].css("opacity", 1);
    },
    registerEvents: function() {
        $(document).ready(function() {
            offset.scrollProcess();
        });
        $(window).scroll(function() {
            offset.scrollProcess();
        });
    },
    scrollProcess: function() {
        offset.data.currentY = $(window).scrollTop();
        for(i in offset.data.blockOffset) {
            if(!offset.isDesktop()) {
                if(offset.data.blockOffset[i] < offset.data.currentY + offset.data.height && offset.data.blockOffset[i] + offset.data.blockHeight[i] > offset.data.currentY) {
                    if(!offset.data.block[i].is(":animated"))
                        offset.data.block[i].animate({"opacity": 1}, 1000);
                }
                else if(offset.data.blockOffset[i] > offset.data.height + offset.data.currentY || offset.data.blockOffset[i] + offset.data.blockHeight[i] < offset.data.currentY) {
                        offset.data.block[i].css({"opacity": 0});
                }   
            }
            else {
                if(offset.data.blockOffset[i] > offset.data.currentY && offset.data.blockOffset[i] + offset.data.blockHeight[i] < offset.data.currentY + offset.data.height) {
                    if(!offset.data.block[i].is(":animated"))
                        offset.data.block[i].animate({"opacity": 1}, 1000);
                }
                else if(offset.data.blockOffset[i] > offset.data.height + offset.data.currentY || offset.data.blockOffset[i] + offset.data.blockHeight[i] < offset.data.currentY) {
                        offset.data.block[i].css({"opacity": 0});
                }   
            }
        }
    },
    isDesktop: function() {
        return $(window).width() > 980 ? true : false;
    }
}
//offset.init();
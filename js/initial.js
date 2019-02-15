var $ = jQuery.noConflict();

$(".img-responsive-nana").each(function(){
    $(this).parent("div").addClass("img-responsive");
})

var isMobile = $(window).width() < 768;

function sliderComment(){
    var counter = (isMobile) ? 2 : 3;
    for(var i = 0 ;i < counter;i++){
        $(".highlight_master > div:eq("+i+")").show();
        setTimeout(function(iii) {
            $(".caption:eq("+iii+")").addClass("animated flipInX");
            $(".caption:eq("+iii+")").show();
        }, (i * 250) + 250,i);
    }
}

sliderComment();

function switchSliderScreens(){
    $('.highlight_master > div:first')
        .fadeOut(10)
        .next()
        .fadeIn(10)
        .end()
        .appendTo('.highlight_master');
}

setInterval(function(){
    switchSliderScreens();
    switchSliderScreens();
    if($(window).width() >= 768){
        switchSliderScreens();
    }
    

    sliderComment();
}, 8500)



$(".toggle-mobile-menu").click(function(){
    $('#nav-wrap ul li').toggleClass('mob');
});


// var count = 0;
// $(window).scroll(function(event){		

//     var scrolled = $(this).scrollTop();		
    
//     if (scrolled > count){  
//         //scroll down
//         count++;
//         $('#nav-wrap').addClass('active');		
//     } 
//     else { 			
//         //scroll up
//         count--; 
//         $('#nav-wrap').removeClass('active');
//     }
// });
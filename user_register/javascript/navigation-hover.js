$(function(){
    $("#navigation ul li").hover(function(){
        $(this).find('ul.child').stop(true, false, true).slideDown(300);
    }, function(){
        $(this).find('ul.child').slideUp(150);
    });
    
});
$(document).ready (function(){
$("#fade").slideDown(900);
$(".messege-close").fadeIn(600);
var arrow = $(".messege-close");
var body = $("#fade");
var status = false;
$(".messege-close").on('click', function(){
            	arrow.fadeOut(200)
                body.slideUp(500)
		status = false;
        });
});
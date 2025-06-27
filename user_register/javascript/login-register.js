$(document).ready(function(){
	var arrow = $(".arrow-up");
	var form = $(".login-form");
	var status = false;
	$("#login").click(function(event){
		event.preventDefault();
		if(status == false){
			arrow.slideDown(300);
			form.slideDown(300);
			status = true;
		}else{
			arrow.slideUp(200)
			form.slideUp(200);
			status = false;
		}
	});
        $("#register").on('click', function(){
            	arrow.slideUp(200)
			form.slideUp(200);
		status = false;
        });
        $("#link").on('click', function(){
            	arrow.slideDown(200)
			form.slideDown(200);
		status = false;
        });
});
$(document).ready(function(){
	var arrow = $(".r-arrow-up");
	var form = $(".register-form");
	var status = false;
	$("#register").click(function(event){
		event.preventDefault();
		if(status == false){
			arrow.slideDown(300);
			form.slideDown(300);
         
			status = true;
		}else{
			arrow.slideUp(200)
			form.slideUp(200);
			status = false;
		}
	});
        $("#login").on('click', function(){
            	arrow.slideUp(200)
			form.slideUp(200);
		status = false;
        });
});
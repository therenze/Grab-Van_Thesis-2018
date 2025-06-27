$("button#submit").click(function(){
    
    if($("#first_name").val == "" || $("#username").val() == "" || $("#password").val() == "")
        $("div#ack").html("Ops. Something is missing ").slideDown(600).delay(1000).slideUp(700);
    else
        $.post($("#myForm").attr("action"),
                $("#myForm :input").serializeArray(),
                function(data){
            
            $("div#ack").html(data).slideDown(500).delay(1000).slideUp(700);
        });
        
        $("#myForm").submit(function(){
            return false;
        });
});

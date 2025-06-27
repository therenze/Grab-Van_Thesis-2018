<?php 
include('server/server.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Login</title>
        <script src="jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="style/RegisterLoginStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
   <br><br><br><br><br><br><br><br><br><br><center>
        <div class="header"><!--/this is the header/-->
            <h2>User login</h2>
        </div>
    

    <form method="post" action="login_a.php">
        <div class="input-group-login">
            <img src="image/profile.png">
            <input type="text" name="first_name" placeholder="Firstname" size="25" required autofocus>
            <br><br>
            <img src="image/profile.png">
            <input type="text" name="username" placeholder="Username" size="25" required>
            <br><br>
            <img src="image/lock.png">
            <input type="password" name="password" placeholder="Password" size="25" required>
        </div>
            <input type="submit" name="login" value="Login" class="btnn">
    </form> <!--/ END OF FORM/ -->
        <br>
         <div id="fade">
    <?php  include('server/errors.php'); ?> <!-- /display validation errors here/ -->
    </center>
    </div><!-- /End of fade/ -->




<!-- /jQuery for fading page/ -->
<script type="text/javascript">
    
$(document).ready (function(){
$("#fade").fadeIn(300).delay(2000).fadeOut(500);
});
 </script>
</body>
</html>

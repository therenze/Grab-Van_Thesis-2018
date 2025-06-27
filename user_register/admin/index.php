
<?php 
include('server/admin_loginRegister.php');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Login</title>
        <link href="style/login.css" rel="stylesheet" type="text/css"/>
    </head>
    
<body>
<br><br><br><br><br><br>
    <div class="header"><!--/this is the header/-->
        <h2>Login</h2>
    </div>
    
<center>
    <form method="post" action="index.php">
    <br>
        <div class="input-group">
            
            <input type="text" name="admin_user" placeholder="Admin Username" autofocus>
            <br><br>
            <input type="password" name="admin_password" placeholder="Admin Password">
        </div>
        <br>

        
            <input type="submit" name="login" value="Login" class="btn"><br>
            <a href="../gav_homepage.php" class="btnn" onclick="return confirm('Continue to User Home?');">Home</a>
            
       
    </form> <!--/ END OF FORM/ -->
        <br>
    <center>
    
      <?php  include('errors.php'); ?> <!-- /display validation errors here/ -->
    
    </center>
</body>
</html>

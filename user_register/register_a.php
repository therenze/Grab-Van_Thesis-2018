<?php include('NavigationBar/gav_homepageNav.php');
 include 'server/register.php';
//kani sa register
//connect to database     
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/RegisterLoginStyle.css" rel="stylesheet" type="text/css"/>
        <script src="jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
       
        <link href="style/buttons.css" rel="stylesheet" type="text/css"/>
    </head>
    
<body>  
<br><br><br><br><br>

<div id="wrapper">            
        <div class='profile-wrapper'>
            <form method="post" action="register_a.php">
                <input type="submit" name="register" value="Sumbit Profile" class="btn-submit">
             <br>
                         <div id="content_notification">
            <div id="fade">   
              <?php  include('server/errors.php'); ?>        
            </div>  
            </div>
             <div class="form-input-container">
                <div class="register-input-group">
                <center>
                    <label>PERSONAL DETAIL</label><br><br><br><br><br>
                    <input type="text" name="first_name"size="25" pattern='[A-Z]{1}[a-z]{1,}'placeholder="Firstname" title='First letter is uppercase' autofocus required >
                    <input type="text" name="last_name" size="25" pattern='[A-Z]{1}[a-z]{1,}' placeholder="Lastname" title='First letter is uppercase' required>
                    <br>
                    <input type='text'  name="age"  size="10" placeholder='Age'pattern='[0-9]{1,}' required>
                    <input type="text" name="phone_num" size="40" placeholder="Contact Number" pattern='[0-9]{4}[0-9]{4}[0-9]{3}' title="Valid Sim, All network" required >
                    <br>
                    <input type="text" name="address"  size="60"placeholder='Home Address' title='Use a valid Email Address(Google/Yahoo)' required>
                    <br>
                    <input type="email" name="email" size="60"placeholder='Email' title='Use a valid Email Address(Google/Yahoo)' required >
                    <br>
                    <label>ACCOUNT DETAIL</label><br><br><br><br><br>
                    <input type="text" name="username"  size="25" placeholder="Username" required>
                    <input type="password" name="password"  size="25"placeholder="Password" required>
                    <br>
                    <input type="password" name="password_1" size="60" placeholder="Confirm Here!"  required>
                    
                </div>&nbsp;
                <div class="register-about-group">
                    
                    <label>WHY CHOOSE US</label><br><br><br><br><br>
                    <textarea name="about" id="about" cols="70" rows="25" placeholder="Say Something"></textarea>
                   
                </div>
               </div>
                </center>
            </form>       
</div>
</div> 
<script src="javascript/messege-transition.js" type="text/javascript"></script>
</body>
</html>
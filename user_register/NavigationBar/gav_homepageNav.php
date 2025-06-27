<html>
<head>
    <title>GaV</title>
     <meta charset="UTF-8">
     <link href="style/NavigationBar.css" rel="stylesheet" type="text/css"/>
     <script src="jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
     <script src="javascript/smoothscroll.js" type="text/javascript"></script>
</head>
<body>
   
    <nav>
        <div class="logo">           
              
                       <img class="placeholder " src="image/gav.png" alt="Created By: Therenze Amante" title="Design by: Therenze Amante"> 
              
        </div>
        <ul>
            <li>
                <aside class="menu">
		<div class="menu-content">
			<a href="#" id="login"><div class="image-icon"></div>LOGIN</a>
			</div>
		<div class="arrow-up"></div>	
                <div class="login-form">
                
                    <form id="myForm" method="post" action="server/server.php">
                        <div class="input-group-login">
                            
                            <input type="text" name="first_name" id="first_name" placeholder="Firstname" size="25" required autofocus>
                             <img src="image/profile.png">
                            
                             <input type="text" name="username" id="username" placeholder="Username" size="25" required>
                            <img src="image/profile.png">
                            
                            <input type="password" name="password" id="password" placeholder="Password" size="25" required>
                            <img src="image/lock.png">
                        </div>
                        <button class="btnnn" id="submit">Login</button>
                    </form> <!--/ END OF FORM/ -->
                    <div id="ack"></div>
		</div>
                
            </li>    
            <li>       
               <aside class="menu">
		<div class="menu-content">
                    <a href="register_a.php"><div class="image-icon"></div>REGISTER</a>
			</div>
		<div class="r-arrow-up"></div>	
                <div class="register-form">
                    <form id="myForm-register" method="post" action="server/register.php">
            <div class="input-group">
                <center>
                <fieldset id="acc"><legend> Personal Information</legend>
                    <input type="text" name="first_name" id="first_name" pattern='[A-Z]{1}[a-z]{1,}'placeholder="Firstname" title='First letter is uppercase' autofocus required>
                    <input type="text" name="last_name" id="last_name" pattern='[A-Z]{1}[a-z]{1,}' placeholder="Lastname" title='First letter is uppercase' required>
                    <input type='text'  name="age" id="age" placeholder='Age'pattern='[0-9]{1,}'>
                    <input type="text" name="phone_num" id="phone_num" placeholder="Contact Number" pattern='[0-9]{4}[0-9]{4}[0-9]{3}' title="Valid Sim, All network" required>
                    <input type="text" name="address" id="address" placeholder='Home Address' title='Use a valid Email Address(Google/Yahoo)' required>
                    <input type="email" name="email" id="email" placeholder='Email' title='Use a valid Email Address(Google/Yahoo)' required>
                </fieldset>
                <fieldset id="acc"><legend> Account Information</legend>
                    <input type="text" name="username" id="username" placeholder="Username"  required>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <input type="password" name="password_1" id="password_1" placeholder="Confirm Here!"  required center>
                </fieldset>
                </div>&nbsp;
                <button class="btnnn" id="register">Create Account</button>
                </center>
            </form> 
                    
                    <div id="ack-register"></div>
                    
		</div>
            </li>
            <li>
                <a href="gav_homepage.php"><div class="image-icon"></div>HOME</a>
            </li>
        </ul>
    </nav>    
<script src="javascript/login-register.js" type="text/javascript"></script>
<script src="javascript/no-refresh.js" type="text/javascript"></script>
</body>

</html>

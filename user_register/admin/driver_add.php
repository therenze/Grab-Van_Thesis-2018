<?php
include ('NavigationBar.php');
$errors = array();
$okay = array();
$created_date = date('l, jS F Y '); //this is for the date //
$db = mysqli_connect("localhost","root","", "gav_database");
// if upload is pressed
if(isset($_POST['create_driver'])){
    $target = "profile_images/".basename($_FILES['driver_image']['name']);
    $firstname = mysql_real_escape_string($_POST['firstname']);
    $midle = mysql_real_escape_string($_POST['midle']);
    $lastname = mysql_real_escape_string($_POST['lastname']);
    $place_address = mysql_real_escape_string($_POST['place_address']);
    $email_address = mysql_real_escape_string($_POST['email_address']);
    $driver_image = $_FILES['driver_image']['name'];
    $objective = ($_POST['objective']);
    $skill = ($_POST['skill']);
    $experience = ($_POST['experience']);
    $elementary = ($_POST['elementary']);
    $secondary = ($_POST['secondary']);
    $college = ($_POST['college']);
    
           $sql = "INSERT INTO driver (firstname, midle, lastname, place_address, email_address, objective, skill, experience, elementary, secondary, college, created_date, driver_image) VALUES ('$firstname','$midle','$lastname','$place_address','$email_address','$objective','$skill','$experience','$elementary','$secondary','$college','$created_date','$driver_image')"; 
           mysqli_query($db, $sql);
          echo "<meta http-equiv='refresh' content='2;url=driver_add.php'>";
           //move upload image to folder
           if(move_uploaded_file($_FILES['driver_image']['tmp_name'], $target)){
              array_push($okay, "Success!.."); 
           }  else {
               array_push($errors, "Update Unsuccessfull!..");
           }
           
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <title>Image Upload</title>
    </head>
    <body><br><br><br><br>
        
        <div id="wrapper">
        <div id="content_van">
            <br><br>
            <center><?php  include('errors.php'); ?></center>
            
            <fieldset id="fieldset">
            <legend><h4>Driver's Profile</h4></legend>
         
            <form method="post" action="driver_add.php" enctype="multipart/form-data">
                     <input type="hidden" name="size" value="1000000">
                    <label>Profile Picture</label><br>
                    <input type="file" name="driver_image" required >
                    <br><br>
                    <label>Firstname</label>
                    <input type="text" name="firstname" required>
               
                    <label>Midle</label>
                    <input type="text" name="midle" required>
              
                    <label>Lastname</label>
                    <input type="text" name="lastname">
                    <br><br>
                    <label>Place Address</label>
                    <input type="text" name="place_address">
                    <label>Email Address</label>
                    <input type="email" name="email_address">
            </fieldset>
            
            <fieldset id="fieldset">
               
                <legend>Objective</legend>
                    <textarea name="objective" cols="124" rows="5" placeholder="Say Something" required></textarea>
               
            </fieldset> 
              <fieldset id="fieldset">
               
                <legend>Skill's</legend>
                    <textarea name="skill" cols="124" rows="5" placeholder="Say Something" required></textarea>
               
              </fieldset>
             <fieldset id="fieldset">
               
                <legend>Experience</legend>
                    <textarea name="experience" cols="124" rows="5" placeholder="Say Something" required></textarea>
               
              </fieldset>
            <fieldset id="fieldset">
               
                <legend>Education</legend>
                <label>Elementary</label>
                    <textarea name="elementary" cols="124" rows="3" placeholder="Say Something" required></textarea>
                    <label>Secondary</label>
                    <textarea name="secondary" cols="124" rows="3" placeholder="Say Something" required></textarea>
                    <label>College</label>
                    <textarea name="college" cols="124" rows="3" placeholder="Say Something" required></textarea>
               
              </fieldset>
                    
                   
                    
                    
                    <div id="btn">
                        <center>
                        <input type="submit" name="create_driver" value="Create" class="btn" >    
                        
                        </center> 
                    </div>
</form>
          
        
       
            
          
        </div>
       
            <div id="footer"><!--/this is the Foooter/-->
                <p>
                <font color="#57b6cc">Copyright </font> &copy;2017 <br>          
                  Developer: Amante, Therenze Stephen E. 
                </p>
    </div>
             </div>
    </body>
</html>

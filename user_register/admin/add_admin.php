<?php
include ('NavigationBar.php');
$fullname="";
$admin_about="";
$admin_password="";
$admin_user="";
$admin_image="";
$errors = array();
$okay = array();
$created_date = date('l, jS F Y '); //this is for the date //
// if upload is pressed
if(isset($_POST['create'])){
    $target = "admin_profile/".basename($_FILES['admin_image']['name']);
    $fullname = mysql_real_escape_string($_POST['fullname']);
    
     $admin_user = mysql_real_escape_string($_POST['admin_user']);
    $admin_password = mysql_real_escape_string($_POST['admin_password']);
    //connect to databse
    $db = mysqli_connect("localhost","root","", "gav_database");
    
    //get all the submitted data from the form
    $admin_image = $_FILES['admin_image']['name'];
    $admin_about = $_POST['admin_about'];
    
           $sql = "INSERT INTO admin(admin_image, fullname,admin_about ,admin_user, admin_password, created_date) VALUES ('$admin_image','$fullname','$admin_about','$admin_user','$admin_password','$created_date')"; 
           mysqli_query($db, $sql);
          echo "<meta http-equiv='refresh' content='1;url=add_admin.php'>";
          $fullname="";
          $admin_about="";
          $admin_password="";
          $admin_user="";
          $admin_image="";
           //move upload image to folder
           if(move_uploaded_file($_FILES['admin_image']['tmp_name'], $target)){
              array_push($okay, "Create Success Success!.."); 
           }  else {
               array_push($errors, "Create Unsuccessfull!..");
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
        <legend><h4>Adding updates to new Car</h4></legend>
         
        <form method="post" action="add_admin.php" enctype="multipart/form-data">
           
                <input type="hidden" name="size" value="1000000">
                     <label>Upload Picture</label>
                    <input type="file" name="admin_image" required><br><br><br>
                
                    
                    <input type="text" name="fullname" placeholder="Fullname Here." required><br><br>
                    <input type="text" name="admin_user" placeholder="Username Here." required><br><br>
                    <input type="text" name="admin_password" placeholder="Password Here." required>
               
                    <br><br>
                    <h4>About your self</h4>
                    <textarea name="admin_about" cols="40" rows="5" placeholder="Write here" required></textarea>
               
                     <div id="btn">
                        <center>
                        <input type="submit" name="create" value="Create" class="btn" >    
                         </center> 
               
          
        
        </form>
            </fieldset>

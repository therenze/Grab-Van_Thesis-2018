 <?php  

$errors = array();
$okay = array();
 $db = mysqli_connect("localhost", "root", "", "gav_database");  
 if(isset($_POST))  
 {  
      $output = '';  
      $message = '';  
      $first_name = mysqli_real_escape_string($db,$_POST["first_name"]);
      $last_name = mysqli_real_escape_string($db,$_POST["last_name"]);
      $age = mysqli_real_escape_string($db,$_POST["age"]);
      $phone_num = mysqli_real_escape_string($db,$_POST["phone_num"]);
      $email = mysqli_real_escape_string($db,$_POST["email"]);
      $about = mysqli_real_escape_string($db,$_POST["about"]);
      $address = mysqli_real_escape_string($db,$_POST["address"]);

if($_POST["id"] != ''){
           $query = "  
           UPDATE gav_user   
           SET 
                
               first_name='$first_name',
               last_name='$last_name',
               
               age='$age',
               phone_num='$phone_num',
               email='$email',
               address='$address',    
               about='$about'    
           WHERE id='".$_POST["id"]."'"; 
            mysqli_query($db, $query);
            array_push($okay, "Your profile has been updated");

            ?>

            <div id="fade">   
              <?php  include('../server/errors.php'); ?> 
            </div>
            <?php
}
       if(mysqli_query($db, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM gav_user WHERE id = '".$_POST["id"]."' ORDER BY id DESC";  
           $records = mysqli_query($db, $select_query);
            echo $output;
           while($gav_user= mysqli_fetch_array($records)){
                ?>
            <div class='profile-wrapper'>
        <input type="button" name="edit" value="EDIT" id="<?php echo $gav_user['id'] ?>" class="call_modal_edit">
          <input type="button" name="add" value="PICTURE" id="<?php echo $gav_user['id'] ?>" class="call_modal_add">
             
        <?php
            if($gav_user['user_image'] == ''){
                echo "<img class='profile' src='image/profile.png'>";}
            else{
              echo "<img class='profile' src='admin/profile_images/".$gav_user['user_image']."'>";}
            ?>
            
            <label><?php echo"".$gav_user['first_name']."  ".$gav_user['last_name'].""?></label><br>
                   <?php echo"<img class='location-icon' src='image/s.jpg'>".$gav_user['address'].""?>
        <br><br><br>
            
            <p1>Account Information</p1><br>
            <p><?php echo"Username: ".$gav_user['username'].""?><br>
            Password: Sorry you can't change your password.
            <br><br>
            </p>
            <p1>Personal Information</p1><br>      
            <p><?php echo"Age: ".$gav_user['age'].""?><br>
               <?php echo"Email Address: ".$gav_user['email'].""?><br>
               <?php echo"Phone Number: ".$gav_user['phone_num'].""?><br>
            
               
        </div> 
        <div class='about-wrapper'>
            <p1>About yourself</p1><br>      
            <p><?php echo" ".$gav_user['about'].""?><br>
               
        </div>
<?php
}
      }
 
 }
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <script src="javascript/messege-transition.js" type="text/javascript"></script>
</body>
</html>
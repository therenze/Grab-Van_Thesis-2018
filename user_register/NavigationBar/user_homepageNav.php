<?php
session_start();
//dle mka suyod sa homepage kun wla mka login
if(empty($_SESSION['username'])){
    header('location: gav_homepage.php');
    
}    
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>GaV</title>
        <link href="style/NavigationBar.css" rel="stylesheet" type="text/css"/>
        <script src="jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="javascript/navigation-hover.js" type="text/javascript"></script>
        <script src="javascript/smoothscroll.js" type="text/javascript"></script>
    </head>
    <body>
        

        <nav id="navigation">
            <div class="logo">           
              
                       <img class="placeholder " src="image/gav.png" alt="Created By: Therenze Amante" title="Design by: Therenze Amante"> 
              
        </div>
            
            
            <ul class="parent">
            <li>
                

                <a href="#" class="nav-item"><div class="user-profile-pct-icon">
               <?php
              $admin_profile_image = ($_SESSION['username']);
              $db=mysqli_connect('localhost','root','','gav_database');
              $sql = "select * from gav_user WHERE username='$admin_profile_image' ";
              $records = mysqli_query($db, $sql);
                while($user= mysqli_fetch_assoc($records)){
                if($user['user_image'] == '')
         {
                echo "<img class='profile' src='image/profile.png'>";
          }else{
                echo "<img src='admin/profile_images/".$user['user_image']."'>";
          }
                
          }
              ?>
                    </div></a>
                     <ul class="child">       
                        <?php if(isset($_SESSION['username'])): 
                            $query = "UPDATE gav_user SET user_status='Online' WHERE username='".$_SESSION['username']."'";
                            $result = mysqli_query($db, $query);
                        ?>
                        
                        <li> <a href="user_homepage.php?logout=<?php echo $_SESSION['username'];
                        if(isset($_GET['logout'])){
                                $query = "UPDATE gav_user SET user_status='Offline' WHERE username='".$_SESSION['username']."' ";
                                $result = mysqli_query($db, $query);
                                session_destroy();
                                unset($_SESSION["first_name"]);
                                header('location: gav_homepage.php');

                            }
                        ?>" onclick="return confirm('Opzz!.. Are you sure?');">Logout</a></li>
                        <?php endif?>

                        <li> <a href="user_profile.php" >Profile Settings</a></li>
                        <li> <a href="user_viewbookings.php" >View Bookings</a></li>
                    </ul>
            </li>  
           
             
                        
                        
                         <li> <a href="user_driverview.php">DRIVER</a></li>
                        
                
           
            <li> <a href="user_update_place.php" >DESTINATION</a></li>
                       
             <li> <a href="user_update.php" >VEHICLE</a></li>
            <li> 
               <a href="user_managebooking.php" >MANAGE</a>
            </li>
            <li>
                <a href="user_booking.php" >BOOK NOW</a>         
            </li>
             
           <li>
                <a href="user_homepage.php"><div class="image-icon"></div>HOME</a>  
            </li> 
            
        </ul>
            
</nav>
</body>
</html>

 
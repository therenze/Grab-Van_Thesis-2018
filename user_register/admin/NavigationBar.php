<?php include('../admin/server/admin_loginRegister.php');
//dle mka suyod sa homepage kun wla mka login
if(empty($_SESSION['admin_user'])){
    header('location:index.php');
}





?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GaV</title>
        <link href="style/navigationstyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

<nav class="nav-main">
            <div class="logo">  
                                       <ul> <li>
                    
                    
              <?php
              $admin_profile_image = ($_SESSION['admin_user']);
              $db=mysqli_connect('localhost','root','','gav_database');
              $sql = "select * from admin WHERE admin_user='$admin_profile_image' ";
              $records = mysqli_query($db, $sql);
                while($admin= mysqli_fetch_assoc($records)){
                echo "<img src='admin_profile/".$admin['admin_image']."'>";
                }
                 
                ?>
                <a href="#" class="nav-item"><?php echo $_SESSION['admin_user'];?></strong></a>
                    <ul>        
                        <?php if(isset($_SESSION['admin_user'])): 
                            if(isset($_GET['logoutAdmin'])){
                                session_destroy();
                                unset($_SESSION["admin_user"]);
                                header('location: index.php');
                            }
                            ?>
                        
                        <li> <a href="NavigationBar.php?logoutAdmin=<?php echo $_SESSION['admin_user'];?>" >logout</a></li>
                        <?php endif?>
                        <li> <a href="add_admin.php" >Add Admin</a></li>
                        <li> <a href="manageadmin.php" >Manage Account</a></li>
                    </ul>
            </li>  
                    
                </ul>
            </div>
    
        <ul> 
            
                        
             <li>
                 <a href="messages.php">Messages</a>
           </li>
            <li>
                <a href="#">User's Bookings </a>
                    <ul>
                        <li> <a href="pendingbookings.php" >Pending Bookings</a></li>
                      
                        <li> <a href="canceledbookings.php">Canceled Bookings </a></li>
                        <li> <a href="confirmedbookings.php" >Confirmed Bookings</a></li>
                       
                    </ul>      
            </li>
         
            <li>
                <a href="manageusers.php">Manage Users</a>          
            </li>
            <li>
                <a href="#">Inventory</a>
                <ul>
                    <li> <a href="deleteupdates.php">Vehicle</a></li>
                    <li> <a href="deleteupdates_place.php" >Places</a></li>
                     </ul>
            </li>
           
              
                        
                        <li> <a href="driver_view.php" >View Driver's</a></li>
                 
            
               <li>
                   <a href="dashboard.php">Dashboard</a>
           </li>
            
           
            
        </ul>
</nav>
</body>
</html>

 
<?php include ('NavigationBar.php');

$errors = array();
$okay = array();

$db=mysqli_connect('localhost','root','','gav_database');
$sql = "select * from admin ";
$records = mysqli_query($db, $sql);



if(mysqli_num_rows($records)==0){
   array_push($errors, "EMPTY");
}

if(isset($_GET['admin_ID'])){
    $admin_ID = ($_GET['admin_ID']);
    $sql = "DELETE  FROM admin  WHERE admin_id ='$admin_ID'";
    array_push($okay, "Update NO. $admin_user Successfully DELETE");
    mysqli_query($db, $sql); 
    echo "<meta http-equiv='refresh' content='1;url=manageadmin.php'>";
    
}


?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <title>GaV Homepage</title>     
    </head>
    
<body>
    
<br><br><br><br>
    <div id="wrapper">
        <!--/this is the header/-->
         <div id="content"><!--/THIS IS THE CONTENT OF THE PAGE(TOP,CENTER AND BOTTOM)/-->
                <div id="content_top"><!--/this is the Content top/-->
                    <h4>WANT TO BOOK?</h4>
                    <p>GaV(Grab a Van), Offer expirations on booking, 
                       Canceling of booking can be done 12hours after you book, 
                        Your payments will be returned to you with a 20% of money deduction,
                    </p>
                </div>
             
<div id="content_center"><!--/this is the Content center/-->
            <center><?php  include('errors.php'); ?></center>

                
                
                <?php
     if(mysqli_num_rows($records)){
    while($admin= mysqli_fetch_assoc($records)){
  
        echo"<fieldset id='fieldset'>";
                ?>
            <a href="manageadmin.php?admin_ID=<?php echo $admin['admin_id']; ?>" class="btnn" onclick="return confirm('Confirm Delete?');">DELETE</a>
            
                <?php
               
                echo "<img src='admin_profile/".$admin['admin_image']."'>";
                echo "<legend>Admin ID:(".$admin['admin_id'].") -  - Date Created: (".$admin['created_date'].")-  - Date Updated: (".$admin['updated_date'].")</legend>";
                echo "<td>Name: ".$admin['fullname']."<br><br></td>";
                echo "<td>Username: ".$admin['admin_user']."<br><br></td>";
                echo "<td>Password: ".$admin['admin_password']."<br><br></td>";
                echo "<h4>About: </h4>".$admin['admin_about']."<br><br></td>"; 
        echo"</fieldset>";    
       }
                }


                
                ?>
</div>  
</div><!--/end content/-->
    <div id="footer"><!--/this is the Foooter/-->
                <p>
                <font color="#57b6cc">Copyright </font> &copy;2017 <br>          
                  Developer: Amante, Therenze Stephen E. 
                </p>
    </div>
</div><!--/End of the wrapper /-->
</body>
</html>
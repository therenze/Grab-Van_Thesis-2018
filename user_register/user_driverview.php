<?php include('NavigationBar/user_homepageNav.php');

$errors = array();
$okay = array();

$db=mysqli_connect('localhost','root','','gav_database');
$sql = "select * from driver ";
$records = mysqli_query($db, $sql);



if(mysqli_num_rows($records)==0){
   array_push($errors, "EMPTY");
}
if(isset($_GET['driver_ID_view_more'])){
    $driver_idview = ($_GET['driver_ID_view_more']);
    $sql = "SELECT * FROM driver  WHERE driver_id ='$driver_idview'";
    header("location: driver_viewmore.php");
    mysqli_query($db, $sql); 
    
    
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/user_style.css" rel="stylesheet" type="text/css"/>
        <link href="style/buttons.css" rel="stylesheet" type="text/css"/>
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


                
                
                <?php
     if(mysqli_num_rows($records)){
    while($driver= mysqli_fetch_assoc($records)){
  
        echo"<fieldset id='fieldset'>";
                ?>
            
            <a href="user_view_more.php?driver_ID_view_more=<?php echo $driver['driver_id']; ?>" class="btnn" >View more</a>
                <?php
               
                echo "<img src='admin/images/".$driver['driver_image']."'>";
                 echo "<td>Driver's Name: ".$driver['driver_fullname']."<br><br></td>";
                echo "<td>Place Address: ".$driver['place_address']."<br><br></td>";
                echo "<td>Email Address: ".$driver['email_address']."<br><br></td>";
        echo"</fieldset>";    
       }
                }


                
                ?>

</div>  
</div><!--/end content/-->
</div><!--/End of the wrapper /-->    
<div id="footer"><!--/this is the Foooter/-->
                <p>
                <font color="#57b6cc">Copyright </font> &copy;2017 <br>          
                  Developer: Amante, Therenze Stephen E. 
                </p>
    </div>

</body>
</html>
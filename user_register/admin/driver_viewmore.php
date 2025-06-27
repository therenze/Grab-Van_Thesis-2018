<?php include ('NavigationBar.php');

$errors = array();
$okay = array();
$db=mysqli_connect('localhost','root','','gav_database');

if(isset($_GET['driver_ID_view_more'])){
    $driver_idview = ($_GET['driver_ID_view_more']);
    $sql = "SELECT * FROM driver  WHERE driver_id ='$driver_idview'";
    $records = mysqli_query($db, $sql);
    mysqli_query($db, $sql); 
    
    
}




if(mysqli_num_rows($records)==0){
   array_push($errors, "EMPTY");
}

if(isset($_GET['driver_ID'])){

    $driver_id = ($_GET['driver_ID']);
    $sqll = "DELETE  FROM driver  WHERE driver_id ='$driver_id'";
    array_push($errors, "Successfully DELETE");
    mysqli_query($db, $sqll); 
    echo "<meta http-equiv='refresh' content='2;url=driver_view.php'>";
    
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
    while($driver= mysqli_fetch_assoc($records)){
  
        echo"<fieldset id='fieldset'>";
                ?>
            <a href="driver_view.php?driver_ID=<?php echo $driver['driver_id']; ?>" class="btnn" onclick="return confirm('ARE YOU SURE IF YOU WANT TO CONFIRMED THIS?');">DELETE</a>
            <a href="driver_view.php?driver_ID_back=<?php echo $driver['driver_id']; ?>" class="btnn" >BACK</a>
                <?php
               
                
                echo "<legend>Driver's ID:(".$driver['driver_id'].")---- Date Created: (".$driver['created_date'].")</legend>";
                echo"<h4>INFORMATION</h4>";
                echo "<img src='images/".$driver['driver_image']."'>";
                echo "<td>Driver's Name: ".$driver['firstname']." ".$driver['midle']." ".$driver['lastname']."<br><br></td>";
                echo "<td>Place Address: ".$driver['place_address']."<br><br></td>";
                 echo "<td>Email Address: ".$driver['email_address']."<br><br></td>";
                echo"<h4>OBJECTIVES</h4>";
                echo "<td>".$driver['objective']."<br><br></td>";
                echo"<h4>Skill's</h4>";
                echo "<td>".$driver['skill']."<br><br></td>";
                echo"<h4>EXPERIENCE</h4>";
                echo "<td>Email Address: ".$driver['experience']."<br><br></td>";
                echo"<h4>EDUCATION BACKGROUND</h4>";
                echo "<td><h5>Elementary:</h5> ".$driver['elementary']."<br><br></td>";
                echo "<td><h5>Secondary:</h5> ".$driver['secondary']."<br><br></td>";
                echo "<td><h5>College:</h5> ".$driver['college']."<br><br></td>";
                
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
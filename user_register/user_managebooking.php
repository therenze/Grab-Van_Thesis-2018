
<?php include('NavigationBar/user_homepageNav.php');
$errors = array();
//okay, form server/errors.php to display any of the successfull details.
$okay = array();
$db=mysqli_connect('localhost','root','','gav_database');
$sql = "select * from updates inner join updates_place inner join booking ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle and username='".$_SESSION['username']."' WHERE status='PENDING'";
$records = mysqli_query($db, $sql);    
$sql_cancel = "select * from updates inner join updates_place inner join booking ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle and username='".$_SESSION['username']."' WHERE status='CANCELED'";
$records_cancel = mysqli_query($db, $sql_cancel); 

if(isset($_GET['booking_id'])){
    $booking_id = ($_GET['booking_id']);
    $sql_canceled = "UPDATE booking SET status='CANCELED' WHERE booking_id ='$booking_id'";
    array_push($okay, "Canceled Successfully!");
    echo "<meta http-equiv='refresh' content='2;url=user_managebooking.php'>";
    mysqli_query($db, $sql_canceled);
}



?>



<html>
    <head>
        <link href="style/user_style.css" rel="stylesheet" type="text/css"/>
        <link href="style/buttons.css" rel="stylesheet" type="text/css"/>
    </head>
    <body><br><br><br><br>
<div id="wrapper">
        <!--/this is the header/-->
<div id="content"><!--/THIS IS THE CONTENT OF THE PAGE(TOP,CENTER AND BOTTOM)/-->
    <center>
    <?php include('server/errors.php');?>
    </center>
    
<div id="content_center"><!--/this is the Content center/-->

    
    
    <?php
      if ((mysqli_num_rows($records_cancel)==0) && (mysqli_num_rows($records) == 0)){
       echo  "<div class='note_empty'>You have no reservation</div>";
    }
        if(mysqli_num_rows($records) == 1){
   //this is the error that will going to display if the user have a pending reservation.
        echo "<div class='note'><br>Thank You!  You have successfully paid your reservation.</div>";
        echo "<div class='note'><br>If you wish to CANCEL, your money will be returned with a 20% deduction </div>";
        }
 
    while($booking= mysqli_fetch_assoc($records)){
        echo"<fieldset id='fieldset1'>";
?>
      <a href="user_managebooking.php?booking_id=<?php echo $booking['booking_id']; ?>" class="call_modal_edit" onclick="return confirm('Are you sure you want to CANCEL this?');">CANCEL</a>
   
        <?php
         
                echo "<legend>Booked By: ".$booking['username']."  [Status: ".$booking['status']."]</legend>";
                echo "<img src='admin/images/".$booking['image']."'>";
                echo "<td>Van Type:  (".$booking['vehicle'].")<br><br></td>";
                echo "<td>Piking Date: (".$booking['pickup_date'].")<br><br></td>";
                echo "<td>Piking Time: (".$booking['pickup_time'].")<br><br></td>";
                echo "<td>Picking Place: (".$booking['picking_place'].")<br><br></td>";
                echo "<td>Destination: (".$booking['destination'].")<br><br></td>";
                echo "<td>Passenger Type: ".$booking['passenger']."<br><br></td>";
                echo "<h4>Other Helpful Booking Information:</h4> ".$booking['other']."<br>";
                echo "<h4>About Destination:</h4> ".$booking['discription']."<br>";
        echo"</fieldset>";
        echo"<fieldset id='fieldset1'>";
            echo "<legend>Total Payments: [".$booking['status']."]</legend>";
                echo "<td>Vehicle Cost:  ₱ ".$booking['vehicle_price']." (".$booking['vehicle'].")<br><br></td>";
                echo "<td>Place Cost: ₱ ".$booking['place_price'].  " (".$booking['destination'].")<br><br></td>";
                echo "<h4>Total Cost: </h4> ₱ ";  
                echo "<td>".$booking['place_price'] + $booking['vehicle_price'] + $booking['place_price']." Pisos<br><br></td>";                  
        echo"</fieldset>";            
       }
    ?>
    <?php
    
        if(mysqli_num_rows($records_cancel) == 1){
   //this is the error that will going to display if the user have a pending reservation.
        echo "<div class='note'><br>Reservation is on the process of deleting. Please wait a few minute until the process is done</div>";
        
        echo "<div class='note'><br>Your money will be returned to you after the process is done</div>";
        
        }
    while($booking= mysqli_fetch_assoc($records_cancel)){
        echo"<fieldset id='fieldset1'>";
                echo "<legend>Booked By: ".$booking['username']."  [Status: ".$booking['status']."]</legend>";
                echo "<img src='admin/images/".$booking['image']."'>";
                echo "<td>Van Type:  (".$booking['vehicle'].")<br><br></td>";
                echo "<td>Piking Date: (".$booking['pickup_date'].")<br><br></td>";
                echo "<td>Piking Time: (".$booking['pickup_time'].")<br><br></td>";
                echo "<td>Picking Place: (".$booking['picking_place'].")<br><br></td>";
                echo "<td>Destination: (".$booking['destination'].")<br><br></td>";
                echo "<td>Passenger Type: ".$booking['passenger']."<br><br></td>";
                echo "<h4>Other Helpful Booking Information:</h4> ".$booking['other']."<br>";
                echo "<h4>About Vehicle:</h4> ".$booking['discription']."<br>";
        echo"</fieldset>";
        echo"<fieldset id='fieldset1'>";
            echo "<legend>Total Payments: [".$booking['status']."]</legend>";
                echo "<td>Vehicle Cost:  ₱ ".$booking['vehicle_price']." (".$booking['vehicle'].")<br><br></td>";
                echo "<td>Place Cost: ₱ ".$booking['place_price'].  " (".$booking['destination'].")<br><br></td>";
                echo "<h4>Total Cost: </h4> ₱ ";  
              echo "<p>Total Cost: &nbsp  ₱";
                $total= $booking['vehicle_price']  + $booking['place_price'];
                echo "$total";
                
                echo"</fieldset>";            
       }
    ?>

   
    

</div>
</div>
</div>
        <div id="footer"><!--/this is the Foooter/-->
                <p>
                <font color="#57b6cc">Copyright </font> &copy;2017 <br>          
                  Developer: Amante, Therenze Stephen E. 
                </p>
        </div>
    </body>
</html>
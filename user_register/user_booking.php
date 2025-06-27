
<?php include('NavigationBar/user_homepageNav.php');
//include navigationbar to see the navigation bar
//errors, from server/errors.php to display any errors incounterd during the process.
$errors = array();
//okay, form server/errors.php to display any of the successfull details.
$okay = array();
//username = session[username], meaning ang username na e stored sa database kani ang username sa current user na nag gamit.
$username = $_SESSION['username'];
//status == pending, meaning once current user will stored booking automaticaly status == pending.
$status = 'ON PENDING';
$status_paynow = 'PENDING';
//created_date = date now, if the current user will stored data automaticaly will also stored the current date.
$created_date = date('n-j-Y '); 
//connecting to the database, our database is gav_database.
$db=mysqli_connect('localhost','root','','gav_database');
//if submit_booking button is press this is the following actions bellow.
//submit_booking is equal to the booking botton you will see on the html page
if(isset($_POST['submit_booking'])){
    $picking_time_time = mysql_real_escape_string($_POST['picking_time_time']);
    $picking_time_format = mysql_real_escape_string($_POST['picking_time_format']);
    $pickup_time = "$picking_time_time $picking_time_format";
    $pickup_date= mysql_real_escape_string($_POST['pickup_date']);
    $vehicle = mysql_real_escape_string($_POST['vehicle']);
    $destination = mysql_real_escape_string($_POST['destination']);
    $passenger= mysql_real_escape_string($_POST['passenger']);
    $picking_place= mysql_real_escape_string($_POST['picking_place']);
    $other= mysql_real_escape_string($_POST['other']);                
//sql_pending, this is the condition we will use to select the current user's booking where it is equal to pending.
 //we will use this to identify if the user can book or not
$sql_on_pending = "select * from booking inner join updates_place inner join updates inner join gav_user ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle and booking.username='".$_SESSION['username']."' WHERE status='ON PENDING' ";
 $result_on_pending= mysqli_query($db,$sql_on_pending); 
 //if the selection condition is greater than zero meaning, the user have a pending reservation.
 //if the user have a pending reservation an error will display.
if(mysqli_num_rows($result_on_pending)>0){
   //this is the error that will going to display if the user have a pending reservation.
   array_push($errors, "Opss! Cant use Create button right now. <br> Kindly use delete button first to delete. <br>");
}
$sql_pending = "select * from booking inner join updates_place inner join updates inner join gav_user ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle and booking.username='".$_SESSION['username']."' WHERE status='PENDING' ";
 $result_pending= mysqli_query($db,$sql_pending); 

//if the selection condition is greater than zero meaning, the user have a pending reservation.
 //if the user have a pending reservation an error will display.
if(mysqli_num_rows($result_pending)>0){
   //this is the error that will going to display if the user have a pending reservation.
   array_push($errors, "Booking denied because you have 1 Pending for payment reservation.");
}
//sql_cancel, we will use this to select all the canceled booking of the current user's
$sql_cancel = "select * from booking inner join updates_place inner join updates inner join gav_user ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle and booking.username='".$_SESSION['username']."' WHERE status='CANCELED' ";
 $result_cancel= mysqli_query($db,$sql_cancel); 
 //if the result is equal to one, the user's cant book
 // user's can only book if the pending or canceled reservation will be deleted/confirmed.
if(mysqli_num_rows($result_cancel)>0){
 //this is the messege that will display for the error.
    array_push($errors, "SORRY! You Cannot book right now,");

    array_push($errors, "Your booking is being Canceled, Wait until your booking will be completely deleted by the admin");
}

//checking properly the field.
//if thier is a empty a error messege will pop-up automaticaticaly.
if(empty($destination && $passenger && $picking_place && $other)){
    array_push($errors,"Something is missing or wrong, Please do it properly");
}
// if there are no errors, save user to database.
//this is the insertion to the database.

if(count($errors)== 0){
   
    $sql = "INSERT INTO booking (username, pickup_time,pickup_date, vehicle, destination ,passenger,status,picking_place, other ,created_date)
            VALUES('$username','$pickup_time','$pickup_date','$vehicle','$destination','$passenger','$status','$picking_place','$other','$created_date')";
    
       array_push($okay, "Success!, You can now pay it!"); 
     
    mysqli_query($db, $sql); 
//okay message will display if the reservation will be successfully inserted.
}
   
}
//closing of the php tag.
if(isset($_GET['delete_booking_id'])){
            $booking_id = ($_GET['delete_booking_id']);
            $sql_delete = "DELETE FROM booking WHERE booking_id ='$booking_id'";
            mysqli_query($db, $sql_delete);
            array_push($okay, "Reservation been deleted successfuly!.."); 
        }   


        
if(isset($_POST['update'])){
    $picking_time_time = mysql_real_escape_string($_POST['picking_time_time']);
    $picking_time_format = mysql_real_escape_string($_POST['picking_time_format']);
    $pickup_time = "$picking_time_time $picking_time_format";
    $month= mysql_real_escape_string($_POST['date_month']);
    $day= mysql_real_escape_string($_POST['date_day']);
    $year= mysql_real_escape_string($_POST['date_year']);
    $pickup_date = "$month-$day-$year";
    $vehicle = mysql_real_escape_string($_POST['vehicle']);
    $destination = mysql_real_escape_string($_POST['destination']);
    $passenger= mysql_real_escape_string($_POST['passenger']);
    $picking_place= mysql_real_escape_string($_POST['picking_place']);
    $other= mysql_real_escape_string($_POST['other']);

    $sql_update_booking = "select * from updates inner join updates_place inner join booking ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle and username='".$_SESSION['username']."' WHERE status='ON PENDING'";
  
    mysqli_query($db, $sql_update_booking); 
    array_push($okay, "Update Successfully!"); 

}
if(isset($_GET['paynow_booking_id'])){
            $datenow = date('n-j-Y '); 
            $booking_id = ($_GET['paynow_booking_id']); 
            $sql = "UPDATE booking SET status='$status_paynow' WHERE username='$username' AND status='ON PENDING'";
            echo "<meta http-equiv='refresh' content='0;url=user_managebooking.php'>";
            $paynow = mysqli_query($db, $sql);               
}
?>
<br><br>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/user_style.css" rel="stylesheet" type="text/css"/>
        <link href="style/buttons.css" rel="stylesheet" type="text/css"/>
        <link href="style/modal.css" rel="stylesheet" type="text/css"/>
        <link href="style/calendar.css" rel="stylesheet" type="text/css"/>
        <script src="jQuery/jquery.js" type="text/javascript"></script>
        <script src="jQuery/jquery-ui.js" type="text/javascript"></script>
        <script src="javascript/datepicker.js" type="text/javascript"></script>
    </head>
    
    <body><br>
        <!--/this is the wrapper that will help us to design the all form inside/-->
            <div id="content_notification">
            <div id="fade">   
              <?php  include('server/errors.php'); ?>        
            </div>  
            </div>
        
 
       
        <!--/this is our form this will help us to stored data to our database/-->
           
                
                <!--/we here include server/errors.php to display all of the errors error/-->
               
                <!--/this is a fieldset we will use this to group our input types/-->
                <div id="wrapper_booking">
                <fieldset id="fieldset_booking_wrapper">
                    <div class="note_booking">Booking Form</div><br>
                    <form method="post" action="user_booking.php">
                    <input type="submit" name="submit_booking" value="Create" class="btn_booking" onclick="return confirm('(NOTE: recheck your reservation first!) PROCED BOOKING? '); ">    
                    <input type="submit" name="update" value="Update" class="btn_edit" onclick="return confirm('(NOTE: recheck your reservation first!) PROCED BOOKING? '); ">    
                    <br><hr>
                    <fieldset id="fieldset_booking">
                      
                        <!--/legend, this is the title of our group/-->
                        <legend id="legend">Select Pick-up Date and Time</legend>
                        <input type="text" name="pickup_date" id="datepicker" placeholder="--Picking Date--">
                        <!--/this is for the time drop down option/-->
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="picking_time_time" class="option"  id="option" required/>
                                <option value="">--Time--</option>
                                <option value="1:00">1:00</option>
                                <option value="2:00">2:00</option>
                                <option value="3:00">3:00</option>
                                <option value="4:00">4:00</option>
                                <option value="5:00">5:00</option>
                                <option value="6:00">6:00</option>
                                <option value="7:00">7:00</option>
                                <option value="8:00">8:00</option>
                                <option value="9:00">9:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                        </select>

                        <select name="picking_time_format" class="option"  required/>
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                        </select>
                    </fieldset>
                    
                    
                <fieldset id="fieldset_booking">
                    <legend id="legend">Booking pickup place and destination</legend>
                        <select name="picking_place" class="option" style=" width: 100%"   required/>
                            <option value="">--Chooce Picking Place Here!--</option>
                            <option value="San Francisco Anao-aon S,D,N">San Francisco Anao-aon S,D,N</option>
                            <option value="Surigao City Narcisco">Surigao City Narcisco</option>
                            <option value="Surigao City Kaskag">Surigao City Narcisco</option>
                            <option value="Surigao City San Nicolas">Surigao City San Nicolas</option>
                            <option value="Surigao City Pantalan II">Surigao City Pantalan II</option>
                            <option value="Surigao City San Juan">Surigao City San Juan</option>
                        </select><br><br>
                        
                        <select name="destination" class="option" style=" width: 100%"  required/>
                       
                            <?php
                            $db=mysqli_connect('localhost','root','','gav_database');
                            $query = "SELECT * FROM `updates_place`";
                            $db = mysqli_query($db, $query);
                            ?>
                            <option value="">--Chooce Droping Destination!--</option>
                                <?php while($row1 = mysqli_fetch_array($db)):;?>
                                    <option value="<?php echo $row1[3];?>"><?php echo $row1[3];?></option>
                                <?php endwhile;?>
                        </select>
                </fieldset>
               
                <fieldset id="fieldset_booking">
                    <legend id="legend">Booking Vehicle</legend>
                        <select name="vehicle" class="option" style=" width: 100%;"   required/>
                        
                            <?php
                            $db=mysqli_connect('localhost','root','','gav_database');
                            $query = "SELECT * FROM `updates` WHERE vehicle_usage='Available'";
                            $db = mysqli_query($db, $query);
                            ?>
                            <option value="">--Chooce vehicle!--</option>
                            <?php while($row1 = mysqli_fetch_assoc($db)):;?>
                            <option value="<?php echo $row1['vehicle_name'];?>"><?php echo $row1['vehicle_name'];?>
                            
                            </option>
                            <?php endwhile;?>
                        </select>    
                </fieldset>
    
                
                <fieldset id="fieldset_booking">
                    <legend id="legend">Passenger Information</legend>
                        <select name="passenger" class="option" style=" width: 100%"   required>
                            <option value="">-- Choose here --</option>
                            <option value="Family 10-15 person">Family 10-15 person</option>
                            <option value="Friends 3-10 person">Friends 3-10 person</option>
                            <option value="Duo 2 person">Duo 2 person</option>
                            <option value="single 1 person">Single 1person</option>
                        </select>
                </fieldset>
                
                <div id="about" >
                    <h5>Other Helpful Information:</h5>
                    <textarea type="text" name="other"  required/> </textarea>

                </div>
                <div>
 
                </div>
               
                </fieldset>
                    </form>
                    <div id="center-border"></div>


    <fieldset id='fieldset_booking_view'>
        <div class="note_booking">Booking over view</div><br>
    <?php
    $db=mysqli_connect('localhost','root','','gav_database');
    $sql = "select * from updates inner join updates_place inner join booking ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle and username='".$_SESSION['username']."' WHERE status='ON PENDING'";
    $records = mysqli_query($db, $sql);
       if(mysqli_num_rows($records) == 0){
   //this is the error that will going to display if the user have a pending reservation.
        echo "<div class='note_empty'>You have no reservation</div>";
        }
        
    
    while($booking= mysqli_fetch_array($records)){
                          ?>
         <a href="user_booking.php?delete_booking_id=<?php echo $booking['booking_id']; ?>" class="btn_delete" onclick="return confirm('Are you sure you want to DELETE this?');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
         <a href="user_booking.php?paynow_booking_id=<?php echo $booking['booking_id']; ?>" class="btn_booking"  onclick="return confirm('Are you sure you want to CANCEL this?');">Proceed payments</a><br><br>                       
         <hr>
             <?php
                echo "Piking Date and time: ".$booking['pickup_date']." ".$booking['pickup_time']."<br><br>";
                echo "Passenger Type: ".$booking['passenger']."<br><br>";
                echo "Picking Place: ".$booking['picking_place']."<br><br>";
                echo "Selected Van:  ".$booking['vehicle']."<br><br>";
                echo "<td>Destination: ".$booking['destination']."<br>";
                echo "<img src='admin/images/".$booking['image']."'>";
                echo "<img src='admin/images/".$booking['place_image']."'><br><br><br><br><br><br><br><hr>";
                echo "Other Helpful Booking Information : <br>&nbsp;&nbsp;&nbsp;&nbsp;"
                . "&nbsp;&nbsp;&nbsp;&nbsp;"
                . "&nbsp;&nbsp;&nbsp;&nbsp;"
                . "&nbsp;&nbsp;&nbsp;&nbsp;".$booking['other']."<br>";
                echo "<h4>Total Cost: </h4>"; 
                echo "<td>Vehicle Cost:  ₱ ".$booking['vehicle_price']." (".$booking['vehicle'].")<br></td>";
                echo "<td>Place Cost: ₱ ".$booking['place_price'].  " (".$booking['destination'].")<br></td>";
                echo "<p>Total Cost: &nbsp  ₱";
                $total= $booking['vehicle_price']  + $booking['place_price'];
                echo "$total";

       }
    
  
    ?>
 </fieldset>
            
    </div>            

                  
<script src="javascript/messege-transition.js" type="text/javascript"></script>
</body>
</html>

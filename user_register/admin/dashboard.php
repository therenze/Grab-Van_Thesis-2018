<?php include ('NavigationBar.php');

$errors = array();
$okay = array();
$created_date = date('l, jS F Y '); 

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <title>GaV Homepage</title>     
    </head>
    
<body>
    
<br><br><br><br><br>
   
<fieldset id='dashboard'> 
    <img class="placeholder " src="images/dashboard.png">
    <div class="note_dashboard"></div><br>
<fieldset id='fieldset_wrapper_dashboard_messege'>
    <div class="note_dashboard_sub">Current Messeges</div><br>
    <div class="sub">

    <?php
    $db=mysqli_connect('localhost','root','','gav_database');
    $sql = "select * from contact_us WHERE created_date='$created_date' ";
    $records = mysqli_query($db, $sql);
    while($contact_us= mysqli_fetch_array($records)){
        echo"<fieldset id='fieldset_dashboard'>";
                ?>
                <?php
                echo "Messege By: ".$contact_us['gav_user_username']."<br>";
                echo"</fieldset>";    
                }
    ?>
    </div>
</fieldset>
            
<fieldset id='fieldset_wrapper_dashboard_booking'>
    <div class="note_dashboard_sub">Current Pending booking</div><br>
     <div class="sub">
    <?php
    $db=mysqli_connect('localhost','root','','gav_database');
    $sql = "SELECT * FROM booking inner join updates_place inner join updates inner join gav_user ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle and gav_user.username=booking.username WHERE status='pending' ";
    $records = mysqli_query($db, $sql);
    while($booking= mysqli_fetch_array($records)){
        echo"<fieldset id='fieldset_dashboard'>";
                ?>
                <?php
                echo "<img src='images/".$booking['image']."'>";
                echo "".$booking['status']."<br>";
                echo "<td>Name of the Booker:(".$booking['first_name']." ".$booking['last_name'].")<br></td>";
                echo "<br>";
                echo"</fieldset>";    
                }
    ?>
     </div>
</fieldset>
</fieldset>
    <div id="footer_dashboard"><!--/this is the Foooter/-->
        <p><font color="#57b6cc">Copyright </font> &copy;2017 <br>          
                  Developer: Amante, Therenze Stephen E. 
        </p>
    </div>
</div> 
</body>
</html>
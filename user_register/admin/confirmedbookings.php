<?php include ('NavigationBar.php');

$errors = array();
$okay = array();

$db=mysqli_connect('localhost','root','','gav_database');
$sql = "select * from booking inner join updates_place inner join updates inner join gav_user ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle and gav_user.username=booking.username WHERE status='CONFIRMED'ORDER BY booking_id DESC";
$records = mysqli_query($db, $sql);


if(isset($_GET['UsernameID'])){
    $booking_id = ($_GET['UsernameID']);
    $sql = "DELETE FROM booking WHERE booking_id ='$booking_id'";
    array_push($okay, "DELETE SUCCESSFULLY");
    mysqli_query($db, $sql); 
    echo "<meta http-equiv='refresh' content='1;url=confirmedbookings.php'>";
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <link href="style/buttons.css" rel="stylesheet" type="text/css"/>
        <link href="style/modal.css" rel="stylesheet" type="text/css"/>
        <script src="jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <title>GaV Homepage</title>     
    </head>
    
<body>
    
<br><br><br><br>
<div id="wrapper">
        <!--/this is the header/-->
         <div id="content"><!--/THIS IS THE CONTENT OF THE PAGE(TOP,CENTER AND BOTTOM)/-->
  
   <br>                 
<div id="content_center"><!--/this is the Content center/-->
            
          <div id="employee_table">
                <?php
                    if(mysqli_num_rows($records)==0){
   echo  "<div class='note_empty'>No reservation</div>";
}
                while($updates= mysqli_fetch_array($records)){
        
        echo"<fieldset id='fieldset'>";
                ?>
              <input type="button" name="view" value="VIEW" id="<?php echo $updates['booking_id'] ?>" class="call_modal_view">
              <a href="fpdfserver.php?pdf=<?php echo $updates['booking_id']; ?>" class="call_modal_print">PRINT</a>    
               <a href="confirmedbookings.php?UsernameID=<?php echo $updates['booking_id']; ?>" class="call_modal_delete" onclick="return confirm('ARE YOU SURE IF YOU WANT TO DELETE THIS?'); ">DELETE</a>
               
           
                 <?php
                
                
                
                echo "Date & Time:&nbsp;".$updates['pickup_date']."  @ ".$updates['pickup_time']."&nbsp;".$updates['status']."";
                echo "<img src='images/".$updates['image']."'>";
                echo "<img src='images/".$updates['place_image']."'>";
                echo "<br><br>Booker Name:&nbsp;".$updates['first_name']." ".$updates['last_name']."";
                echo "<br><br>Destination:&nbsp;".$updates['place_name']."";
                echo "<p>Total Cost: &nbsp  ₱";
                $total= $updates['vehicle_price']  + $updates['place_price'];
                echo "$total";
                echo"</fieldset>";    
                
    }
                
?>                    
</div>  
</div>
             </div><!--/end content/-->
    <div id="footer"><!--/this is the Foooter/-->
                <p>
                <font color="#57b6cc">Copyright </font> &copy;2017 <br>          
                  Developer: Amante, Therenze Stephen E. 
                </p>
    </div>
</div>
<!--/MODAL VIEW/-->
<div id="dataModal" class="modal-view">
    <div class="modal_close close"></div>
    <div class="modal_main">
        <img src="i783wQYjrKQ.png" class="close" style="margin-top:13px;left:72%;position:fixed;">                            
        <h4><center/>Your Booking's</h4> 
        <hr>
        <div class="modal-body" id="detail">
            
        </div>           
    </div>
</div>
    <script>
    $(document).ready(function(){
  $(".close").click(function(){
	$(".modal-view").fadeOut(500);
	$(".modal_main").slideUp(400);
        
	  });
}); 
$(document).on('click', '.call_modal_view', function(){     
    $(".call_modal_view").click(function(){
           var booking_id = $(this).attr("id");  
           if(booking_id != '')  
           {  
                $.ajax({  
                     url:"modal-controller/booking-select.php",  
                     method:"POST",  
                     data:{booking_id:booking_id},  
                     success:function(data){  
                        $('#detail').html(data);
                      	$(".modal-view").fadeIn(300);
                        $(".modal_main").slideDown(400);
                     }  
                });  
           }            
      });  
 }); 

  </script>
</body>
</html>
             
              
           
             
                
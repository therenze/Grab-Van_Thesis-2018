 <?php  
 if(isset($_POST["booking_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "gav_database");  
      $query = "select * from booking inner join updates_place inner join updates inner join gav_user ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle and gav_user.username=booking.username WHERE booking_id = '".$_POST["booking_id"]."'";

      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $total= $row['vehicle_price']  + $row['place_price'];
               
           $output .= ' 
                <tr>  
                     Book ID :
                     '.$row["booking_id"].'---'.$row["created_date"].'
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     By:
                      '.$row["first_name"].' '.$row["last_name"].'
                </tr> <hr>
                <tr>
                     Destination : 
                     '.$row["place_name"].'  (Cost:'.$row["place_price"].')
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     Status:
                      '.$row["status"].'   
                </tr><hr>  
                <tr>
                    Choosen Vehicle :
                     '.$row["vehicle_name"].' (Cost:'.$row["vehicle_price"].')
                </tr><hr> 
                <tr>  
                     Trip Price :
                     '. $total.' 
                </tr> <hr> 
                <tr>  
                     Picking Place/Date&Time : 
                     '.$row["picking_place"].' ( '.$row["pickup_date"].' @ '.$row["pickup_time"].' )
                </tr> <hr> 



           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
     
 }  
 ?>
    <head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <title>GaV Homepage</title>     
    </head>
    
<body>
<?php
$db=mysqli_connect('localhost','root','','gav_database');
$sql = "select * from booking inner join updates_place inner join updates ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle WHERE booking_id = '".$_POST["booking_id"]."'";
$records = mysqli_query($db, $sql);
 while($row = mysqli_fetch_array($records))  
 {
 echo"<fieldset id='fieldset-modal-view'>";

 echo "Your Booking Information:<br><hr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
 . "&nbsp;&nbsp;".$row['other']."<br><br>";
  echo "<br><img src='images/".$row['place_image']."'>";
 echo "<img src='images/".$row['image']."'>";
  echo"</fieldset>";    
 }                
?>  
            </body>
            </html>
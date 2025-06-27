 <?php  
 if(isset($_POST["booking_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "gav_database");  
      $query = "select * from booking inner join updates_place inner join updates ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle WHERE booking_id = '".$_POST["booking_id"]."'";

      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $total= $row['vehicle_price']  + $row['place_price'];
               
           $output .= ' 
                <tr>  
                     <label>Book ID : </label>
                     '.$row["booking_id"].'---'.$row["created_date"].'
                </tr> <hr>
                <tr>
                     <label>Destination : </label>
                     '.$row["place_name"].'  (Cost:'.$row["place_price"].')
                </tr><hr>  
                <tr>
                     <label>Choosen Vehicle : </label>
                     '.$row["vehicle_name"].' (Cost:'.$row["vehicle_price"].')
                </tr><hr> 
                <tr>  
                     <label>Trip Price : </label>
                     '. $total.' 
                </tr> <hr> 
                <tr>  
                     <label>Picking Place/Date&Time : </label>
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
  echo "<br><img src='admin/images/".$row['place_image']."'>";
 echo "<img src='admin/images/".$row['image']."'>";
  echo"</fieldset>";    
 }                
?>  
            </body>
            </html>
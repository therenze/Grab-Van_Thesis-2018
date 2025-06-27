<html> 
<head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <title>GaV Homepage</title>     
    </head>
    
<body>
<?php
$db=mysqli_connect('localhost','root','','gav_database');
$sql = "SELECT * FROM driver WHERE driver_id = '".$_POST["driver_id"]."'"; 
$records = mysqli_query($db, $sql);
 while($row = mysqli_fetch_array($records))  
 {
 echo"<fieldset id='fieldset-modal-view'>";
 echo "<br><img src='profile_images/".$row['driver_image']."'>";

  echo"</fieldset>";    
 }                
?>  
            </body>
            </html> 
<?php  
 if(isset($_POST["driver_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "gav_database");  
      $query = "SELECT * FROM driver WHERE driver_id = '".$_POST["driver_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
            
           $output .= ' 
               
             
               
                     <label>
                     '.$row["driver_fullname"].' 
                     </label>
                     <p>
                     '.$row["email_address"].' 
                     </p>
                     <br>
                     <p>
                     '.$row["place_address"].'<br>
                     '.$row["driver_status"].' / 
                     '.$row["driver_age"].'
                     </p>
                     <br>
                     <hr>
                     <h3>Objective</h3>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     '.$row["objective"].'
                         <hr>
                     <h3>Experience</h3>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     '.$row["experience"].'    
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
     
 }  
 ?>

<html> 
<head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <title>GaV Homepage</title>     
    </head>
    
<body>
<?php
$db=mysqli_connect('localhost','root','','gav_database');
$sql = "SELECT * FROM updates_place WHERE place_id = '".$_POST["place_id"]."'"; 
$records = mysqli_query($db, $sql);
 while($row = mysqli_fetch_array($records))  
 {
 echo"<fieldset id='fieldset-modal-view'>";
 echo "<br><img src='images/".$row['place_image']."'>";

  echo"</fieldset>";    
 }                
?>  
            </body>
            </html> 
<?php  
 if(isset($_POST["place_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "gav_database");  
      $query = "SELECT * FROM updates_place WHERE place_id = '".$_POST["place_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
            
           $output .= ' 
               
             
                '.$row["created_date"].'
                     <label>
                     '.$row["place_name"].' 
                     </label>
                     <p>
                     '.$row["place_usage"].' 
                     </p>
                     <br>
                     <p>
                     '.$row["place_price"].'<br>
                     
                     </p>
                     <br>
                     <hr>
                     <h3>Objective</h3>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     '.$row["discription"].'
                        
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
     
 }  
 ?>

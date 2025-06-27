 <?php  
 if(isset($_POST["van_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "gav_database");  
      $query = "SELECT * FROM updates WHERE van_id = '".$_POST["van_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
            
           $output .= ' 
                <tr>  
                     <label>ID : </label>
                     '.$row["van_id"].'---'.$row["created_date"].'
                </tr> <hr>
                <tr>
                     <label>Name : </label>
                     '.$row["vehicle_name"].' 
                </tr><hr>  
                <tr>  
                     <label>Vehicle Price : </label>
                     '.$row["vehicle_price"].'
                </tr> <hr> 
               <tr>  
                     <label>Vehicle Availability/Status : </label>
                     '.$row["vehicle_usage"].'
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
$sql = "SELECT * FROM updates WHERE van_id = '".$_POST["van_id"]."'"; 
$records = mysqli_query($db, $sql);
 while($row = mysqli_fetch_array($records))  
 {
 echo"<fieldset id='fieldset-modal-view'>";
 echo "<br><img src='admin/images/".$row['image']."'>";
 echo "<br>Vehicle Information:<br><hr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
 . "&nbsp;&nbsp;".$row['vehicle_discription']."<br><br>";
  echo"</fieldset>";    
 }                
?>  
            </body>
            </html>
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
                <tr>  
                     <label>ID : </label>
                     '.$row["place_id"].'---'.$row["created_date"].'
                </tr> <hr>
                <tr>
                     <label>Name : </label>
                     '.$row["place_name"].' 
                </tr><hr>  
                <tr>  
                     <label>Trip Price : </label>
                     '.$row["place_price"].'
                </tr> <hr> 
               <tr>  
                     <label>Availability/Status : </label>
                     '.$row["place_usage"].'
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
$sql = "SELECT * FROM updates_place WHERE place_id = '".$_POST["place_id"]."'"; 
$records = mysqli_query($db, $sql);
 while($row = mysqli_fetch_array($records))  
 {
 echo"<fieldset id='fieldset-modal-view'>";
 echo "<br><img src='admin/images/".$row['place_image']."'>";
 echo "<br>Information:<br><hr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
 . "&nbsp;&nbsp;".$row['discription']."<br><br>";
  echo"</fieldset>";    
 }                
?>  
            </body>
            </html>
<html> 
<head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
    </head>
    
<body>
<?php
$db=mysqli_connect('localhost','root','','gav_database');
$sql = "SELECT * FROM gav_user WHERE id = '".$_POST["id"]."'"; 
$records = mysqli_query($db, $sql);
 while($row = mysqli_fetch_array($records))  
 {
 echo"<fieldset id='fieldset-modal-view'>";
         if($row['user_image'] == '')
         {
                echo "<img class='profile' src='images/profile.png'>";
          }else{
                echo "<img src='profile_images/".$row['user_image']."'>";
          
                
          }

  echo"</fieldset>";    
 }                
?>  
            </body>
            </html> 
<?php  
 if(isset($_POST["id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "gav_database");  
      $query = "SELECT * FROM gav_user WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
            
           $output .= ' 
               
             
                    '.$row["created_date"].'
                     <label>
                     '.$row["first_name"].'  '.$row["last_name"].' 
                     </label>
                     <p>
                     '.$row["username"].' 
                     </p>
                     <br>
                     <p>
                     '.$row["age"].' / '.$row["phone_num"].'<br>
                     '.$row["email"].'
                     </p>
                     <br>
                     <hr>
                     <h3>Home Address</h3>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     '.$row["address"].'
                     <hr>
                     <h3>About User</h3>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     '.$row["about"].'    
                        
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
     
 }  
 ?>

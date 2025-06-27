 <?php  
 
$errors = array();
$okay = array();
 $db = mysqli_connect("localhost", "root", "", "gav_database");  
 if(isset($_POST))  
 {  
      $output = '';  
      $message = '';  
      $driver_fullname = mysqli_real_escape_string($db,$_POST["driver_fullname"]);
      $email_address = mysqli_real_escape_string($db,$_POST["email_address"]);
      $place_address = mysqli_real_escape_string($db,$_POST["place_address"]);
      $driver_age = mysqli_real_escape_string($db,$_POST["driver_age"]);
      $experience = mysqli_real_escape_string($db,$_POST["experience"]);
      $objective = mysqli_real_escape_string($db,$_POST["objective"]);
      $driver_status = mysqli_real_escape_string($db,$_POST["driver_status"]);
      
          if($_POST["driver_id"] != '')  
      {  
            $query = "  
           UPDATE driver  
           SET 
                
               driver_fullname='$driver_fullname',
               place_address='$place_address',
               email_address='$email_address',   
               objective='$objective',
                    driver_age='$driver_age',
                         driver_status='$driver_status',
                              experience='$experience'
           WHERE driver_id='".$_POST["driver_id"]."'"; 
            
            array_push($okay, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Record ".$_POST["driver_id"]." Updated! ");
            ?>
            <div id="close-messege">
                <img src="i783wQYjrKQ.png" style="margin-top:8px;left:83.5%;position:fixed;cursor: pointer"></div>
            <div id="messege">
            <center><?php  include('../errors.php'); ?><center>
            </div>
            <?php
      } 
      if(mysqli_query($db, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM driver ORDER BY driver_id DESC";  
           $records = mysqli_query($db, $select_query);
            echo $output;
           while($updates= mysqli_fetch_array($records)){
           echo"<fieldset id='fieldset'>";
                ?>
            <input type="button" name="view" value="VIEW" id="<?php echo $updates['driver_id'] ?>" class="call_modal_view">
            <input type="button" name="edit" value="EDIT" id="<?php echo $updates['driver_id'] ?>" class="call_modal_edit">
           
    <?php
                
                
                      echo "Update ID:".$updates['driver_id']."";
               if($updates['driver_image'] == '')
         {
                echo "<img class='profile' src='images/profile.png'>";
          }else{
                echo "<img src='profile_images/".$updates['driver_image']."'>";
          
                
          }
                echo "<br><br>Name:&nbsp;".$updates['driver_fullname']."<br>";
                echo "Status:&nbsp;".$updates['place_address']."";
                echo"</fieldset>";   
                
    }
                
      }
      
 }  
 ?>
<html>
<head>
    <meta charset="UTF-8">
    <link href="style/style.css" rel="stylesheet" type="text/css"/>   
    <script>
$(document).ready(function(){
	var arrow = $("#close-messege");
	var form = $("#messege");
	var status = false;
        $("#close-messege").on('click', function(){
            	arrow.fadeOut(200)
		form.slideUp(400);
		status = false;
        });
});

    </script>
</head>
<body>

</body>
</html>
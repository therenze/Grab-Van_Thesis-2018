 <?php  
 
$errors = array();
$okay = array();
 $db = mysqli_connect("localhost", "root", "", "gav_database");  
 if(isset($_POST))  
 {  
      $output = '';  
      $message = '';  
      $place_name = mysqli_real_escape_string($db,$_POST["place_name"]);
      $place_price = mysqli_real_escape_string($db,$_POST["place_price"]);
      $place_usage = mysqli_real_escape_string($db,$_POST["place_usage"]);
      $discription = mysqli_real_escape_string($db,$_POST["discription"]);
      
          if($_POST["place_id"] != '')  
      {  
            $query = "  
           UPDATE updates_place  
           SET 
                
               place_name='$place_name',
               place_price='$place_price',
               place_usage='$place_usage',   
               discription='$discription'    
           WHERE place_id='".$_POST["place_id"]."'"; 
            
            array_push($errors, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Record ".$_POST["place_id"]." Updated! ");
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
           $select_query = "SELECT * FROM updates_place ORDER BY place_id DESC";  
           $records = mysqli_query($db, $select_query);
            echo $output;
           while($updates= mysqli_fetch_array($records)){
           echo"<fieldset id='fieldset'>";
                ?>
            <input type="button" name="view" value="VIEW" id="<?php echo $updates['place_id'] ?>" class="call_modal_view">
            <input type="button" name="edit" value="EDIT" id="<?php echo $updates['place_id'] ?>" class="call_modal_edit">
           
    <?php
                
                
                      echo "Update ID:".$updates['place_id']."";
                echo "<img src='images/".$updates['place_image']."'>";
                echo "<br><br>Name:&nbsp;".$updates['place_name']."<br>";
                echo "Status:&nbsp;".$updates['place_usage']."";
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
            	arrow.fadeOut(0)
		form.slideUp(200);
		status = false;
        });
});

    </script>
</head>
<body>

</body>
</html>
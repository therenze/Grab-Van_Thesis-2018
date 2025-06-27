 <?php  
 
$errors = array();
$okay = array();
 $db = mysqli_connect("localhost", "root", "", "gav_database");  
 if(isset($_POST))  
 {  
      $output = '';  
      $message = '';  
      $vehicle_name = mysqli_real_escape_string($db,$_POST["vehicle_name"]);
      $vehicle_price = mysqli_real_escape_string($db,$_POST["vehicle_price"]);
      $vehicle_usage = mysqli_real_escape_string($db,$_POST["vehicle_usage"]);
      $vehicle_discription = mysqli_real_escape_string($db,$_POST["vehicle_discription"]);
      
          if($_POST["van_id"] != '')  
      {  
            $query = "  
           UPDATE updates   
           SET 
                
               vehicle_name='$vehicle_name',
               vehicle_price='$vehicle_price',
               vehicle_usage='$vehicle_usage',   
               vehicle_discription='$vehicle_discription'    
           WHERE van_id='".$_POST["van_id"]."'"; 
            
            array_push($errors, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Record ".$_POST["van_id"]." Updated! ");
            ?>
            <div id="close-messege">
                <img src="i783wQYjrKQ.png" style="margin-top:8px;left:87%;position:fixed;cursor: pointer"></div>
            <div id="messege">
            <center><?php  include('../errors.php'); ?><center>
            </div>
            <?php
      }  
      if(mysqli_query($db, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM updates ORDER BY van_id DESC";  
           $records = mysqli_query($db, $select_query);
            echo $output;
           while($updates= mysqli_fetch_array($records)){
           echo"<fieldset id='fieldset'>";
                ?>
            <input type="button" name="view" value="VIEW" id="<?php echo $updates['van_id'] ?>" class="call_modal_view">
            <input type="button" name="edit" value="EDIT" id="<?php echo $updates['van_id'] ?>" class="call_modal_edit">
           
    <?php
                
                
              echo "Vehicle ID:".$updates['van_id']."";
                echo "<img src='images/".$updates['image']."'>";
                echo "<br><br>Name:&nbsp;".$updates['vehicle_name']."<br>";
                echo "Status:&nbsp;".$updates['vehicle_usage']."";
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
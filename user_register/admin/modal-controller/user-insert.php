 <?php  
 
$errors = array();
$okay = array();
 $db = mysqli_connect("localhost", "root", "", "gav_database");  
 if(isset($_POST))  
 {  
      $output = '';  
      $message = '';  
      $first_name = mysqli_real_escape_string($db,$_POST["first_name"]);
      $last_name = mysqli_real_escape_string($db,$_POST["last_name"]);
      $age = mysqli_real_escape_string($db,$_POST["age"]);
      $phone_num = mysqli_real_escape_string($db,$_POST["phone_num"]);
      $address = mysqli_real_escape_string($db,$_POST["address"]);
       $email = mysqli_real_escape_string($db,$_POST["email"]);
        $about = mysqli_real_escape_string($db,$_POST["about"]);
          if($_POST["ids"] != '')  
      {  
            $query = "  
           UPDATE gav_user  
           SET 
                
               first_name='$first_name',
               last_name='$last_name',
                   age='$age',
                       phone_num='$phone_num',
                           address='$address',
                               email='$email',
                                   about='$about'
           WHERE id='".$_POST["ids"]."'"; 
            
            array_push($errors, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Record ".$_POST["ids"]." Updated! ");
            ?>
            <div id="close-messege">
                <img src="i783wQYjrKQ.png" style="margin-top:8px;left:83.5%;position:fixed;cursor: pointer"></div>
            <div id="messege">
            <center><?php  include('../errors.php'); ?><center>
            </div>
            <?php
      }  
      else  
      {  
           $query = "  
           INSERT INTO gav_user(first_name)  
           VALUES('$first_name');  
           ";  
           $message = 'Data Inserted';  
      }   
      if(mysqli_query($db, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM gav_user ORDER BY id DESC";  
           $records = mysqli_query($db, $select_query);
            echo $output;
           while($row= mysqli_fetch_array($records)){
           echo"<fieldset id='fieldset'>";
                ?>
            <input type="button" name="view" value="VIEW" id="<?php echo $row['id'] ?>" class="call_modal_view">
            <input type="button" name="edit" value="EDIT" id="<?php echo $row['id'] ?>" class="call_modal_edit">
           
    <?php
                
                
             
               echo "<legend>Update ID:".$row['id']."-----Date Created: ".$row['created_date']."</legend>";
                if($row['user_image'] == '')
         {
                echo "<img class='profile' src='images/profile.png'>";
          }else{
                echo "<img src='profile_images/".$row['user_image']."'>";
          
                
          }
                echo "Name:".$row['first_name']." ".$row['last_name']."<br><br>";
                echo "Username:".$row['username']."";
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
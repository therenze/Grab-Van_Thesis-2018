<?php include ('NavigationBar.php');

$errors = array();
$okay = array();

$db=mysqli_connect('localhost','root','','gav_database');
$sql = "SELECT * FROM driver ORDER BY driver_id DESC";
$records = mysqli_query($db, $sql);
if(mysqli_num_rows($records)==0){
   array_push($errors, "EMPTY");
}
$created_date = date('l, jS F Y '); //this is for the date //
// if upload is pressed
if(isset($_POST['upload'])){
    $target = "profile_images/".basename($_FILES['driver_image']['name']);
    $driver_fullname = mysql_real_escape_string($_POST['driver_fullname']);
    $place_address = mysql_real_escape_string($_POST['place_address']);
    $email_address = mysql_real_escape_string($_POST['email_address']);
    $driver_age = mysql_real_escape_string($_POST['driver_age']);
    $driver_status = mysql_real_escape_string($_POST['driver_status']);
   
    $objective = mysql_real_escape_string($_POST['objective']);
    $experience = mysql_real_escape_string($_POST['experience']);
    //connect to databse
    $db = mysqli_connect("localhost","root","", "gav_database");
    
    //get all the submitted data from the form
    $driver_image = $_FILES['driver_image']['name'];
   
    
           $sql = "INSERT INTO driver(driver_image, driver_fullname, place_address, email_address,objective, driver_age ,experience, driver_status, created_date) VALUES ('$driver_image','$driver_fullname','$place_address','$email_address','$objective','$driver_age','$experience','$driver_status','$created_date')"; 
           mysqli_query($db, $sql);
          echo "<meta http-equiv='refresh' content='0;url=driver_view.php'>";
           //move upload image to folder
           if(move_uploaded_file($_FILES['driver_image']['tmp_name'], $target)){
              array_push($okay, "Update Success Success!.."); 
           }  else {
               array_push($errors, "Update Unsuccessfull!..");
           }
           
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <link href="style/modal.css" rel="stylesheet" type="text/css"/>
        <link href="style/buttons.css" rel="stylesheet" type="text/css"/>
        <script src="jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
        
        <title>GaV Homepage</title>     
    </head>
    
<body>
    
<br><br><br><br><br>
<input type="button" name="add" value="ADD" class="call_modal_add">
<br>
    <div id="wrapper">
        <!--/this is the header/-->
         <div id="content"><!--/THIS IS THE CONTENT OF THE PAGE(TOP,CENTER AND BOTTOM)/-->
  
   <br>                 
<div id="content_center"><!--/this is the Content center/-->
            
          <div id="employee_table">
                <?php
    while($row= mysqli_fetch_array($records)){
        echo"<fieldset id='fieldset'>";
                ?>
             <input type="button" name="view" value="VIEW" id="<?php echo $row['driver_id'] ?>" class="call_modal_view">
             <input type="button" name="edit" value="EDIT" id="<?php echo $row['driver_id'] ?>" class="call_modal_edit">
    <?php
                
                
                echo "Update ID:".$row['driver_id']."";
                if($row['driver_image'] == '')
         {
                echo "<img class='profile' src='images/profile.png'>";
          }else{
                echo "<img src='profile_images/".$row['driver_image']."'>";
          
                
          }
                echo "<br><br>Name:".$row['driver_fullname']." <br>";
                echo "Username:".$row['place_address']."<br>";
                echo "Username:".$row['email_address']."";
                echo"</fieldset>";    
                
    }
                
?>                    
</div>  
</div>
             </div><!--/end content/-->
    <div id="footer"><!--/this is the Foooter/-->
                <p>
                <font color="#57b6cc">Copyright </font> &copy;2017 <br>          
                  Developer: Amante, Therenze Stephen E. 
                </p>
    </div>
</div>

<div id="dataModal" class="modal-add">
    <div class="modal_close close"></div>
    <div class="modal_main">
        <img src="i783wQYjrKQ.png" class="close" style="margin-top:13px;left:72%;position:fixed;">                            
        <h4><center/>Vehicle Details</h4> 
        <hr>
        <form method="post" action="driver_view.php" id="add_form" enctype="multipart/form-data">
           <input type="hidden" name="size" value="1000000">
                    <label>Choose Vehicle Picture</label>
                    <input type="file" name="driver_image" required>
                    <hr>
                    <label>Name of Van</label><br>
                    <input type="text" name="driver_fullname" placeholder="Fullname"required>
                    <hr>
                   
                    <label>Driver Age</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <label>Driver Status</label><br>
                    <input type="text" name="driver_age" placeholder="Age">
                     <select name="driver_status">  
                          <option>-----</option>
                        <option value="single">Single</option>  
                        <option value="married">Married</option> 
                        <option value="anal">Anal</option>
                    </select>
                    <br><br>
                    <label>Home Address</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Email Address</label><br>
                    <input type="text" name="place_address" placeholder="Place Address">
                    <input type='text'  name="email_address" placeholder="Email Address" >
                    <br><br>
                    <label>About</label><br>
                    <textarea name="objective" placeholder="objective" cols="92" rows="5"></textarea>
                    <label>About</label><br>
                    <textarea name="experience" placeholder="experience" cols="92" rows="5"></textarea>
                    
                    
                     <input type="submit" name="upload" value="Add New Update for Van" class="btn" id="btn" >    
                       
                       
                  
                    
                   
     </form>        
    </div>
</div>

<!--/MODAL VIEW/-->
<div id="dataModal" class="modal-view">
    <div class="modal_close close"></div>
    <div class="modal_main">
        <img src="i783wQYjrKQ.png" class="close" style="margin-top:13px;left:72%;position:fixed;">                            
        <h4><center/>DRIVER'S INFORMATION</h4> 
        <hr>
        <div class="modal-body" id="detail">
            
        </div>           
    </div>
</div>

<!--/MODAL EDIT/-->
<div id="dataModal" class="modal-edit">
    <div class="modal_close close"></div>
    <div class="modal_main">
            <img src="i783wQYjrKQ.png" class="close" style="margin-top:13px;left:72%;position:fixed;">                            
            <h4><center/>DRIVER'S INFORMATION</center></h4> 
            <hr>
            <div class="modal-body" id="vehicle-update">  
                    <form method="post" id="insert_form" enctype="multipart/form-data">
                    <input type="hidden" name="driver_id" id="driver_id">
                    <label>Name</label><br>
                    <input type="text" name="driver_fullname" id="driver_fullname" >
                    
                   
                    <br><br>
                    <label>Home Address</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Email Address</label>
                    <input type="text" name="driver_age" id="driver_age">
                    <input type='text'  name="driver_status" id="driver_status" >
                    <br><br>
                    <label>Home Address</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Email Address</label>
                    <input type="text" name="place_address" id="place_address">
                    <input type='text'  name="email_address" id="email_address" >
                    <br><br>
                    <label>About</label><br>
                    <textarea name="objective" id="objective" cols="92" rows="5"></textarea>
                    <label>About</label><br>
                    <textarea name="experience" id="experience" cols="92" rows="5"></textarea>
                    
                    
                        <center>
                            
                            
                            <input type="submit" name="insert" id="insert"  class="btn" />     
                        </center> 
                       
                </form>
                     
    </div>
    
</div>
    </div>
    <script>
    $(document).ready(function(){
  $(".close").click(function(){
	$(".modal-view").fadeOut(500);
	$(".modal_main").slideUp(400);
        
	  });
});
$(document).ready(function(){
  $(".close").click(function(){
	$(".modal-edit").fadeOut(500);
	$(".modal_main").slideUp(400);
        
	  });
});
$(document).on('click', '.call_modal_edit', function(){  
           var driver_id = $(this).attr("id");  
           $.ajax({  
                url:"modal-controller/driver-fetch.php",  
                method:"POST",  
                data:{driver_id:driver_id},  
                dataType:"json",  
                success:function(data){ 
                     $('#driver_fullname').val(data.driver_fullname);                   
                     
                      $('#driver_age').val(data.driver_age);
                     $('#driver_status').val(data.driver_status);
                     $('#email_address').val(data.email_address);
                     $('#place_address').val(data.place_address);
                     $('#experience').val(data.experience);
                      $('#objective').val(data.objective);
                     $('#driver_id').val(data.driver_id);  
                     $('#insert').val("Update");  
                     $(".modal-edit").fadeIn(400);
                      $(".modal_main").slideDown(500); 
                }  
           });  
      });
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();    
                $.ajax({  
                     url:"modal-controller/driver-insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){
                           
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                      
                      $('#insert_form')[0].reset();  
                      $(".modal-edit").fadeOut(400);
                      $(".modal_main").slideUp(500);  
                      $('#employee_table').html(data); 
                     }  
                });  
             
      });  
$(document).on('click', '.call_modal_view', function(){     
           var driver_id = $(this).attr("id");  
           if(driver_id != '')  
           {  
                $.ajax({  
                     url:"modal-controller/driver-select.php",  
                     method:"POST",  
                     data:{driver_id:driver_id},  
                     success:function(data){  
                        $('#detail').html(data);
                      	$(".modal-view").fadeIn(300);
                        $(".modal_main").slideDown(400);
                     }  
                });  
           }            
 }); 
 
$(document).on('click', '.call_modal_add', function(){     
           var driver_id = $(this).attr("id");  
           if(driver_id != '')  
           {  
                $.ajax({  
                     url:"driver_view.php",  
                     method:"POST",  
                     data:{driver_id:driver_id},  
                     success:function(data){  
                      	$(".modal-add").fadeIn(400);
                        $(".modal_main").slideDown(500);
                     }  
                });  
           }             
 }); 
     $(document).ready(function(){
  $(".close").click(function(){
	$(".modal-add").fadeOut(500);
	$(".modal_main").slideUp(400);
        
	  });
});
  </script>
  <script src="javascript/messege-transition.js" type="text/javascript"></script>
</body>
</html>
<?php include ('NavigationBar.php');

$errors = array();
$okay = array();

$db=mysqli_connect('localhost','root','','gav_database');
$sql = "SELECT * FROM updates ORDER BY van_id DESC";
$records = mysqli_query($db, $sql);
if(mysqli_num_rows($records)==0){
   array_push($errors, "EMPTY");
}
$created_date = date('l, jS F Y '); //this is for the date //
// if upload is pressed
if(isset($_POST['upload_van'])){
    $target = "images/".basename($_FILES['image']['name']);
    $vehicle_name = mysql_real_escape_string($_POST['vehicle_name']);
    $vehicle_price = mysql_real_escape_string($_POST['vehicle_price']);
    $vehicle_usage = mysql_real_escape_string($_POST['vehicle_usage']);
    $discription = mysql_real_escape_string($_POST['discription']);
    //connect to databse
    $db = mysqli_connect("localhost","root","", "gav_database");
    
    //get all the submitted data from the form
    $image = $_FILES['image']['name'];
    $discription = $_POST['discription'];
    
           $sql = "INSERT INTO updates(image, vehicle_discription, vehicle_name, vehicle_price,vehicle_usage, created_date) VALUES ('$image','$discription','$vehicle_name','$vehicle_price','$vehicle_usage','$created_date')"; 
           mysqli_query($db, $sql);
          echo "<meta http-equiv='refresh' content='0;url=deleteupdates.php'>";
           //move upload image to folder
           if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
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


<input type="button" name="add" value="ADD" id="<?php echo $updates['van_id'] ?>" class="call_modal_add">
<br>
    <div id="wrapper">
        <!--/this is the header/-->
         <div id="content"><!--/THIS IS THE CONTENT OF THE PAGE(TOP,CENTER AND BOTTOM)/-->
  
   <br>                 
<div id="content_center"><!--/this is the Content center/-->
            
          <div id="employee_table">
                <?php
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
        <form method="post" action="deleteupdates.php" id="add_form" enctype="multipart/form-data">
           <input type="hidden" name="size" value="1000000">
                    <label>Choose Vehicle Picture</label>
                    <input type="file" name="image" required>
                    <hr>
                    <label>Name of Van</label><br>
                    <input type="text" name="vehicle_name" required>
                    <hr>
                    <label>Price</label><br>
                    <input type="text" name="vehicle_price" required>
                    <hr>
                    <label>Vehicle Availability</label><br>
                    <select name="vehicle_usage" id="vehicle_usage">  
                        <option value="Available">Available</option>  
                        <option value="Not-Available">Not-Available</option> 
                        <option value="On-Repair">On-Repair</option>
                    </select>
                    <hr>
                    <label>Information about the update</label><br>
                    <textarea name="discription" cols="94" rows="5" placeholder="Say Something" required></textarea>
                                          <center>
                                              <input type="submit" name="upload_van" value="Add New Update for Van" class="btn" id="btn" >    
                       
                        <center><?php  include('errors.php'); ?></center>
                       
                    </center> 
                    
                   
     </form>        
    </div>
</div>
<!--/MODAL VIEW/-->
<div id="dataModal" class="modal-view">
    <div class="modal_close close"></div>
    <div class="modal_main">
        <img src="i783wQYjrKQ.png" class="close" style="margin-top:13px;left:72%;position:fixed;">                            
        <h4><center/>Vehicle Details</h4> 
        <hr>
        <div class="modal-body" id="vehicle-detail">
            
        </div>           
    </div>
</div>

<!--/MODAL EDIT/-->
<div id="dataModal" class="modal-edit">
    <div class="modal_close close"></div>
    <div class="modal_main">
            <img src="i783wQYjrKQ.png" class="close" style="margin-top:13px;left:72%;position:fixed;">                            
            <h4><center/>Adding updates to new Car</h4> 
            <hr>
            <div class="modal-body" id="vehicle-update">  
                    <form method="post" id="insert_form" enctype="multipart/form-data">
                            <input type="hidden" name="van_id" id="van_id">
                            <label>Name of Van</label><br>
                    <input type="text" name="vehicle_name" id="vehicle_name" >
                    <hr>
                    <label>Price</label><br>
                    <input type="text" name="vehicle_price" id="vehicle_price" >
                    <br><hr>
                    <label>Vehicle Availability/Status</label><br>
                    <select name="vehicle_usage" id="vehicle_uusage"> 
                        <option value="Available">Available</option>  
                        <option value="Not-Available">Not-Available</option> 
                        <option value="On-Repair">On-Repair</option> 
                    </select>
                    <br><hr>
                    <label>Information about the update</label>
                    <textarea name="vehicle_discription" id="vehicle_discription" cols="94" rows="5" placeholder="Say Something"></textarea>
                   
                    
                        <center>
                            
                            
                            <input type="submit" name="insert" id="insert" value="Insert" class="btn" />     
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
           var van_id = $(this).attr("id");  
           $.ajax({  
                url:"modal-controller/fetch.php",  
                method:"POST",  
                data:{van_id:van_id},  
                dataType:"json",  
                success:function(data){ 
                     $('#vehicle_name').val(data.vehicle_name);                   
                     $('#vehicle_price').val(data.vehicle_price);
                      $('#vehicle_uusage').val(data.vehicle_usage);
                     $('#vehicle_discription').val(data.vehicle_discription);
                     $('#van_id').val(data.van_id);  
                     $('#insert').val("Update");  
                     $(".modal-edit").fadeIn(400);
                      $(".modal_main").slideDown(500); 
                }  
           });  
      });
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();    
                $.ajax({  
                     url:"modal-controller/insert.php",  
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
           var van_id = $(this).attr("id");  
           if(van_id != '')  
           {  
                $.ajax({  
                     url:"modal-controller/select.php",  
                     method:"POST",  
                     data:{van_id:van_id},  
                     success:function(data){  
                        $('#vehicle-detail').html(data);
                      	$(".modal-view").fadeIn(300);
                        $(".modal_main").slideDown(400);
                     }  
                });  
           }             
 }); 
 
 $(document).on('click', '.call_modal_add', function(){     
           var van_id = $(this).attr("id");  
           if(van_id != '')  
           {  
                $.ajax({  
                     url:"deleteupdates.php",  
                     method:"POST",  
                     data:{van_id:van_id},  
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
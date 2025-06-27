<?php include ('NavigationBar.php');

$errors = array();
$okay = array();

$db=mysqli_connect('localhost','root','','gav_database');
$sql = "SELECT * FROM updates_place ORDER BY place_id DESC";
$records = mysqli_query($db, $sql);
if(mysqli_num_rows($records)==0){
   array_push($errors, "EMPTY");
}
$created_date = date('l, jS F Y '); //this is for the date //
// if upload is pressed
if(isset($_POST['upload_place'])){
    $target = "images/".basename($_FILES['place_image']['name']);
    $place_name = mysql_real_escape_string($_POST['place_name']);
    $place_price = mysql_real_escape_string($_POST['place_price']);
    $place_usage = mysql_real_escape_string($_POST['place_usage']);
    $discription = mysql_real_escape_string($_POST['discription']);
    //connect to databse
    $db = mysqli_connect("localhost","root","", "gav_database");
    
    //get all the submitted data from the form
    $place_image = $_FILES['place_image']['name'];
    $discription = $_POST['discription'];
    
           $sql = "INSERT INTO updates_place(place_image, discription, place_name, place_price, place_usage, created_date) VALUES ('$place_image','$discription','$place_name','$place_price','$place_usage','$created_date')"; 
           mysqli_query($db, $sql);
          echo "<meta http-equiv='refresh' content='0;url=deleteupdates_place.php'>";
           //move upload image to folder
           if(move_uploaded_file($_FILES['place_image']['tmp_name'], $target)){
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
             <input type="button" name="view" value="VIEW" id="<?php echo $updates['place_id'] ?>" class="call_modal_view">
            <input type="button" name="edit" value="EDIT" id="<?php echo $updates['place_id'] ?>" class="call_modal_edit">
    <?php
                
                
                echo "Update ID:".$updates['place_id']."";
                echo "<img src='images/".$updates['place_image']."'>";
                echo "<br><br>Name:&nbsp;".$updates['place_name']."<br>";
                echo "Status:&nbsp;".$updates['place_usage']."";
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
        <h4><center/>PLACE DETAIL'S</h4> 
        <hr>
        <form method="post" action="deleteupdates_place.php" id="add_form" enctype="multipart/form-data">
           <input type="hidden" name="size" value="1000000">
                    <label>Choose Vehicle Picture</label>
                    <input type="file" name="place_image" required>
                    <hr>
                    <label>Name of Van</label><br>
                    <input type="text" name="place_name" required>
                    <hr>
                    <label>Price</label><br>
                    <input type="text" name="place_price" required>
                    <hr>
                    <label>Vehicle Availability</label><br>
                    <select name="place_usage" id="place_usage">  
                        <option value="Available">Available</option>  
                        <option value="Not-Available">Not-Available</option> 
                        <option value="On-Repair">On-Repair</option>
                    </select>
                    <hr>
                    <label>Information about the update</label><br>
                    <textarea name="discription" cols="94" rows="5" placeholder="Say Something" required></textarea>
                                          <center>
                                              <input type="submit" name="upload_place" value="Add New Update for Van" class="btn" id="btn" >    
                       
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
        <h4><center/>PLACE DETAIL'S </h4> 
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
            <h4><center/>PLACE DETAIL'S</h4> 
            <hr>
            <div class="modal-body" id="vehicle-update">  
                    <form method="post" id="insert_form" enctype="multipart/form-data">
                            <input type="hidden" name="place_id" id="place_id">
                            
                    <label>Name of Van</label><br>
                    <input type="text" name="place_name" id="place_name" >
                    <hr>
                    <label>Price</label><br>
                    <input type="text" name="place_price" id="place_price" >
                    <br><hr>
                    <label>Vehicle Availability/Status</label><br>
                    <select name="place_usage" id="place_uusage"> 
                        <option value="Available">Available</option>  
                        <option value="Not-Available">Not-Available</option> 
                        <option value="On-Repair">On-Repair</option> 
                    </select>
                    <br><hr>
                    <label>Information about the update</label>
                    <textarea name="discription" id="discription" cols="94" rows="5" placeholder="Say Something"></textarea>
                   
                    
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
           var place_id = $(this).attr("id");  
           $.ajax({  
                url:"modal-controller/place-fetch.php",  
                method:"POST",  
                data:{place_id:place_id},  
                dataType:"json",  
                success:function(data){ 
                     $('#place_name').val(data.place_name);                   
                     $('#place_price').val(data.place_price);
                      $('#place_uusage').val(data.place_usage);
                     $('#discription').val(data.discription);
                     $('#place_id').val(data.place_id);  
                     $('#insert').val("Update");  
                     $(".modal-edit").fadeIn(400);
                      $(".modal_main").slideDown(500); 
                }  
           });  
      });
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();    
                $.ajax({  
                     url:"modal-controller/place-insert.php",  
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
           var place_id = $(this).attr("id");  
           if(place_id != '')  
           {  
                $.ajax({  
                     url:"modal-controller/place-select.php",  
                     method:"POST",  
                     data:{place_id:place_id},  
                     success:function(data){  
                        $('#detail').html(data);
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
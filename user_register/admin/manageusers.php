<?php include ('NavigationBar.php');

$errors = array();
$okay = array();

$db=mysqli_connect('localhost','root','','gav_database');
$sql = "SELECT * FROM gav_user ORDER BY id DESC";
$records = mysqli_query($db, $sql);
if(mysqli_num_rows($records)==0){
   array_push($errors, "EMPTY");
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
    
<br><br><br>
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
             <input type="button" name="view" value="VIEW" id="<?php echo $row['id'] ?>" class="call_modal_view">
             <input type="button" name="edit" value="EDIT" id="<?php echo $row['id'] ?>" class="call_modal_edit">
    <?php
                
                
                echo "Update ID:".$row['id']."";
                if($row['user_image'] == '')
         {
                echo "<img class='profile' src='images/profile.png'>";
          }else{
                echo "<img src='profile_images/".$row['user_image']."'>";
          
                
          }
                echo "<br><br>Name:".$row['first_name']." ".$row['last_name']."<br>";
                echo "Username:".$row['username']."";
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
<!--/MODAL VIEW/-->
<div id="dataModal" class="modal-view">
    <div class="modal_close close"></div>
    <div class="modal_main">
        <img src="i783wQYjrKQ.png" class="close" style="margin-top:13px;left:72%;position:fixed;">                            
        <h4><center/>USER ACCOUNT DETAIL'S</h4> 
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
            <h4><center/>USER ACCOUNT DETAIL'S</center></h4> 
            <hr>
            <div class="modal-body" id="vehicle-update">  
                    <form method="post" id="insert_form" enctype="multipart/form-data">
                    <input type="hidden" name="ids" id="id">
                    <label>Name</label><br>
                    <input type="text" name="first_name" id="first_name" >
                    <input type="text" name="last_name" id="last_name">
                   
                    <br><br>
                    <label>Age</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Contact Number</label><br>
                    
                    <input type="text" name="phone_num" id="phone_num">
                    <input type='text'  name="age" id="age" >
                    <br><br>
                    <label>Home Address</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Email Address</label>
                    <input type="text" name="address" id="address">
                    <input type="email" name="email" id="email">
                    <br><br>
                    <label>About</label><br>
                    <textarea name="about" id="about" cols="92" rows="5"></textarea>
                    
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
           var id = $(this).attr("id");  
           $.ajax({  
                url:"modal-controller/user-fetch.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){ 
                     $('#first_name').val(data.first_name);                   
                     $('#last_name').val(data.last_name);
                      $('#age').val(data.age);
                     $('#phone_num').val(data.phone_num);
                     $('#address').val(data.address);
                     $('#email').val(data.email);
                     $('#about').val(data.about);
                     $('#id').val(data.id);  
                     $('#insert').val("Update");  
                     $(".modal-edit").fadeIn(400);
                      $(".modal_main").slideDown(500); 
                }  
           });  
      });
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();    
                $.ajax({  
                     url:"modal-controller/user-insert.php",  
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
           var id = $(this).attr("id");  
           if(id != '')  
           {  
                $.ajax({  
                     url:"modal-controller/user-select.php",  
                     method:"POST",  
                     data:{id:id},  
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
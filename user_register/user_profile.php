<?php include('NavigationBar/user_homepageNav.php');
//kani sa register
$username = $_SESSION['username'];
//connect to database
$db=mysqli_connect('localhost','root','','gav_database');
$sql = "select * from gav_user where username='".$_SESSION['username']."' ";
$records = mysqli_query($db, $sql);


if(isset($_POST['upload_place'])){
    $target = "admin/profile_images/".basename($_FILES['user_image']['name']);
    //connect to databse
    //get all the submitted data from the form
    $user_image = $_FILES['user_image']['name'];
    
           $sql = "UPDATE gav_user SET user_image='$user_image' WHERE username='$username' ";
         mysqli_query($db, $sql);
          echo "<meta http-equiv='refresh' content='0;url=user_profile.php'>";
           //move upload image to folder
        if(move_uploaded_file($_FILES['user_image']['tmp_name'], $target)){
        $msg = "sucess";
           }  else {
           $msg = "note";    
           }
}      

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/user_style.css" rel="stylesheet" type="text/css"/>  
        <script src="jQuery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="style/buttons.css" rel="stylesheet" type="text/css"/>
        <link href="style/modal.css" rel="stylesheet" type="text/css"/>
    </head>
    
<body>  
<br><br><br><br>

<div id="wrapper">            
<?php
    while ($gav_user= mysqli_fetch_assoc($records)){
        ?>
        <div class='profile-wrapper'>
        <input type="button" name="edit" value="EDIT" id="<?php echo $gav_user['id'] ?>" class="call_modal_edit">
        <input type="button" name="add" value="PICTURE" id="<?php echo $gav_user['id'] ?>" class="call_modal_add">
       
        <?php
            if($gav_user['user_image'] == ''){
                echo "<img class='profile' src='image/profile.png'>";}
            else{
              echo "<img class='profile' src='admin/profile_images/".$gav_user['user_image']."'>";}
            ?>
          
            <label><?php echo"".$gav_user['first_name']."  ".$gav_user['last_name'].""?></label><br>
                   <?php echo"<img class='location-icon' src='image/s.jpg'>".$gav_user['address'].""?>
        <br><br><br>
            
            <p1>Account Information</p1><br>
            <p><?php echo"Username: ".$gav_user['username'].""?><br>
            Password: Sorry you can't change your password.
            <br><br>
            </p>
            <p1>Personal Information</p1><br>      
            <p><?php echo"Age: ".$gav_user['age'].""?><br>
               <?php echo"Email Address: ".$gav_user['email'].""?><br>
               <?php echo"Phone Number: ".$gav_user['phone_num'].""?><br>
            
               
        </div> 
        <div class='about-wrapper'>
            <p1>About yourself</p1><br>      
            <p><?php echo" ".$gav_user['about'].""?><br>
               
        </div>
<?php
}
?>

</div>
<div id="dataModal" class="modal-add">
    <div class="modal_close close"></div>
    <div class="modal_main">
        <img src="i783wQYjrKQ.png" class="close" style="margin-top:13px;left:72%;position:fixed;">                            
        <h4><center>PROFILE PICTURE</center></h4> 
        <hr>
          <form method="post" action="user_profile.php" enctype="multipart/form-data">
           <input type="hidden" name="size" value="1000000">
                    <label>Choose Vehicle Picture</label>
                    <input type="file" name="user_image" required>
                    <hr>
                                           <center>
                            <input type="submit" name="upload_place" id="upload_place" value="INSERT" class="btn" />     
                        </center> </form>        
    </div>
</div>
<!--/MODAL EDIT/-->
<div id="dataModal" class="modal-edit">
    <div class="modal_close close"></div>
    <div class="modal_main">
        <img src="i783wQYjrKQ.png" class="close" style="margin-top:13px;left:72%;position:fixed;">                            
        <h4><center>GAV PROFILE UPDATE</center></h4> 
           
            <div class="modal-body" id="vehicle-update">  
                    <form method="post" id="insert_form" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                    <hr>       
                    <label>Your name ( Firstname & Lastname )</label>
                    <br>
                    <input type="text" name="first_name" id="first_name" >
                    <input type="text" name="last_name" id="last_name" >
                    <br><br><hr>
                    <label>Account Information ( Username / Password )</label><br>
                     Cant be editable
                    
                    <br><br><hr>
                    <label>Personal Information ( Age, Number, Email )</label><br>
                    <input type="text" name="age" id="age" >
                    <input type="text" name="phone_num" id="phone_num" >
                    <br><br>
                     <input type="text" name="address" id="address" >
                    <input type="text" name="email" id="email" >
                    <br><br><hr>
                    <label>About yourself</label><br>
                   
                    <textarea name="about" id="about" cols="89" rows="5" placeholder="Say Something"></textarea>
                   
                    
                        <center>
                            <input type="submit" name="insert" id="insert" value="INSERT" class="btn" />     
                        </center> 
                       
                </form>
                     
    </div>
    
</div>
    </div>
    <div id="footer"><!--/this is the Foooter/-->
                <p>
                <font color="#57b6cc">Copyright </font> &copy;2017 <br>          
                  Developer: Amante, Therenze Stephen E. 
                </p>
    </div>
    <script>
    $(document).ready(function(){
  $(".close").click(function(){
	$(".modal-edit").fadeOut(500);
	$(".modal_main").slideUp(400);
        
	  });
}); 
$(document).on('click', '.call_modal_edit', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"modal-controller/profile-fetch.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){ 
                     $('#first_name').val(data.first_name);                   
                     $('#last_name').val(data.last_name);

                     $('#age').val(data.age);
                     $('#phone_num').val(data.phone_num);
                      $('#email').val(data.email);
                      $('#address').val(data.address);
                      $('#about').val(data.about);
                      $('#id').val(data.id);  
                     $('#insert').val("UPDATE");  
                     $(".modal-edit").fadeIn(400);
                      $(".modal_main").slideDown(500); 
                }  
           });  
      });
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();    
                $.ajax({  
                     url:"modal-controller/profile-insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){
                           
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                      
                      $('#insert_form')[0].reset();  
                      $(".modal-edit").fadeOut(400);
                      $(".modal_main").slideUp(500);  
                      $('#wrapper').html(data); 
                     }  
                });  
             
      }); 
 $(document).on('click', '.call_modal_add', function(){     
           var id = $(this).attr("id");  
           if(id != '')  
           {  
                $.ajax({  
                     url:"user_profile.php",  
                     method:"POST",  
                     data:{id:id},  
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
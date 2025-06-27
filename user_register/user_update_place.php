
<?php include('NavigationBar/user_homepageNav.php');
$errors = array();
$okay = array();

$db=mysqli_connect('localhost','root','','gav_database');
$sql = "SELECT * FROM updates_place ORDER BY place_id DESC";
$records = mysqli_query($db, $sql);
if(mysqli_num_rows($records)==0){
   array_push($errors, "EMPTY");
}
$created_date = date('l, jS F Y '); //this is for the date //

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/user_style.css" rel="stylesheet" type="text/css"/>
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
    while($updates= mysqli_fetch_array($records)){
        echo"<fieldset id='fieldset'>";
                ?>
             <input type="button" name="view" value="VIEW" id="<?php echo $updates['place_id'] ?>" class="call_modal_view">
            <?php
                
                echo "Status:&nbsp;".$updates['place_usage']."";
                echo "<img src='admin/images/".$updates['place_image']."'>";
                echo "<br><br>Name:&nbsp;".$updates['place_name']."<br>";
                echo "Update ID:".$updates['place_price'].""; 
                echo"</fieldset>";    
                
    }
                
?>                    
</div>  
</div>
        </div>
         </div><!--/end content/-->
    <div id="footer"><!--/this is the Foooter/-->
                <p>
                <font color="#57b6cc">Copyright </font> &copy;2017 <br>          
                  Developer: Amante, Therenze Stephen E. 
                </p>
    </div>

<!--/MODAL VIEW/-->
<div id="dataModal" class="modal-view">
    <div class="modal_close close"></div>
    <div class="modal_main">
        <img src="i783wQYjrKQ.png" class="close" style="margin-top:13px;left:72%;position:fixed;">                            
        <h4><center/>PLACE DETAILS</h4> 
        <hr>
        <div class="modal-body" id="detail">
            
        </div>           
    </div>
</div>
 <script>
    $(document).ready(function(){
  $(".close").click(function(){
	$(".modal-view").fadeOut(300);
	$(".modal_main").slideUp(300);
        
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
                      	$(".modal-view").fadeIn(200);
                        $(".modal_main").slideDown(400);
                     }  
                });  
           }             
 }); 

</script>
  <script src="javascript/messege-transition.js" type="text/javascript"></script>
</body>
</html>
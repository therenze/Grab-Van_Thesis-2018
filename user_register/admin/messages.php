<?php include ('NavigationBar.php');
//kani sa register
//connect to database
$db=mysqli_connect('localhost','root','','gav_database');
$sql = "select * from contact_us inner join gav_user WHERE contact_us.gav_user_username=gav_user.username ORDER BY concern_id DESC";
$records = mysqli_query($db, $sql);

if(isset($_GET['concern_id'])){
    $concern_id = ($_GET['concern_id']);
    $sql = "DELETE FROM contact_us WHERE concern_id ='$concern_id'";
    mysqli_query($db, $sql); 
    header("location: messages.php");
}


?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <title>GaV Homepage</title>     
    </head>
    
<body>
    
<br><br><br><br>
    <div id="wrapper">
        <!--/this is the header/-->
         <div id="content"><!--/THIS IS THE CONTENT OF THE PAGE(TOP,CENTER AND BOTTOM)/-->
                <div id="content_top"><!--/this is the Content top/-->
                    <h4>WANT TO BOOK?</h4>
                    <p>GaV(Grab a Van), Offer expirations on booking, 
                       Canceling of booking can be done 12hours after you book, 
                        Your payments will be returned to you with a 20% of money deduction,
                    </p>
                </div>
             
<div id="content_center"><!--/this is the Content center/-->

<?php
    while ($contact_us= mysqli_fetch_assoc($records)){
        echo"<fieldset id='fieldset_profile'>";
            
            ?>
    <a href="messages.php?concern_id=<?php echo $contact_us['concern_id']; ?>" class="btnn">DELETE</a>
            <?php
            
            echo"<legend>Sender: ".$contact_us['gav_user_username']." ---- Sent on: ".$contact_us['created_date']."</legend>";
             echo "<img  src='profile_images/".$contact_us['user_image']."'>";
            echo "<h5>Concerns and Problem: </h5> ".$contact_us['concern']."<br><br></td>";
                
        echo"</fieldset>";
}
?>
</div>  
</div><!--/end content/-->
    
<div id="footer"><!--/this is the Foooter/-->
                <p>
                <font color="#57b6cc">Copyright </font> &copy;2017 <br>          
                  Developer: Amante, Therenze Stephen E. 
                </p>
</div>
</div><!--/End of the wrapper /-->
</body>
</html>
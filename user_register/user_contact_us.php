
<?php include('NavigationBar/user_homepageNav.php');
// include navigation bar to display an navigation bar
//Session username is equal to gav_user_username to store data to the database
$gav_user_username = $_SESSION['username'];
$okay = array();
$errors = array();
$created_date = date('l, jS F Y '); 
//connect to database
$db=mysqli_connect('localhost','root','','gav_database');

//if the Submit concern botton is clicked
if(isset($_POST['submit_concern'])){
    //escape string para sa mysql enjection
    $concern = mysql_real_escape_string($_POST['concern']);
    //insert data to the data base if the submit concern is press
    $sql = "INSERT INTO contact_us (concern_id,gav_user_username, created_date, concern)VALUES('','$gav_user_username','$created_date','$concern')";
    mysqli_query($db, $sql); 
    //display message (okay-connected to serser/server.php
    array_push($okay, "Send Successfully.....!");   
    $concern = "";
    //meta refresh to redirect user after sending the message
    echo "<meta http-equiv='refresh' content='1;url=user_contact_us.php'>";
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="style/user_style.css" rel="stylesheet" type="text/css"/>
        <title>GaV Homepage</title>     
    </head>
    
<body>
<br><br><br><br>
    <div id="wrapper">
        
    <div id="content"><!--/THIS IS THE CONTENT OF THE PAGE(TOP,CENTER AND BOTTOM)/-->
            <div id="content_top"><!--/this is the Content top/-->
                <h4>CONTACT US.</h4>
                    <p>Feel free to contact us, at anytime and we will make sure to handle all of your concerns regarding
                        on our websites, bookings, driver's, vehicle's, and etc.
                    </p>
            </div><!--/End of content top/-->
             
            <div id="content_center"> <!--/content center div/--!>
            
                <?php include('server/errors.php');?><!--/include server errors to display the following errors or message/-->
            
            <form method="post" action="user_contact_us.php">
                <fieldset id="fieldset1"><!--/fieldset to group or  wrap the content inside/-->
                    <legend id="legend">Contact Us.</legend><!--/legend title of the fieldset/-->
                    <div id="btn"><!--/div btn this is the div of submit button/-->
                        <center>
                        <input type="submit" name="submit_concern" value="SEND" class="btnn" onclick="return confirm('NOTE: Really want to send this? ')" >    
                        </center>
                    </div><!--/End of submit button/-->
                            
                    <label><h4>Concern's And Problems:</label>
                        <div id="about">
                            <textarea type="text" name="concern" placeholder="Write your concerns here.." required></textarea>
                        </div>
                 </fieldset> <!--/End of fieldset/-->
            </form><!--/End of form/-->
        </div> <!--/End of content center/--> 
             
    </div><!--/end content/-->
</div>        
    <div id="footer"><!--/this is the Foooter/-->
        <p><font color="#57b6cc">Copyright </font> &copy;2017 <br>          
                  Developer: Amante, Therenze Stephen E. 
        </p>
    </div><!--/End of footer/-->
<!--/End of the wrapper /-->
</body>
</html>
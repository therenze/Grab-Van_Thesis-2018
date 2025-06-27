<?php
$db=mysqli_connect('localhost','root','','gav_database');
$first_name = mysql_real_escape_string($_POST["first_name"]);
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
       $password = md5($password);// naka encrypt perme
        $query = "SELECT * FROM gav_user WHERE first_name='$first_name' AND username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);
         
        if(mysqli_num_rows($result)==1){
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['first_name']=$first_name;
        echo "<div id='loading-bg'></div>";
        echo "<div id='loading'></div>";
        echo "Success, Please wait..";
        echo "<meta http-equiv='refresh' content='2;url=user_homepage.php'>";
        
        }
        else{
            echo "Something did not Match! Please Try Again!";
                       
}

?>


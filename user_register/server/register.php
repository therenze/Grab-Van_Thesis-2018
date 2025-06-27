<?php
$errors = array();
$okay = array();
//kani sa register
$created_date = date('l, jS F Y '); 
//connect to database
$db=mysqli_connect('localhost','root','','gav_database');
if(isset($_POST['register'])){
//if the register button is clicked
    $first_name = mysql_real_escape_string($_POST['first_name']);
    $last_name = mysql_real_escape_string($_POST['last_name']);
    $phone_num = mysql_real_escape_string($_POST['phone_num']);
    $age = mysql_real_escape_string($_POST['age']);
    $email = mysql_real_escape_string($_POST['email']);
    $address = mysql_real_escape_string($_POST['address']);
    $about= mysql_real_escape_string($_POST['about']);
   
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $password_1 = mysql_real_escape_string($_POST['password_1']);
    
//checking for similarity of username
 $sqll = "SELECT * FROM gav_user WHERE username='$username'";
 $result= mysqli_query($db,$sqll); 
 //ensure that form fields are filled properly
if(mysqli_num_rows($result)>0){
 array_push($errors, "Username already been used");   
   
}
if($password_1 != $password){
    array_push($errors, "Password dont match");   
}

// if there are no errors, save user to database
if(count($errors)== 0){
    
    $password = md5($password);//<--encrypt password before storing in database
    $sql = "INSERT INTO gav_user (first_name, last_name, phone_num, age, email,address, about, username, password, created_date)
            VALUES('$first_name','$last_name','$phone_num','$age','$email','$address','$about','$username','$password','$created_date')";
    mysqli_query($db, $sql); 
    array_push($okay, "Registered Successfully");    
     echo "<meta http-equiv='refresh' content='1;url=register_a.php'>";
  
}
}

?>


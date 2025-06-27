<?php
session_start();

$admin_user="";
$admin_password="";
$password_1="";
$errors = array();
$okay = array();
$created_date = date('l, jS F Y '); 


//connect to database
$db=mysqli_connect('localhost','root','','gav_database');

//if the register button is clicked
if(isset($_POST['submit'])){
    $admin_user = mysql_real_escape_string($_POST['admin_user']);
    $admin_password = mysql_real_escape_string($_POST['admin_password']);
    

 $sql = "SELECT * FROM admin WHERE admin_user='$admin_user'";
 $result= mysqli_query($db,$sql); 
if(mysqli_num_rows($result)>0){
   array_push($errors, "Username: ( $admin_user) is already taken");
}

//ensure that form fields are filled properly
if(empty($admin_user && $admin_password)){
    array_push($errors,"Something is missing or wrong, Please fill up alll the fields");
}
if($password_1 != $admin_password){
    array_push($errors, "Password dont match!");
}
// if there are no errors, save user to database
if(count($errors)== 0){
    $password = md5($password);//<--encrypt password before storing in database
    $sql = "INSERT INTO gav_user (admin_user, admin_password, created_date)
            VALUES('$admin_user','$admin_password','$created_date')";

$admin_user="";
$admin_password="";
$password_1="";

    mysqli_query($db, $sql); 
    array_push($okay, "New Admin has been Added");      
}
}


//kani sa login
//login sa user from login_a.php
if(isset($_POST['login'])){
    $admin_user = mysql_real_escape_string($_POST['admin_user']);
    $admin_password = mysql_real_escape_string($_POST['admin_password']);
//ensure that form fields are filled properly
 if(empty($_POST['admin_user'] && $_POST['admin_password'])){
    array_push($errors,"Something is missing, Please fill up alll the fields");
 } 
    //count ang error para sa login
    if(count($errors)== 0){
       
        $sql = "SELECT * FROM admin WHERE admin_user='$admin_user' AND admin_password='$admin_password'";
        $result = mysqli_query($db, $sql);
if(mysqli_num_rows($result)==1){
        
                //e login ang user
        //session to redirect to home page is successfuly log-in
        $_SESSION['admin_user']=$admin_user;
       
        header('location: dashboard.php');// e redirect na sa home page
        }
        else{
            array_push($errors, "Something went wrong!, Please try again..");
    
        } 
    }
            
}
?>


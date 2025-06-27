
<?php
$vehicle_name ="";
$vehicle_price ="";
$vehicle_usage="";
$discription="";
$place_name="";
$place_name="";
$errors = array();
$okay = array();
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
          echo "<meta http-equiv='refresh' content='2;url=add_updates.php'>";
           //move upload image to folder
           if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
              array_push($okay, "Update Success Success!.."); 
           }  else {
               array_push($errors, "Update Unsuccessfull!..");
           }
           
}
if(isset($_POST['upload_place'])){
    $target = "images/".basename($_FILES['image']['name']);
    $place_name = mysql_real_escape_string($_POST['place_name']);
    $place_price = mysql_real_escape_string($_POST['place_price']);
     $place_usage = mysql_real_escape_string($_POST['place_usage']);
    //connect to databse
    $db = mysqli_connect("localhost","root","", "gav_database");
    
    //get all the submitted data from the form
    $place_image = $_FILES['image']['name'];
    $discription = $_POST['discription'];
    
           $sql = "INSERT INTO updates_place(place_image, discription, place_name, place_price, place_usage, created_date) VALUES ('$place_image','$discription','$place_name','$place_price','$place_usage','$created_date')"; 
           mysqli_query($db, $sql);
           echo "<meta http-equiv='refresh' content='1;url=add_updates.php'>";
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
        <title>Image Upload</title>
    </head>
    <body><br><br><br><br>
        
        <div id="wrapper">
        <div id="content_van">
            <br><br>
            <center><?php  include('errors.php'); ?></center>
            <fieldset id="fieldset">
        <legend><h4>Adding updates to new Car</h4></legend>
         
        <form method="post" action="add_updates.php" enctype="multipart/form-data">
           
                <input type="hidden" name="size" value="1000000">
                    <label>Name of Van</label><br>
                    <input type="text" name="vehicle_name" required>
                    <hr>
                    <label>Price</label>
                    <input type="text" name="vehicle_price" required>
              
                    <label>Vehicle Availability</label>
                    <input type="text" name="vehicle_usage">
                    
                    <br><br><br>
                    <label>Choose Vehicle Picture</label>
                    <input type="file" name="image" required>
                    <br><br>
                    <h4>Information about the update</h4>
                    <textarea name="discription" cols="40" rows="5" placeholder="Say Something" required></textarea>
               
                     <div id="btn">
                        <center>
                        <input type="submit" name="upload_van" value="Add New Update for Van" class="btn" >    
                        
                    </center> 
               
          
        
        </form>
            </fieldset>
          
            <fieldset id="fieldset">
              <legend><h4>Adding updates to new Place</h4></legend>
       
              <form method="post" action="add_updates.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
            
                    <label>Name of the Update</label>
                    <input type="text" name="place_name" required>
                    
                    <label>Price</label>
                    <input type="text" name="place_price" required>
                    
                    <label>Place Availability</label>
                    <input type="text" name="place_usage" required>
                    
                    <br><br><br>
                    <label>Choose Picture</label>
                    <input type="file" name="image" required>
            
                    <br><br>
                    <h4>Information about the Update:</h4>
                    <textarea name="discription" cols="40" rows="5" placeholder="Say Something" required></textarea>
                
                
                        <div id="btn">
                        <center>
                        <input type="submit" name="upload_place" value="Add New Update for Place" class="btn" >    
                        
                        </center> 
                </div>
                
            </form> 
          </fieldset>
        </div>
        </div>
    </body>
</html>

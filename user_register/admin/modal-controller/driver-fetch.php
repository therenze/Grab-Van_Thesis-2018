 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "gav_database");  
 if(isset($_POST["driver_id"]))  
 {  
      $query = "SELECT * FROM driver WHERE driver_id = '".$_POST["driver_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
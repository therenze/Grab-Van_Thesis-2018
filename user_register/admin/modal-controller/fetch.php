 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "gav_database");  
 if(isset($_POST["van_id"]))  
 {  
      $query = "SELECT * FROM updates WHERE van_id = '".$_POST["van_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
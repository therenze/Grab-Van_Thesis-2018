 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "gav_database");  
 if(isset($_POST["id"]))  
 {  
      $query = "SELECT * FROM gav_user WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
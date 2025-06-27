 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "gav_database");  
 if(isset($_POST["place_id"]))  
 {  
      $query = "SELECT * FROM updates_place WHERE place_id = '".$_POST["place_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
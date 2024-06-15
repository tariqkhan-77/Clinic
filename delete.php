<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="patients_details";

// Create connection
$conn =mysqli_connect($servername,$username,$password, $db);
?>
<?php

//following query is to delete the user-data from the database.
$ids = $_GET['id'];

$deletequery = "DELETE FROM patient_details WHERE sr_no = $ids";

$query = mysqli_query($conn, $deletequery);

if($query){
	
         echo
   '<script>
   alert("Data deleted successful")
   </script>';
}else{
	
   echo
   '<script>
         alert("Data Not deleted")
   </script>';
}

header('location:welcome.php');

?>
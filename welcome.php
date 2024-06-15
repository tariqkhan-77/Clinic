<?php
//session start
session_start();
include "search.php";

//logout request

if (!isset($_SESSION['uname'])) {
      	header('location:index.php');
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="patients_details";


// Create connection
$conn =mysqli_connect($servername,$username,$password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed:  " . $conn->connect_error);
}
	echo '<script> alert("Connected."); </script>';


// Create DataBase
//	$db = "Create database patients_details";
//		if (mysqli_query($conn, $db)){
//			echo 
//   		'<script>
//         alert("Database created successfully.");
//       </script>';
//		}else{
//			echo 
//   		'Error creating database: ". mysqli_error ($conn)';
//   	}

// Create Table

//	$table = "CREATE TABLE patient_details (id int(6) unsigned auto_increment primary key, case_no varchar(255) not null, patient_name varchar(255) not null, age int(3), gender varchar(1), mobile_no int(10), problems varchar(255), prescription varchar(255), today_date varchar(10), next_visit_on varchar(10))";

	
//	if (mysqli_query($conn, $table)) {
//		echo "Table created successfully";
//	}else{
//		echo "Table not created";
//	}




	if (isset($_POST['submit'])){
    
    $case=mysqli_real_escape_string($conn, $_POST['caseno']);
    $name=mysqli_real_escape_string($conn, $_POST['name']);
    $age=mysqli_real_escape_string($conn, $_POST['age']);
    $gender=mysqli_real_escape_string($conn, $_POST['gender']);
    $mobile=mysqli_real_escape_string($conn, $_POST['mob']);
    $problems=mysqli_real_escape_string($conn, $_POST['problems']);
    $prisc=mysqli_real_escape_string($conn, $_POST['prescrip']);
    $today=mysqli_real_escape_string($conn, $_POST['tdate']);
    $nextapp=mysqli_real_escape_string($conn, $_POST['nv']);
 
 	$caseno = "SELECT * FROM patient_details WHERE case_no='$case'";
    $query = mysqli_query($conn, $caseno);
    $casecount = mysqli_num_rows($query);
    
    If($casecount>0){
echo "Case No. already exists";
}
else{
		$insertquery = "INSERT INTO `patient_details` (`case_no`, `patient_name`, `age`, `gender`, `mobile_no`, `problems`, `prescription`, `today_date`, `next_visit_on`) values ('$case', '$name', '$age', '$gender', '$mobile','$problems','$prisc','$today', '$nextapp')";

   	 $iquery = mysqli_query($conn, $insertquery);

   	if($iquery){
       echo
   		'<script>
 			alert("Patient details successfully recorded.");
		 </script>';
         
    }else{
  	   echo 
   		'<script>
         alert("Sorry! Data not recorded.");
         </script>';
   
}
     
}

}
  
?>
<?
	$date_format = 'Y-m-d';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/welcome.css">
	<script src="https://kit.fontawesome.com/8096922318.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title></title>
</head>
<body>
  <header>
	<div container-fluid>
	 <div class="heading"><h1>Welcome Dr. Khan</h1>
	 	
    </div>
	  <nav>
		<div>
			<ul>
				<li><a> 
					<!--Search Patient -->
					<div class="search-box"><i  class="fa-solid fa-magnifying-glass" id="search-icon"></i>
        				<input type="text" autocomplete="off" placeholder="Search Patient..." >
        				
        				<div class="result"></div>
    			</div>
				</a></li>

				<li><a href="#" id="add_btn"><i class="fa-solid fa-circle-plus" id="iad_btn"></i>Add New Patient</a></li>
							<!-- The Modal -->
					<div id="myModal" class="modal">

						  <!-- Modal content -->
 					
  						<div class="modal-content">
     					<!-- <span class="close">&times;</span>  -->
     					<form class="new_patient" id="myFormId" method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     						
     							<h2>Please Fill the following</h2>
     							
     							<div id="div_form"><label>Case No.</label >
     								<input type="text" name="caseno" id="case_no" placeholder="ex-A1" value="	" required>
     							</div>
     							<br>
     							<div id="div_form"><label>Patient's Name</label>
     								<input type="text" name="name" id="name" placeholder="Patient's Name" value="" required>
     							</div>
     							<br>
     							<div id="div_form"><label>Age</label >
     								<input type="number" name="age" id="age" placeholder="ex:- 10" value="" required>
     							</div>
     							<br>
     							<div id="div_form"><label>Gender</label ><br>
     								<input type="radio" name="gender" id="male" value="M" required>Male
     								<input type="radio" name="gender" id="female" value="F" required>Female
     							</div>
     							<br>
     							<div id="div_form"><label>Mobile No.</label >
     								<input type="tel" name="mob" id="mobile" pattern="[0-9]{4}-[0-9]{4}-[0-9]{2}" placeholder="1234-5678-90" required>
     							</div>
     							<br>
     							<div id="div_form"><label>Problems</label >
     								<textarea id="problems" name="problems" placeholder="Problems here..." value="">
     								</textarea>
     							</div>
     							<br>
     							<div id="div_form"><label >Prescription</label>
     								<textarea id="prescription" name="prescrip" placeholder="Prescription here..." value="">
     								</textarea>
     							</div>
     							<br>
     							<div id="div_form"><label>Today's Date</label >
     								<input type="date" name="tdate" id="datePicker" value="<?php echo date('Y-m-d'); ?>" />
     							</div>
     							<br>
     							<div id="div_form"><label >Next Visit</label>
     								<input type="date" name="nv" id="due_date"
     								value="<?php $date = new DateTime(' + 8 days ');
     									$date = $date->format("Y-m-d");
     									echo $date;
     									?> ">
     							</div>
     							<div id="sub"><button type="submit" name="submit">Add</button></div>
     							<div id="cancel"><button>Cancel</button></div>
     							<div id="cancel"><button type="reset" value="Reset" onclick="resetForm('myFormId'); return false;">Reset</button></div>


     					</form>
     				</div>
     			</div>



				
				<li><a href=""><i class="fa-solid fa-list"></i>Patient's List</a></li>
				<a id="logout_link" href="logout.php"><button type="button" id="logout" name="logout">Logout
					<i class="fa-solid fa-right-from-bracket"></i></button></a>
	    	</ul>
		</div>
	 </nav>
	 </div>
	</div>
</header>
<main>
	<div id="main">
		<table border="1">
			<thead>
				<th>Serial No.</th><th>Case No.</th><th>Name</th><th>Age</th><th>Gender</th><th>Mobile No.</th><th>Problems</th>
				<th>Prescription</th><th>Today's Date</th><th>Next Appointment</th><th colspan="2">Operations</th>
			</thead>

			<tbody>
				<?php

//query to fetch the data from the database

$sql = "SELECT * FROM patient_details";
$result = mysqli_query($conn, $sql);

 
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
  ?>  

		<tr>
			<td> <?php  echo $row ['sr_no']; ?> </td>
			<td> <?php  echo $row ['case_no']; ?> </td>
			<td> <?php  echo $row ['patient_name']; ?></td>
			<td> <?php  echo $row ['age']; ?></td>
			<td> <?php  echo $row ['gender']; ?></td>
			<td> <?php  echo $row ['mobile_no']; ?></td>
			<td> <?php  echo $row ['problems']; ?></td>
			<td> <?php  echo $row ['prescription']; ?></td>
			<td> <?php  echo $row ['today_date']; ?></td>
			<td> <?php  echo $row ['next_visit_on']; ?></td>
			<td id="operate"><a href="update.php?id=<?php  echo $row ['sr_no']; ?>"><div class="tooltip"><i class="fa-solid fa-pen-to-square" ></i><span class="tooltiptext">UPDATE</span>
			</div></a></td>
			<td id="operate"><a href="delete.php?id=<?php  echo $row ['sr_no']; ?>" onclick="document.getElementById('id').style.display='block'"><div class="tooltip"><i class="fa-solid fa-trash"></i><span class="tooltiptext">DELETE !</span>
						   </div></a></td>
			
	    

<?php
}
  
?>


	</tbody>
			</tbody>
		</table>
		
	</div>
	<br>
	
</main>
<!--  <?php
 $deletequery = "SELECT * FROM patient_details";
        $users = $conn->query($deletequery);


        while($user = $users->fetch_assoc()){


        ?>


            <tr id="<?php echo $user['id'] ?>">
               	<td><button class="btn btn-danger btn-sm remove">Delete</button></td>
            </tr>

<?php } ?>
 --> 





<script src="js/welcome.js"></script>
<script src="js/search.js"></script>
</body>
</html>


	







<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="patients_details";

// Create connection
$conn =mysqli_connect($servername,$username,$password, $db);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/8096922318.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="css/update.css">
	<title></title>
</head>
<body>

<?php
//query to update user-data through serial no.   
    
    $ids = $_GET['id'] ; 

    $showquery = "SELECT * FROM patient_details WHERE sr_no=$ids";

    $showdata = mysqli_query($conn, $showquery);

    $arraydata = mysqli_fetch_array($showdata);

if (isset($_POST['submit'])){

    $ids = $_GET['id'];

    $case=mysqli_real_escape_string($conn, $_POST['caseno']);
    $name=mysqli_real_escape_string($conn, $_POST['name']);
    $age=mysqli_real_escape_string($conn, $_POST['age']);
    $gender=mysqli_real_escape_string($conn, $_POST['gender']);
    $mobile=mysqli_real_escape_string($conn, $_POST['mob']);
    $problems=mysqli_real_escape_string($conn, $_POST['problems']);
    $prisc=mysqli_real_escape_string($conn, $_POST['prescrip']);
    $today=mysqli_real_escape_string($conn, $_POST['tdate']);
    $nextapp=mysqli_real_escape_string($conn, $_POST['nv']);
 

   $upquery = "UPDATE patient_details SET  sr_no=$ids,  patient_name='$name', age='$age', gender='$gender', mobile_no='$mobile', problems='$problems', prescription='$prisc', today_date='$today', next_visit_on='$nextapp' WHERE sr_no=$ids";



   $iquery = mysqli_query($conn, $upquery);
if($iquery){
         echo
   '<script>
      alert("Data updated successful")
    </script>';


}else{
   echo
   '<script>
         alert("Data Not updated")
    </script>';

}
header('location:welcome.php');
}

?>
               <!-- The Modal -->
               <div id="myModal" class="modal">

                    <!-- Modal content -->
               
                  <div class="modal-content">
                  <!-- <span class="close">&times;</span>  -->

                  <form class="new_patient" id="myFormId" method='POST' action="">

     						
     							<h2><u>You can UPDATE the following</u></h2>
     							
     							<div id="div_form"><label>Case No.</label >
     								<input type="text" name="caseno" id="case_no" value="<?php  echo $arraydata ['case_no']; ?>" required>
     							</div>
     							<br>
     							<div id="div_form"><label>Patient's Name</label>
     								<input type="text" name="name" id="name" value="<?php  echo $arraydata ['patient_name']; ?>" required>
     							</div>
     							<br>
     							<div id="div_form"><label>Age</label >
     								<input type="number" name="age" id="age" value="<?php  echo $arraydata ['age']; ?>" required>
     							</div>
     							<br>
                        <div id="div_form"><label>Gender</label ><br>
                           <input type="radio" name="gender" id="male" value="M" <?php if ($arraydata['gender'] == "M"){ echo "checked";}?> required>Male
                           <input type="radio" name="gender" id="female" value="F" <?php if ($arraydata['gender'] == "F"){ echo "checked";}?> required>Female
                           
                        </div>
                        <br>
     							<div id="div_form"><label>Mobile No.</label >
     								<input type="tel" name="mob" id="mobile" value="<?php  echo $arraydata ['mobile_no']; ?>"required>
     							</div>
     							<br>
     							<div id="div_form"><label>Problems</label >
     								<textarea id="problems" name="problems" placeholder="Problems here..." value="">
                              <?php  echo $arraydata ['problems']; ?>
     								</textarea>
     							</div>
     							<br>
     							<div id="div_form"><label >Prescription</label>
     								<textarea id="prescription" name="prescrip" placeholder="Prescription here..." value="">
                              <?php  echo $arraydata ['prescription']; ?>
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
     									$date = $date->format('d-m-Y');
     									echo $date;
     									?> ">
     							</div>
     							<div id="sub"><button type="submit" name="submit">Update</button></div>
     							

     					</form>
     				</div>
     			</div>
</body>
</html>
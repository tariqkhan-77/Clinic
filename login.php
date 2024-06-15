<?php

// Session Start
  session_start();

if(isset($_POST['uname']) && !isset($_SESSION['uname'])){
  // Uname and Password
  $uname= ['ubaid' => '647799'];

  // Check and Verify
  if(isset($uname[$_POST['uname']])){
    if($uname[$_POST['uname']] == $_POST['pwd']){
      $_SESSION['uname'] = $_POST['uname'];
    }
    echo'<script>
              alert("Incorrect Username or Password");
         </script>';

  }

  //failed login flag
  if(!isset($_SESSION['uname'])) {$failed = true;}
}
  

  // redirect to welcome page

  if(isset($_SESSION['uname'])){
    header('location:welcome.php');
    exit();
  }

?>
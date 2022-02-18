<?php
   $conn = mysqli_connect('localhost', 'maskoul', 'test123', 'employees_db');

   // check connection
 if(!$conn){
      echo 'Connection error: ' . mysqli_connect_error(); 
  }
?>
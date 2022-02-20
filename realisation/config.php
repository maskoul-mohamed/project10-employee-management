<?php
    $connect = mysqli_connect("localhost", "maskoul", "test123", "employees_db");

    if(!$connect){
        echo "Connect error: " . mysqli_connect_error();
    }

    //column names id 	employee_id 	first_name 	last_name 	birth_date 	salary 	fonction 	photo
?>
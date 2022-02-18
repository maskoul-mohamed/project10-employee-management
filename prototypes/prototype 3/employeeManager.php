<?php

    class EmployeeManager {

        public function getAllEmployees($conn){
            $sqlGetData = 'SELECT id, first_name, last_name, age, gender FROM employees';
            $result = mysqli_query($conn ,$sqlGetData);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }
    }
?>
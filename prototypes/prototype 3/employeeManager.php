<?php

    class EmployeeManager {

        public function getAllEmployees($conn){
            $sqlGetData = 'SELECT id, first_name, last_name, age, gender FROM employees';
            $result = mysqli_query($conn ,$sqlGetData);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }


        public function insertEmployee($conn, $employee){
            $firstName = $employee->getFirstName();
            $lastName = $employee->getLastName();
            $age = $employee->getAge();
            $gender = $employee->getGender();

                 // sql insert query
        $sqlInsertQuery = "INSERT INTO employees(first_name, last_name, age, gender) 
                            VALUES('$firstName', 
                                    '$lastName',
                                    '$age', 
                                    '$gender')";

        mysqli_query($conn, $sqlInsertQuery);
        }


        public function deleteEmployee($conn, $id){
            $sqlDeleteQuery = "DELETE FROM employees WHERE id= '$id'";

            mysqli_query($conn, $sqlDeleteQuery);
        }


        public function editEmployee($conn, $employee, $id){
            $first_name = $employee->getFirstName();
            $last_name = $employee->getLastName();
            $gender = $employee->getGender();
            $age = $employee->getAge();
     
            // Update query
            $sqlUpdateQuery = "UPDATE employees SET 
                         first_name='$first_name', last_name='$last_name', age='$age', gender='$gender'
                         WHERE id=$id";
     
             // Make query 
             mysqli_query($conn, $sqlUpdateQuery);
       
        }
    }


    
?>
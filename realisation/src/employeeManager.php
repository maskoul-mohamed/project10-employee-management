<?php

    class EmployeeManager {

        public function getAllEmployees($conn){
            $sqlGetData = 'SELECT * FROM employees';
            $result = mysqli_query($conn ,$sqlGetData);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }


        public function insertEmployee($conn, $employee ){
            $employeeId = $employee->getEmployeeId();
            $firstName = $employee->getFirstName();
            $lastName = $employee->getLastName();
            $salary = $employee->getSalary();
            $birthDate = $employee->getBirthDate();
            $function = $employee->getFunction();
            $photo = $employee->getPhoto();

                 // sql insert query
            $sqlInsertQuery = "INSERT INTO employees
                                (employee_id, first_name, last_name, birth_date, salary, fonction, photo) 
                                VALUES('$employeeId', 
                                        '$firstName',
                                        '$lastName', 
                                        '$salary', 
                                        '$birthDate', 
                                        '$function', 
                                        '$photo')";

        mysqli_query($conn, $sqlInsertQuery);
        }


        public function upload_photo($fileName, $tempname){

            $folder = '../images/'.$fileName;
            // Now let's move the uploaded image into the folder: image
            move_uploaded_file($tempname, $folder);
        }
            

        public function deleteEmployee($conn, $id){
            $sqlDeleteQuery = "DELETE FROM employees_test WHERE id= '$id'";

            mysqli_query($conn, $sqlDeleteQuery);
        }


        public function editEmployee($conn, $employee, $id){
            $first_name = $employee->getFirstName();
            $last_name = $employee->getLastName();
            $gender = $employee->getGender();
            $age = $employee->getAge();
     
            // Update query
            $sqlUpdateQuery = "UPDATE employees_test SET 
                         first_name='$first_name', last_name='$last_name', age='$age', gender='$gender'
                         WHERE id=$id";
     
             // Make query 
             mysqli_query($conn, $sqlUpdateQuery);
       
        }

        public function getEmployee($conn, $id){
            $sqlGetQuery = "SELECT * FROM employees_test WHERE id= $id";
    
        // get result
        $result = mysqli_query($conn, $sqlGetQuery);
    
        // fetch to array
        $employee = mysqli_fetch_assoc($result);
        return $employee;
        }
    }


    
?>
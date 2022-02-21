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
            $departement = $employee->getDepartement();
            $photo = $employee->getPhoto();

                 // sql insert query
            $sqlInsertQuery = "INSERT INTO employees
                                (employee_id, first_name, last_name, birth_date, salary, departement, photo) 
                                VALUES('$employeeId', 
                                        '$firstName',
                                        '$lastName',
                                        '$birthDate',  
                                        '$salary', 
                                        '$departement', 
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
            $employeeId = $employee->getEmployeeId();
            $firstName = $employee->getFirstName();
            $lastName = $employee->getLastName();
            $salary = $employee->getSalary();
            $birthDate = $employee->getBirthDate();
            $departement = $employee->getDepartement();
            $photo = $employee->getPhoto();
     
            // Update query
            $sqlUpdateQuery = "UPDATE employees SET 
                                employee_id='$employeeId',
                                first_name='$firstName', 
                                last_name='$lastName', 
                                salary='$salary', 
                                birth_date='$birthDate',
                                departement='$departement',
                                photo='$photo' 
                                WHERE id=$id";
     
             // Make query 
             mysqli_query($conn, $sqlUpdateQuery);
       
        }

        public function getEmployee($conn, $id){
        $sqlGetQuery = "SELECT * FROM employees WHERE id= $id";
    
        // get result
        $result = mysqli_query($conn, $sqlGetQuery);
    
        // fetch to array
        $employee = mysqli_fetch_assoc($result);
        return $employee;
        }



        
    }


    
?>
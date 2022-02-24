<?php
    include 'employee.php';

    class EmployeeManager {
        private $Connection = null;

        private function getConnection(){
            if(is_null($this->Connection)){
                $this->Connection = mysqli_connect('localhost', 'maskoul', 'test123', 'employees_db');

                if(!$this->Connection){
                    $message = 'Connection Error: ' .mysqli_connect_error();
                    throw new Exception($message);
                }
            }
            return $this->Connection;
        }

        public function getAllEmployees(){
            $sqlGetData = 'SELECT * FROM employees';
            $result = mysqli_query($this->getConnection() ,$sqlGetData);
            $employeesList = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $employees = array();
            foreach($employeesList as $employee_list){
                $employee = new Employee();
                $employee->setId($employee_list['id']);
                $employee->setEmployeeId($employee_list['employee_id']);
                $employee->setFirstName($employee_list['first_name']);
                $employee->setLastName($employee_list['last_name']);
                $employee->setBirthDate($employee_list['birth_date']);
                $employee->setSalary($employee_list['salary']);
                $employee->setDepartement($employee_list['departement']);
                $employee->setFunction($employee_list['function']);
                $employee->setPhoto($employee_list['photo']);
                array_push($employees, $employee);
            }

            return $employees;
        }



        public function insertEmployee($employee){
            $employeeId = $employee->getEmployeeId();
            $firstName = $employee->getFirstName();
            $lastName = $employee->getLastName();
            $salary = $employee->getSalary();
            $birthDate = $employee->getBirthDate();
            $departement = $employee->getDepartement();
            $function = $employee->getFunction();
            $photo = $employee->getPhoto();

                 // sql insert query
            $sqlInsertQuery = "INSERT INTO employees
                                (employee_id, 
                                first_name, 
                                last_name, 
                                birth_date,
                                departement,
                                salary, 
                                function, 
                                photo) 
                                VALUES('$employeeId', 
                                        '$firstName',
                                        '$lastName',
                                        '$birthDate', 
                                        '$departement', 
                                        '$salary', 
                                        '$function', 
                                        '$photo')";

        mysqli_query($this->getConnection(), $sqlInsertQuery);
        }


        public function upload_photo($fileName, $tempname){

            $folder = '../images/'.$fileName;
            // Now let's move the uploaded image into the folder: image
            move_uploaded_file($tempname, $folder);
        }
            

        public function deleteEmployee($id){
            $sqlDeleteQuery = "DELETE FROM employees WHERE id= '$id'";

            mysqli_query($this->getConnection(), $sqlDeleteQuery);
        }


        public function editEmployee($employee, $id){
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
             mysqli_query($this->getConnection(), $sqlUpdateQuery);
       
        }

        public function getEmployee($id){
        $sqlGetQuery = "SELECT * FROM employees WHERE id= $id";
    
        // get result
        $result = mysqli_query($this->getConnection(), $sqlGetQuery);
    
        // fetch to array
        $employee = mysqli_fetch_assoc($result);
        return $employee;
        }        
    }


    
?>
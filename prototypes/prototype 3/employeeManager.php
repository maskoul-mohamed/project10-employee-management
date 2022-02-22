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
            $sqlGetData = 'SELECT id, first_name, last_name, age, gender FROM employees_test';
            $result = mysqli_query($this->getConnection() ,$sqlGetData);
            $employeesList = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $employees = array();
            foreach($employeesList as $employee_list){
                $employee = new Employee();
                $employee->setId($employee_list['id']);
                $employee->setFirstName($employee_list['first_name']);
                $employee->setLastName($employee_list['last_name']);
                $employee->setGender($employee_list['gender']);
                $employee->setAge($employee_list['age']);
                array_push($employees, $employee);
            }

            return $employees;
        }


        public function insertEmployee($employee){
            $firstName = $employee->getFirstName();
            $lastName = $employee->getLastName();
            $age = $employee->getAge();
            $gender = $employee->getGender();

                 // sql insert query
        $sqlInsertQuery = "INSERT INTO employees_test(first_name, last_name, age, gender) 
                            VALUES('$firstName', 
                                    '$lastName',
                                    '$age', 
                                    '$gender')";

        mysqli_query($this->getConnection(), $sqlInsertQuery);
        }


        public function deleteEmployee($id){
            $sqlDeleteQuery = "DELETE FROM employees_test WHERE id= '$id'";

            mysqli_query($this->getConnection(), $sqlDeleteQuery);
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
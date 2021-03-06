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


        private function filterUserInput($employee){
            
            $employeeFiltered = new Employee();

            $employeeId = mysqli_escape_string($this->getConnection(),$employee->getEmployeeId());
            $firstName = mysqli_escape_string($this->getConnection(),$employee->getFirstName());
            $lastName = mysqli_escape_string($this->getConnection(),$employee->getLastName());
            $salary = mysqli_escape_string($this->getConnection(),$employee->getSalary());
            $birthDate = mysqli_escape_string($this->getConnection(),$employee->getBirthDate());
            $departement = mysqli_escape_string($this->getConnection(),$employee->getDepartement());
            $function = mysqli_escape_string($this->getConnection(),$employee->getFunction());
            $photo = mysqli_escape_string($this->getConnection(),$employee->getPhoto());

            $employeeFiltered->setEmployeeId($employeeId);
            $employeeFiltered->setFirstName($firstName);
            $employeeFiltered->setLastName($lastName);
            $employeeFiltered->setSalary($salary);
            $employeeFiltered->setBirthDate($birthDate);
            $employeeFiltered->setDepartement($departement);
            $employeeFiltered->setFunction($function);
            $employeeFiltered->setPhoto($photo);

            return $employeeFiltered;
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



        public function insertEmployee($employeeInput){

            $employee = $this->filterUserInput($employeeInput);

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


        public function editEmployee($employeeInput, $id){
            $employee = $this->filterUserInput($employeeInput);

            $employeeId = $employee->getEmployeeId();
            $firstName = $employee->getFirstName();
            $lastName = $employee->getLastName();
            $salary = $employee->getSalary();
            $birthDate = $employee->getBirthDate();
            $departement = $employee->getDepartement();
            $function = $employee->getFunction();
            $photo = $employee->getPhoto();
     
            // Update query
            $sqlUpdateQuery = "UPDATE employees SET 
                                employee_id='$employeeId',
                                first_name='$firstName', 
                                last_name='$lastName', 
                                salary='$salary', 
                                birth_date='$birthDate',
                                departement='$departement',
                                function='$function',
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
            $employee_data = mysqli_fetch_assoc($result);

            $employee = new Employee();

            $employee->setId($employee_data['id']);
            $employee->setEmployeeId($employee_data['employee_id']);
            $employee->setFirstName($employee_data['first_name']);
            $employee->setLastName($employee_data['last_name']);
            $employee->setBirthDate($employee_data['birth_date']);
            $employee->setSalary($employee_data['salary']);
            $employee->setDepartement($employee_data['departement']);
            $employee->setFunction($employee_data['function']);
            $employee->setPhoto($employee_data['photo']);
            return $employee;
        }  
        
        
        function searchBy($keywords, $search){
            $keyword = mysqli_real_escape_string($this->getConnection(), $keywords);
            $searchWord = mysqli_real_escape_string($this->getConnection(), $search);
            $searchQuery = "SELECT * FROM employees WHERE " . $keyword ."= '$searchWord'";

            $result = mysqli_query($this->getConnection() ,$searchQuery);
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

   
    }


    
?>
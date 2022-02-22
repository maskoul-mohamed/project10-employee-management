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
       
            $file = file_get_contents('employees.json');
            $employeesList = json_decode($file);
            $employees = array();
            foreach($employeesList as $employee_list){
                $employee = new Employee();
                $employee->setId($employee_list->id);
                $employee->setFirstName($employee_list->first_name);
                $employee->setLastName($employee_list->last_name);
                $employee->setGender($employee_list->gender);
                $employee->setAge($employee_list->age);
                array_push($employees, $employee);
            }

            return $employees;
        }


        public function insertEmployee($employee){

            $employee->setId(uniqid(false));


            $file = file_get_contents('employees.json');
            $data = json_decode($file);
            $employeeToList = array(
                                    'id'=> $employee->getId(),
                                    'first_name' => $employee->getFirstName(),
                                    'last_name' => $employee->getLastName(),
                                    'gender' => $employee->getGender(),
                                    'age' => $employee->getAge()
                                    );
            

            array_push($data, $employeeToList);
            file_put_contents('employees.json', json_encode($data));
        }


        public function deleteEmployee($id){
            $data = json_decode(file_get_contents('employees.json'));
            for($i = 0; $i < count($data); ++$i){
                if($data[$i]->id== $id){
                    unset($data[$i]);
                    // Remove the keys from data array after remove the item
                    $data = array_values($data);
                    file_put_contents("employees.json",json_encode($data));
                    break;
                }
            }
        }


        public function editEmployee($id, $first_name, $last_name, $gender, $age){
            $file = file_get_contents('employees.json');
            $data = json_decode($file);
            $employeeToList = array(
                                    'id'=> $id,
                                    'first_name' => $first_name,
                                    'last_name' => $last_name,
                                    'gender' => $gender,
                                    'age' => $age
                                    );

    
           for($i = 0; $i < count($data); $i++){
            if($data[$i]->id== $id){
                $data[$i] = $employeeToList;
                break;
            }
           }
            file_put_contents('employees.json', json_encode($data));
       
        }

        public function getEmployee($id){
            $file = file_get_contents("employees.json");
            $data = json_decode($file);
            $employee = new Employee();

            foreach($data as $employee_data){
                if($employee_data->id== $id){
                    $employee->setId($employee_data->id);
                    $employee->setFirstName($employee_data->first_name);
                    $employee->setLastName($employee_data->last_name);
                    $employee->setGender($employee_data->gender);
                    $employee->setAge($employee_data->age);
                    break;
                }
            }
            return $employee;
        }
    }


    
?>
<?php
    include '../employeeManager.php';

    $employeeManager = new EmployeeManager();
    $employee_data = $employeeManager->getAllEmployees();

    foreach($employee_data as $employee){
        echo $employee->getId();
        echo $employee->getFirstName();
        echo $employee->getLastName();
        echo $employee->getGender();
        echo $employee->getAge();
    }
?>
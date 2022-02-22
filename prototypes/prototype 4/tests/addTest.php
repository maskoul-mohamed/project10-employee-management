<?php
    include "../employeeManager.php";

    $employee = new Employee;
    $employee->setFirstName('John');
    $employee->setLastName('Doe');
    $employee->setGender('male');
    $employee->setAge('45');

    $employeeManager = new EmployeeManager();
    $employeeManager->insertEmployee($employee);
?>
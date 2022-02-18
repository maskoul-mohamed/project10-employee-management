<?php
    include "config.php";
    include "employeeManager.php";
    
        if(isset($_GET['id'])){
            $id = $_GET['id'];
           
            $employeeManager = new EmployeeManager();
            $employeeManager->deleteEmployee($conn, $id);
            header('Location: index.php');   
    }
?>
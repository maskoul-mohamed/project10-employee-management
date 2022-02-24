<?php
    include "employeeManager.php";
    
        if(isset($_GET['id'])){
            $id = $_GET['id'];
           
            $employeeManager = new EmployeeManager();
            $employeeManager->deleteEmployee($id);
            header('Location: index.php');   
    }
?>
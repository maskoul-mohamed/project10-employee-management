<?php
    include "employeeManager.php";
    session_start();
	if(isset($_SESSION["username"])){
    
        if(isset($_GET['id'])){
            $id = $_GET['id'];
           
            $employeeManager = new EmployeeManager();
            $employeeManager->deleteEmployee($id);
            header('Location: index.php');   
        }
    } else {
        header("Location: signin.php");
    }
?>
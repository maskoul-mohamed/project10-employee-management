<?php

	include 'employeeManager.php';

    if(!empty($_POST)){
		$employeeManager = new EmployeeManager();
		$filename = $_FILES["uploadfile"]["name"];
		$employee = new Employee();
		$employee->setEmployeeId($_POST['employeeId']);
		$employee->setFirstName($_POST['firstName']);
		$employee->setLastName($_POST['lastName']);
		$employee->setFunction($_POST['function']);
		$employee->setSalary($_POST['salary']);
		$employee->setBirthDate($_POST['birthDate']);
		$employee->setDepartement($_POST['departement']);
		$employee->setPhoto($filename);


	    $tempname = $_FILES["uploadfile"]["tmp_name"];    

		$employeeManager->insertEmployee($employee);
		$employeeManager->upload_photo($filename, $tempname);
        header("Location: index.php");

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
        <div>
		<div><h3>Create a User</h3>
        <form method="POST" action="" enctype='multipart/form-data'>
        <div>
				<label for="inputEmployeeId">Employee Id</label>
				<input type="text" required="required" id="employeeId" name="employeeId" placeholder="Employee Id">
				<span></span>
			</div>
			<div>
				<label for="inputFName">First Name</label>
				<input type="text" required="required" id="inputFirstName" name="firstName" placeholder="First Name">
				<span></span>
			</div>
			
			<div>
				<label for="inputLName">Last Name</label>
				<input type="text" required="required" id="inputLastName" name="lastName" placeholder="Last Name">
        		<span></span>
			</div>
			
			<div>
				<label for="inputBirthDate">Birth Date</label>
				<input type="date" required="required" class="form-control" id="inputBirthDate" name="birthDate" placeholder="Birth Date">
				<span></span>
			</div>
				
            <div>
				<label for="inputSalary">Salary</label>
				<input type="number" step="0.01" required="required" id="inputSalary" name="salary" placeholder="0.00">
        		<span></span>
			</div>

            <div>
				<label for="inputDepartement">Departement</label>
				<input type="text" required="required" id="inputDepartement" name="departement" placeholder="Departement">
        		<span></span>
			</div>
			<div>

				<label for="inputFunction">Function</label>
				<input type="text" required="required" id="inputFunction" name="function" placeholder="Function">
        		<span></span>
			</div>
            <div>
				<label for="inputPhoto">Photo</label>
				<input require type="file" name="uploadfile" value="">
        		<span></span>
			</div>

           
			<div class="form-actions">
					<button type="submit">Create</button>
					<a href="index.php">Back</a>
			</div>
		</form>
        </div></div>        
</div>
</body>
</html>
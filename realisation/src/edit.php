<?php
    include '../config.php';
    include 'employee.php';
    include 'employeeManager.php';

    $employeeManager = new EmployeeManager();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $employee = $employeeManager->getEmployee($connect, $id);
    }
    if(isset($_POST['update'])){
        $filename = $_FILES["uploadfile"]["name"];
		$employee = new Employee();

		$employee->setEmployeeId($_POST['employeeId']);
		$employee->setFirstName($_POST['firstName']);
		$employee->setLastName($_POST['lastName']);
		$employee->setSalary($_POST['salary']);
		$employee->setBirthDate($_POST['birthDate']);
		$employee->setDepartement($_POST['departement']);
		$employee->setPhoto($filename);


	    $tempname = $_FILES["uploadfile"]["tmp_name"];    

        $employeeManager->editEmployee($connect, $employee, $id);
		$employeeManager->upload_photo($filename, $tempname);
        
        header('Location: index.php');
        
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
		<div><h3>Edit a User</h3>
               <form method="POST" action="" enctype='multipart/form-data'>
        <div>
				<label for="inputEmployeeId">Employee Id</label>
				<input type="text" 
                        required="required" 
                        id="employeeId"
                        name="employeeId" 
                        placeholder="Employee Id"
                        value=<?php echo $employee["employee_id"] ?>
                >
				<span></span>
			</div>
			<div>
				<label for="inputFName">First Name</label>
				<input type="text" 
                        required="required" 
                        id="inputFirstName" 
                        name="firstName" 
                        placeholder="First Name"
                        value=<?php echo $employee["first_name"] ?>
                >
				<span></span>
			</div>
			
			<div>
				<label for="inputLName">Last Name</label>
				<input type="text" 
                        required="required" 
                        id="inputLastName" 
                        name="lastName" 
                        placeholder="Last Name"
                        value=<?php echo $employee["last_name"] ?>
                >
        		<span></span>
			</div>
			
			<div>
				<label for="inputBirthDate">Birth Date</label>
				<input  type="date" 
                        required="required" 
                        class="form-control" 
                        id="inputBirthDate" 
                        name="birthDate" 
                        placeholder="Birth Date"
                        value=<?php echo $employee['birth_date']?>
                >
				<span></span>
			</div>
				
            <div>
				<label for="inputSalary">Salary</label>
				<input  type="number" 
                        step="0.01" 
                        required="required" 
                        id="inputSalary" 
                        name="salary" 
                        placeholder="0.00"
                        value =<?php echo $employee['salary']?>
                >
        		<span></span>
			</div>

            <div>
				<label for="inputDepartement">Departement</label>
				<input  type="text" 
                        required="required" 
                        id="inputDepartement" 
                        name="departement" 
                        placeholder="departement"
                        value = <?php echo $employee['departement']?>
                >
        		<span></span>
			</div>

            <div>
            <td><img src="<?php echo '../images/'.$employee['photo']; ?>"></td>
				<label for="inputPhoto">Photo</label>
				<input require type="file" name="uploadfile" value="">
        		<span></span>
			</div>

           
			<div class="form-actions">
					<button name="update" type="submit">Update</button>
					<a href="index.php">Back</a>
			</div>
		</form>
        </div></div>        
</div>
</body>
</html>
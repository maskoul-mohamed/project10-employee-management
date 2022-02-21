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
		$employeeToEdit = new Employee();

		$employeeToEdit->setEmployeeId($_POST['employeeId']);
		$employeeToEdit->setFirstName($_POST['firstName']);
		$employeeToEdit->setLastName($_POST['lastName']);
		$employeeToEdit->setSalary($_POST['salary']);
		$employeeToEdit->setBirthDate($_POST['birthDate']);
		$employeeToEdit->setDepartement($_POST['departement']);


	    $tempname = $_FILES["uploadfile"]["tmp_name"];    

        if(!empty($filename)){
            $employeeToEdit->setPhoto($filename);
            $employeeManager->upload_photo($filename, $tempname);
        } else {
            $employeeToEdit->setPhoto($employee['photo']);
        }

        $employeeManager->editEmployee($connect, $employeeToEdit, $id);
        
        
        
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
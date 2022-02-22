<?php
    include 'employeeManager.php';

    $employeeManager = new EmployeeManager();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $employee = $employeeManager->getEmployee($id);

    }

    if(isset($_POST['update'])){
		$id = $_POST['id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
  

        $employeeManager->editEmployee($id, $first_name, $last_name, $gender, $age);

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
		<div><h3>Create a User</h3>
        <form method="POST" action="">
			<input type="hidden" id='id' name='id' value=<?php echo $employee->getId() ?>>
			<div>
				<label for="inputFName">First Name</label>
				<input	type="text" 
						required="required" 
						id="inputFName" 
						value=<?php echo $employee->getFirstName()?> 
						name="first_name" 
						placeholder="First Name"
					>
				<span></span>
			</div>
			
			<div>
				<label for="inputLName">Last Name</label>
				<input	type="text" 
						required="required" 
						id="inputLName" 
						value=<?php echo $employee->getLastName()?> 
						name="last_name" 
						placeholder="Last Name"
					>
        		<span></span>
			</div>
			
			<div>
				<label for="inputAge">Age</label>
				<input	type="number" 
						required="required" 
						class="form-control" 
						id="inputAge" 
						value=<?php echo $employee->getAge()?> 
						name="age" 
						placeholder="Age"
					>
				<span></span>
			</div>
				<div class="form-group">
					<label for="inputGender">Gender</label>
					<select class="form-control" required="required" id="inputGender" name="gender" >
						<option>Please Select</option>
                        <option value="Male" <?= $employee->getGender()== 'Male' ? 'selected' : '' ?>>Male</option>
						<option value="Female" <?= $employee->getGender()== 'Female' ? 'selected' : '' ?>>Female</option>
					</select>
					<span></span>
        		</div>
    
			<div class="form-actions">
					<input name="update" type="submit" value="Update">
					<a href="index.php">Back</a>
			</div>
		</form>
        </div></div>        
</div>
</body>
</html>
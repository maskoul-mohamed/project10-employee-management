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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Employees Manager</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success text-white" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li>
                            <a href="index.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Employees</span> </a>
                        </li>
                        <li>
                            <a href="insert.php" class="nav-link px-0 align-middle">
                                <i class="bi bi-plus-square"></i> <span class="ms-1 d-none d-sm-inline">Add New</span> </a>
                        </li>
                    </ul>
                    <hr>
                </div>
        </div>
        <div class="col py-3 container-fluid">
	<div class="py-3">
			<div class="card mb-4">
				<div class="card-header"><h3 class="my-5">Add an Employee</h3>
				<form method="POST" action="" enctype='multipart/form-data'>
					<div class="d-flex my-1">
						<div class="col-6 mx-1">
							<label class="form-label" for="inputPhoto">Photo</label>
							<input class="form-control" require type="file" name="uploadfile" value="">
						</div>
						<div class="col-6 mx-1">
							<label class="form-label" for="inputEmployeeId">Employee Id</label>
							<input class="form-control" type="text" required="required" id="employeeId" name="employeeId" placeholder="Employee Id">
						</div>
					</div>

					<div class="d-flex my-1">
						<div class="col-6 mx-1">
							<label class="form-label" for="inputFName">First Name</label>
							<input class="form-control" type="text" required="required" id="inputFirstName" name="firstName" placeholder="First Name">
						</div>
						
						<div class="col-6 mx-1">
							<label class="form-label" for="inputLName">Last Name</label>
							<input class="form-control" type="text" required="required" id="inputLastName" name="lastName" placeholder="Last Name">
						</div>
					</div>
				
				
					<div class="d-flex my-1">
						<div class="col-6 mx-1">
							<label class="form-label" for="inputBirthDate">Birth Date</label>
							<input class="form-control" type="date" required="required" class="form-control" id="inputBirthDate" name="birthDate" placeholder="Birth Date">
							<span></span>
						</div>
							
						<div class="col-6 mx-1">
							<label class="form-label" for="inputSalary">Salary</label>
							<input class="form-control" type="number" step="0.01" required="required" id="inputSalary" name="salary" placeholder="0.00">
							<span></span>
						</div>
					</div>
				
					<div class="d-flex my-1">
						<div class="col-6 mx-1">
							<label class="form-label" for="inputDepartement">Departement</label>
							<input class="form-control" type="text" required="required" id="inputDepartement" name="departement" placeholder="Departement">
							<span></span>
						</div>
						<div class="col-6 mx-1">

							<label class="form-label" for="inputFunction">Function</label>
							<input class="form-control" type="text" required="required" id="inputFunction" name="function" placeholder="Function">
							<span></span>
						</div>
					</div>
				
				
					<div class="my-4">
							<button class="btn btn-success" type="submit">Create</button>
							<a class="btn btn-outline-secondary" href="index.php">Back</a>
					</div>
			</form>
        </div>
	</div>        
</div>
</body>
</html>
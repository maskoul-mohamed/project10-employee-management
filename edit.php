<?php

    include 'employeeManager.php';

    $employeeManager = new EmployeeManager();
	session_start();
	if(isset($_SESSION["username"])){

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $employee = $employeeManager->getEmployee($id);
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
            $employeeToEdit->setFunction($_POST['function']);


            $tempname = $_FILES["uploadfile"]["tmp_name"];    

            if(!empty($filename)){
                $employeeToEdit->setPhoto($filename);
                $employeeManager->upload_photo($filename, $tempname);
            } else {
                $employeeToEdit->setPhoto($employee->getPhoto());
            }

            $employeeManager->editEmployee($employeeToEdit, $id);
    
            header('Location: index.php');
            
        }
    }else {
        header("Location: signin.php");
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
    <link rel="stylesheet" href="styles/styles.css">  
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand btn">Employees Manager</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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
                        <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-none d-sm-inline mx-1">Admin</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a href="signout.php" class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </div>
                </div>
        </div>
    <div class="col py-3 container-fluid">
        <div class="py-3">
            <div class="card mb-4" >
                <div class="card-header">                        
                    <h3 class="my-5">Edit a User</h3>
                </div>
                    <form method="POST" action="" enctype='multipart/form-data'>
                    <img class="rounded-circle lg-img mt-3 px-2" src="<?php echo '../images/'.$employee->getPhoto(); ?>">
                        <div class="d-flex my-2">
                            <div class="col-6 px-2 ">
                                <label class="form-label" for="inputPhoto">Photo</label>
                                <input class="form-control"
                                    require type="file" 
                                    name="uploadfile" 
                                    value="">
                            </div>
                            <div class="col-6 px-2">
                                <label class="form-label" for="inputEmployeeId">Employee Id</label>
                                <input  class="form-control"
                                        type="text" 
                                        required="required" 
                                        id="employeeId"
                                        name="employeeId" 
                                        placeholder="Employee Id"
                                        value=<?php echo $employee->getEmployeeId() ?>
                                >
                            </div>
                        </div>
                     
                        <div class="d-flex my-2">
                                <div class="col-6 px-2">                 
                                    <label class="form-label"  for="inputFName">First Name</label>
                                    <input  type="text" 
                                            class="form-control"
                                            required="required" 
                                            id="inputFirstName" 
                                            name="firstName" 
                                            placeholder="First Name"
                                            value=<?php echo $employee->getFirstName() ?>
                                    >
                            </div>
                            <div class="col-6 px-2">
                                    <label class="form-label" for="inputLName">Last Name</label>
                                    <input type="text" 
                                            class="form-control"
                                            required="required" 
                                            id="inputLastName" 
                                            name="lastName" 
                                            placeholder="Last Name"
                                            value=<?php echo $employee->getLastName() ?>
                                    >
                                </div>
                        </div>
                        <div class="d-flex my-2">
                            <div class="col-6 px-2">
                                <label class="form-label" for="inputBirthDate">Birth Date</label>
                                <input  type="date" 
                                        required="required" 
                                        class="form-control" 
                                        id="inputBirthDate" 
                                        name="birthDate" 
                                        placeholder="Birth Date"
                                        value=<?php echo $employee->getBirthDate()?>
                                >
                            </div>
                                
                            <div class="col-6 px-2">
                                <label class="form-label" for="inputSalary">Salary</label>
                                <input  type="number" 
                                        class="form-control"
                                        step="0.01" 
                                        required="required" 
                                        id="inputSalary" 
                                        name="salary" 
                                        placeholder="0.00"
                                        value =<?php echo $employee->getSalary()?>
                                >
                            </div>
                        </div>
     
                        <div class="d-flex my-2">
                            <div class="col-6 px-2">
                                <label class="form-label" for="inputDepartement">Departement</label>
                                <select class="form-select "required="required" id="inputDepartement" name="departement"  aria-label="Default select example">
										<option selected>Chose...</option>
										<option value="Accounting" <?= $employee->getDepartement()== 'Accounting' ? 'selected' : '' ?>>Accounting</option>
										<option value="Marketing" <?= $employee->getDepartement()== 'Marketing' ? 'selected' : '' ?>>Marketing</option>
										<option value="Production" <?= $employee->getDepartement()== 'Production' ? 'selected' : '' ?>>Production</option>
										<option value="I.T" <?= $employee->getDepartement()== 'I.T' ? 'selected' : '' ?>>I.T</option>
										<option value="Works" <?= $employee->getDepartement()== 'Works' ? 'selected' : '' ?>>Works</option>
										<option value="Sales" <?= $employee->getDepartement()== 'Sales' ? 'selected' : '' ?>>Sales</option>
										<option value="Logistics" <?= $employee->getDepartement()== 'Logistics' ? 'selected' : '' ?>>Logistics</option>
									</select>
                            </div>
                            <div class="col-6 px-2">
                                <label class="form-label" for="inputFunction">Function</label>
                                <select class="form-select" required="required" id="inputFunction" name="function" placeholder="Function"  	aria-label="Default select example">
										<option selected>Chose...</option>
										<option value="auditor" <?= $employee->getFunction()== 'auditor' ? 'selected' : '' ?>>auditor</option>
										<option value="CFO" <?= $employee->getFunction()== 'CFO' ? 'selected' : '' ?>>CFO</option>
										<option value="payroll specialist" <?= $employee->getFunction()== 'payroll specialist' ? 'selected' : '' ?>>payroll specialist</option>
										<option value="tax specialist" <?= $employee->getFunction()== 'tax specialist' ? 'selected' : '' ?>>tax specialist</option>
										<option value="advertising manager" <?= $employee->getFunction()== 'advertising manager' ? 'selected' : '' ?>>advertising manager</option>
										<option value="brand manager" <?= $employee->getFunction()== 'brand manager' ? 'selected' : '' ?>>brand manager</option>
										<option value="public relations officer" <?= $employee->getFunction()== 'public relations officer' ? 'selected' : '' ?>>public relations officer</option>
										<option value="compensation specialist" <?= $employee->getFunction()== 'compensation specialist' ? 'selected' : '' ?>>compensation specialist</option>
										<option value="recruiter" <?= $employee->getFunction()== 'recruiter' ? 'selected' : '' ?>>personnel manager</option>
										<option value="public relations officer" <?= $employee->getFunction()== 'public relations officer' ? 'selected' : '' ?>>recruiter</option>
										<option value="training manager" <?= $employee->getFunction()== 'training manager' ? 'selected' : '' ?>>training manager </option>
										<option value="chief inspector" <?= $employee->getFunction()== 'chief inspector' ? 'selected' : '' ?>>chief inspector</option>
										<option value="machinist" <?= $employee->getFunction()== 'machinist' ? 'selected' : '' ?>>machinist</option>
										<option value="quality control manager" <?= $employee->getFunction()== 'quality control manager' ? 'selected' : '' ?>>quality control manager</option>
										<option value="plant manager" <?= $employee->getFunction()== 'plant manager' ? 'selected' : '' ?>>plant manager</option>
										<option value="communications analyst" <?= $employee->getFunction()== 'communications analyst' ? 'selected' : '' ?>>communications analyst</option>
										<option value="database administrator" <?= $employee->getFunction()== 'database administrator' ? 'selected' : '' ?>>database administrator</option>
										<option value="e­business specialist" <?= $employee->getFunction()== 'e­business specialist' ? 'selected' : '' ?>>e­business specialist</option>
										<option value="pc support specialist" <?= $employee->getFunction()== 'pc support specialist' ? 'selected' : '' ?>>pc support specialist</option>
										<option value="branch manager" <?= $employee->getFunction()== 'branch manager' ? 'selected' : '' ?>>branch manager</option>
										<option value="rep" <?= $employee->getFunction()== 'rep' ? 'selected' : '' ?>>rep</option>
										<option value="retail manager" <?= $employee->getFunction()== 'retail manager' ? 'selected' : '' ?>>retail manager</option>
										<option value="telemarketer" <?= $employee->getFunction()== 'telemarketer' ? 'selected' : '' ?>>telemarketer</option>
										<option value="depot manager" <?= $employee->getFunction()== 'depot manager' ? 'selected' : '' ?>>depot manager</option>
										<option value="forklift driver" <?= $employee->getFunction()== 'forklift driver' ? 'selected' : '' ?>>forklift driver</option>
										<option value="transport manager" <?= $employee->getFunction()== 'transport manager' ? 'selected' : '' ?>>transport manager</option>
										<option value="architect" <?= $employee->getFunction()== 'architect' ? 'selected' : '' ?>>architect</option>
										<option value="civil engineer" <?= $employee->getFunction()== 'civil engineer' ? 'selected' : '' ?>>civil engineer</option>
										<option value="project manager" <?= $employee->getFunction()== 'project manager' ? 'selected' : '' ?>>project manager</option>
										<option value="warehouse administrator" <?= $employee->getFunction()== 'warehouse administrator' ? 'selected' : '' ?>>warehouse administrator</option>
										<option value="site manager" <?= $employee->getFunction()== 'site manager' ? 'selected' : '' ?>>site manager</option>
									</select>
                            </div>
                        </div>
                    

                    
                        <div class="form-actions px-2 mt-4 mb-2">
                                <button class="btn btn-warning" name="update" type="submit">Update</button>
                                <a class="btn btn-outline-secondary" href="index.php">Back</a>
                        </div>
                    </form>
            </div>
        </div>

    </div>
</body>
</html>
<?php
    include '../config.php';
    include 'employeeManager.php';
    session_start();
    $employeeManager= new EmployeeManager();

    if(isset($_SESSION["username"])){
        $employees = $employeeManager->getAllEmployees($connect);

        if(isset($_GET["search"]) && isset($_GET["keywords"])){
            $employees = $employeeManager->searchBy($_GET["keywords"], $_GET["search"]);
        }

    } else {
        header("Location: signin.php");
    }



    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand btn">Employees Manager</a>
            <form method="GET" action="" class="d-flex">
                <select class="form-select me-2" name="keywords" >
                    <option value="employee_id">Employee Id</option>
                    <option value="first_name">First Name</option>
                    <option value="last_name">Last Name</option>
                    <option value="departement">Departement</option>
                    <option value="function">Function</option>
                </select>
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success text-white" type="submit">Search</button>
            </form>
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
        <div class="card mb-4">
    <div class="card-header">
        <div>Employees</div>
    </div>
        <div class="card-body">            
            <table class="table">
                <tr>
                    <th class="col">Photo</th>
                    <th class="col">Employee Id</th>
                    <th class="d-none d-lg-table-cell">First Name</th>
                    <th class="col">Last Name</th>
                    <th class="d-none d-lg-table-cell">Birth Date</th>
                    <th class="d-none d-md-table-cell">Departement</th>
                    <th class="d-none d-md-table-cell">Salary</th>
                    <th class="d-none d-lg-table-cell">Function</th>
                    <th class="col">Actions</th>
                </tr>

                <?php
                        foreach($employees as $employee){
                ?>

                <tr>
                    <td><img class="rounded-circle float-start sm-img" style="max: width 100px;" src="<?php echo '../images/'.$employee->getPhoto(); ?>"></td>
                    <td><?= $employee->getEmployeeId()?></td>
                    <td class="d-none d-lg-table-cell"><?= htmlspecialchars($employee->getFirstName())?></td>
                    <td><?= $employee->getLastName()?></td>
                    <td class="d-none d-lg-table-cell"><?= htmlspecialchars($employee->getBirthDate())?></td>
                    <td class="d-none d-md-table-cell"><?= htmlspecialchars($employee->getDepartement())?></td>
                    <td class="d-none d-md-table-cell"><?= htmlspecialchars($employee->getSalary())?></td>
                    <td class="d-none d-lg-table-cell"><?= htmlspecialchars($employee->getFunction())?></td>
                    <td>
                        <a class="btn btn-outline-primary" href="edit.php?id=<?php echo $employee->getId() ?>">Edit</a>
                        <a class="btn btn-outline-danger" href="delete.php?id=<?php echo $employee->getId() ?>">delete</a>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>       
</div>
    


    
</body>
</html>
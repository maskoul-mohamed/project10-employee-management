<?php
    include '../config.php';
    include 'employeeManager.php';

    $employee= new EmployeeManager();
    $employees = $employee->getAllEmployees($connect);
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
        <nav class=" navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Employee Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Add New</a>
        </li>
      </ul>
   
            </div>
        </div>
    </nav>
    <main class="container-fluid px-4 mt-5">
    <div class="card mb-4">
    <div class="card-header">
        <div>Employees</div>
    </div>
        <div class="card-body">            
            <table class="table">
                <tr>
                    <th class="col">Employee Id</th>
                    <th class="col">First Name</th>
                    <th class="col">Last Name</th>
                    <th class="col">Birth Date</th>
                    <th class="col">Departement</th>
                    <th class="col">Salary</th>
                    <th class="col">Function</th>
                    <th class="col">Photo</th>
                </tr>

                <?php
                        foreach($employees as $employee){
                ?>

                <tr>
                    <td><?= $employee->getEmployeeId()?></td>
                    <td><?= $employee->getFirstName()?></td>
                    <td><?= $employee->getLastName()?></td>
                    <td><?= $employee->getBirthDate()?></td>
                    <td><?= $employee->getDepartement()?></td>
                    <td><?= $employee->getSalary()?></td>
                    <td><?= $employee->getFunction()?></td>
                    <td><img src="<?php echo '../images/'.$employee->getPhoto(); ?>"></td>
                    <td>
                        <a href="edit.php?id=<?php echo $employee->getId() ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $employee->getId() ?>">delete</a>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
    </main>
</body>
</html>
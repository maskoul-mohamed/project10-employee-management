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
</head>
<body>
    <div>
        <a href="insert.php">Insert Data</a>
        <table>
            <tr>
                <th>Employee Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birth Date</th>
                <th>Salary</th>
                <th>Fonction</th>
                <th>Photo</th>
            </tr>

            <?php
                    foreach($employees as $employee){
            ?>

            <tr>
                <td><?= $employee['employee_id']?></td>
                <td><?= $employee['first_name']?></td>
                <td><?= $employee['last_name']?></td>
                <td><?= $employee['birth_date']?></td>
                <td><?= $employee['salary']?></td>
                <td><?= $employee['fonction']?></td>
                <td><img src="<?php echo '../images/'.$employee['photo']; ?>"></td>
                <td>
                    <a href="edit.php?id=<?php echo $employee['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $employee['id'] ?>">delete</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>
<?php
    $getfile = file_get_contents('people.json');
    $data = json_decode($getfile);
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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>

            <?php
                    foreach($data as $person){

            ?>

            <tr>
                <td><?= $person[1]?></td>
                <td><?= $person[2]?></td>
                <td><?= $person[3]?></td>
                <td><?= $person[4]?></td>
                <td>
                    <a href="edit.php?id=<?php echo $person[0] ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $person[0] ?>">delete</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>
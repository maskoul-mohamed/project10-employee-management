<?php

    $person;
    if(isset($_GET['id'])){
        $data = json_decode(file_get_contents('people.json'));

        foreach($data as $i){
            if($i[0]== $_GET['id']){
                $person = $i;
                break;
            }
        }
    }

    if(!empty($_POST)){
		$id = uniqid(false);
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $personToCahnge = array($id, $firstName, $lastName, $age, $gender);
        $file = file_get_contents('people.json');
        $data = json_decode($file, true);

       for($i = 0; $i < count($data); $i++){
        if($data[$i][0]== $_GET['id']){
            $data[$i] = $personToCahnge;
            break;
        }
       }
        file_put_contents('people.json', json_encode($data));
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
		<div><h3>Edit a User</h3>
        <form method="POST" action="">
			<div>
				<label for="inputFName">First Name</label>
				<input type="text" required="required" id="inputFName" value=<?= $person[1]?> name="fname" placeholder="First Name">
				<span></span>
			</div   >
			
			<div>
				<label for="inputLName">Last Name</label>
				<input type="text" required="required" id="inputLName" value=<?= $person[2] ?> name="lname" placeholder="Last Name">
        		<span></span>
			</div>
			
			<div>
				<label for="inputAge">Age</label>
				<input type="number" required="required" class="form-control" value=<?= $person[3] ?> id="inputAge" name="age" placeholder="Age">
				<span></span>
			</div>
				<div class="form-group">
					<label for="inputGender">Gender</label>
					<select class="form-control" required="required" id="inputGender" name="gender" >
						<option>Please Select</option>
						<option value="Male" <?= $person[4]== 'Male' ? 'selected' : '' ?>>Male</option>
						<option value="Female" <?= $person[4]== 'Female' ? 'selected' : '' ?>>Female</option>
					</select>
					<span></span>
        		</div>
    
			<div class="form-actions">
					<button type="submit">Edit</button>
					<a href="index.php">Back</a>
			</div>
		</form>
        </div></div>        
</div>
</body>
</html>
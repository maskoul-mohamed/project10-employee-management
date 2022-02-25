<?php
  session_start();
  define("ONE_WEEK", 7 * 86400);
  $errors = array('$message'=>'');
  if(isset($_POST["username"], $_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username == "admin" && $password=="admin"){
      setcookie("auth", "user", time()+ ONE_WEEK);
      $errors['message'] = "";
      header("Location: index.php");
    } else {
      $errors['message'] = "Username or password is incorrect ";
    }
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
    <title>Sign in</title>
</head>
<body class="text-center container">
    
    <main class="form-signin">
      <form method="POST" action="">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="text-danger my-2"><?php echo $errors["message"]?></div>

        <button class="w-100 btn btn-lg btn-primary" type="submit" name="signin">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
      </form>
    </main>
    
    
</body>
</html>
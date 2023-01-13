<?php

require_once "../pt11v0/fn-php/fn_users.php";
use proven\fn_users as fn_users;


if (filter_has_var(INPUT_POST, "registersubmit"))  {
  // Validations.
  $name = filter_input(INPUT_POST, "name", FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z0-9ÑñÇçàèìòùáéíóúºª-äëïöü' ]+)$/")));
  $surname = filter_input(INPUT_POST, "surname", FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z0-9ÑñÇçàèìòùáéíóúºª-äëïöü' ]+)$/")));
  $username = filter_input(INPUT_POST, "username", FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z0-9ÑñÇçàèìòùáéíóúºª-äëïöü' ]+)$/")));
  $password = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z0-9ÑñÇçàèìòùáéíóúºª-äëïöü' ]+)$/")));

  // Validar Inputs
  if (is_string($name) && is_string($surname) && is_string($username)) {
    $result = fn_users\registerUser($username, $password, $name, $surname);
    if ($result === true) {
      //start session
      session_start();
      //save info in session
      $_SESSION["user_valid"] = true;
      header("Location: index.php");
    }else{
      $message = "<p class='div_error'>Registration denied, user already exists.</p>";
    }

  }else{
    $message = "<p class='div_error'>The data entered is incorrect</p>";
  }

}else {
  $username = "";
  $password = "";
  $name     = "";
  $surname  = ""; 
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="./css/main.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="fondo" >

<div>
<?php include_once "topmenu.php"; ?>

  <form class="form-container" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  <fieldset>
    <div class="div-fielset" >
    <h2> Registration </h2>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="surname">Surname:</label>
      <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname">
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    
    
    <button type="submit" name="registersubmit" class="btn btn-default">Submit</button>

    <div class="div_error">
      <?php if(isset ($message)){ print ($message);} ?>
    </div>
    </div>
  </fieldset>
  </form>
  <?php include_once "footer.php";?>
</div>
</body>
</html>
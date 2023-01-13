<?php

require_once "../pt11v0/fn-php/fn_users.php";
use proven\fn_users as fn_users;

if (filter_has_var(INPUT_POST, "loginsubmit"))  {
  // Validations.
  $username = filter_input(INPUT_POST, "username");
  $password = filter_input(INPUT_POST, "password");

  // search user
  $user_info = fn_users\searchUser($username);
  if (count($user_info) !=0) { // user found
    // check password
    if ($user_info[1] === $password) {
      //start session
      session_start();
      //save data in session
      $_SESSION["role"]    = $user_info[2];
      $_SESSION["name"]    = $user_info[3];
      $_SESSION["surname"] = $user_info[4];
      $_SESSION["user_valid"] = true;
      header("Location: index.php");
    }
  }else{
    $error = "<p class='div_error'>Access denied.</p>";
  }
} else {
  $username = "";
  $password = "";
  $name     = "";
  $surname  = "";
  
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="./css/main.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="fondo" >

<div class="container-fluid">
  <?php include_once "topmenu.php"; ?>


  <form class="form-container" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <fieldset>
    <div class="div-fielset" >
    <h2> Login </h2>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="username" class="form-control" id="username" placeholder="Enter username" name="username" >
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" >
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>

    <button type="submit" name="loginsubmit" class="btn btn-default">Submit</button>

    <div class="div_error">
      <?php if(isset ($error)){ print ($error);} ?>
    </div>
    </div>
    </fieldset>
  </form>
  <?php include_once "footer.php";?>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Admin users</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    </head>
    <body>
    <?php include_once "topmenu.php";?>
    <?php
    $role = '';
    if(isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
    }elseif(!isset(($_SESSION['role']))){
        header("Location:login.php");
        exit;
    }?>

        <div>
            <p style="text-align: center; font-size: 22pt;"><b> Admin users </b></p>
            <p style="text-align: center; font-size: 22pt;"><b> This page is in development! </b></p>
        </div>

    <?php include "./footer.php";?>
</body>
</html>
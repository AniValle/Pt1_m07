<?php
require_once "./fn-php/fn_menu.php";
use proven\fn_menu as fn_menu;

$categorias = fn_menu\get_caterory();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>View menu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
    </head>
    <body class="fondo">
    <?php include_once "topmenu.php";?>
    <?php
    $role = '';
    if(isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
    }elseif(!isset(($_SESSION['role']))){
        header("Location:login.php");
        exit;
    }
    ?>

        <div class="container">
            <div>
                <h1 class="style_h1"> MENU </h1>
                <br>
            </div>
            <?php
            foreach ($categorias as $cat){
                $dishes = fn_menu\search_dishes($cat);
                if(empty($dishes)){
                    echo "<p> Error with the menu file, check the path or file name. </p>";
                    break;
                }else{
                    echo "<h4 class='h4'>". strtoupper ($cat) . "</h4>";
                fn_menu\tabla_menu($dishes);
                }
            };?>

        </div>
    </div>
    </body>
</html>
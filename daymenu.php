<?php

require_once "./fn-php/fn_day_menu.php";
require_once "./fn-php/fn_menu.php";

use proven\fn_menu as fn_menu;
use proven\fn_day_menu as fn_day_menu;

$categorias = fn_menu\get_caterory();


?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <title>Day menu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/daymenu.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
    </head>

    <body class="fondo">        
    <?php include_once "topmenu.php";?>

        <div class="container">
            <div>
                <h1 class="style_h1"> DAY MENU </h1>
                <h3 class="ribbon"> 16 € </h3>
            </div>

            <div>
                <?php
                foreach ($categorias as $cat){
                    $dishes = fn_day_menu\search_dishes($cat);
                    if(empty($dishes)){
                        echo "<p> Error with the menu of the day file, check the path or file name </p>";
                        break;
                    }else{
                        echo "<h4 class='h4' >". strtoupper ($cat) . "</h4>";
                    fn_day_menu\list_menu($dishes);
                    }
                };
                ?>
            </div>
        </div>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>
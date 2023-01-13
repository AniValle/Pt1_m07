<?php
session_start();

require_once "./logout.php";
use proven\logout as logout;

$role = '';
if(isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

logout\logout();

?>

<header>
    <div>
    
        <nav class="navbar navbar-default">
        <div class="navbar-container col-md-10">
        <!--verify the role of the users, and depending on the role,
        some options will be displayed in the menu or others -->
        
        <ul class="nav navbar-nav">
        <div class="navbar-header" >
            <li> <a class="navbar-header" href="https://super-del-corral.myshopify.com/blogs/noticias/menu"><img src="./images/j&jgrill2.png"></a> </li>
        </div>
        
            <?php 
            echo '<li><a href="./index.php">Home</a></li>';
                if ($role == ""){
                    echo '<li> <a href="./daymenu.php">  Day menu  </a> </li>';
                    echo '<li> <a href="./register.php">  Register  </a> </li>';
                    echo '<li> <a href="./login.php">  Login   </a> </li>';

                    }elseif ($role == 'registered'){
                    echo '<li> <a href="./daymenu.php">  Day menu  </a> </li>';
                    echo '<li> <a href="./view_menus.php">  View menus  </a> </li>';

                    }elseif ($role == 'staff') {
                        echo '<li> <a href="./daymenu.php">  Day menu  </a> </li>';
                        echo '<li> <a href="./view_menus.php">  View menus  </a> </li>';
                        echo '<li> <a href="./admin_menus.php">  Admin menus  </a> </li>';
                        
                    }elseif ($role == 'admin'){
                        echo '<li> <a href="./daymenu.php">  Day menu  </a> </li>';
                        echo '<li> <a href="./view_menus.php">  View menus  </a> </li>';
                        echo '<li> <a href="./admin_menus.php">  Admin menus  </a> </li>';
                        echo '<li> <a href="./admin_users.php">  Admin users  </a> </li>';
                    }
            ?>
            </ul>
        
    <?php
        if (!empty($role)) {
            echo 
                '<div class=" div-menu">
                    <div>
                        <p class="welcome-usr-tag" ><b> Welcome ' . ucfirst($_SESSION['name']) . ' ' . ucfirst($_SESSION['surname']) . '</b></p>
                    </div>
                    <form  action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post">
                        <button class="btn" id="logout-btn" name="logout" type="submit">Logout</button>
                    </form>
                </div>';
        }
    ?>
        </div>
        </nav>

    </div>

</header>

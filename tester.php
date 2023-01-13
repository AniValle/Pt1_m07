<?php
include "/home/ani/dawbio2/m07/PRACTICA/dawbi-m07-pt11v0/pt11v0/fn-php/fn_users.php";

use proven\fn_users as fn_users;

$result = fn_users\searchUser("user1");
echo "<pre>";
print_r($result);
echo "</pre>";

//.
$usernameR = "user8";
$password = "pass8";
$name = "name8";
$surname = "surname8";

$result = fn_users\registerUser($usernameR, $password, $name, $surname);
if ($result == true){
    echo "usuario ingresado";
}else{
    echo "El Usuario ya Existe";
}
print($result);

?>

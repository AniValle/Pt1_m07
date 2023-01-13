<?php
namespace proven\logout;

/* If you press "logout" the session expires,
nullifies their values and destroys the session.
*/
function logout(){
    if(isset($_POST['logout'])) {
        session_destroy();
        header('Location: index.php');
        exit;
    }
};
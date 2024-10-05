<?php 
require 'includes/header.php';
//session_destroy(); //logout from the current session , also if the page refreshes

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<h1>Hello, $username</h1>";
} else {
    echo "<h1>Hello, guest!</h1>";
}


?>

<h1>Hello user!</h1>
    </body>
</htnl>

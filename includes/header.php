<?php
require 'config/config.php';


if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
}
else {
    header("Location: register.php");
}

?>



<htnl>
    <head>
        <title>Social Nest</title>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>

   



</body>
</html>
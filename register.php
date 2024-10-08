<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>
<html>

<head>

    <title>Welcome to Social Nest</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>

<body>

    <?php
    if (isset($_POST['register_button'])) {
        echo '
        <script>
        $(document).ready(function() {
            $("#first").hide();
            $("#second").show();
        });
        </script>';
    }

    ?>

    <div class="wrapper">
        <div class="login_box">
            <div class="login_header">
                <h1>Social Nest</h1>
                Login or Sign up below!
            </div>

            <div id="first">
                <form action="register.php" method="POST">
                    <input type="email" name="log_email" placeholder="Email Address" value="<?php
                                                                                            if (isset($_SESSION['log_email'])) {
                                                                                                echo $_SESSION['log_email'];
                                                                                            }
                                                                                            ?>" required>

                    <br>
                    <input type="password" name="log_password" placeholder="Password">
                    <br>
                    <?php if (in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect<br>" ?>
                    <input type="submit" name="login_button" value="Login">
                    <br>
                    <a href="#" id="signup" class="signup">Need an account? Register here!</a>

                </form>
            </div>
            <div id="second">
                <form action="register.php" method="POST">
                    <input type="text" name="reg_fname" placeholder="First Name" value="<?php
                                                                                        if (isset($_SESSION['reg_fname'])) {
                                                                                            echo $_SESSION['reg_fname'];
                                                                                        }
                                                                                        ?>" required>
                    <br>
                    <?php if (in_array("First name must be between 2 and 25 characters<br>", $error_array)) echo "First name must be between 2 and 25 characters<br>" ?>

                    <input type="text" name="reg_lname" placeholder="Last Name" value="<?php
                                                                                        if (isset($_SESSION['reg_lname'])) {
                                                                                            echo $_SESSION['reg_lname'];
                                                                                        }
                                                                                        ?>" required>
                    <br>
                    <?php if (in_array("Last name must be between 2 and 25 characters<br>", $error_array)) echo "Last name must be between 2 and 25 characters<br>" ?>

                    <input type="email" name="reg_email" placeholder="Email" value="<?php
                                                                                    if (isset($_SESSION['reg_email'])) {
                                                                                        echo $_SESSION['reg_email'];
                                                                                    }
                                                                                    ?>" required>
                    <br>

                    <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
                                                                                                if (isset($_SESSION['reg_email2'])) {
                                                                                                    echo $_SESSION['reg_email2'];
                                                                                                }
                                                                                                ?>" required>
                    <br>
                    <?php if (in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
                    else if (in_array("Invalid format<br>", $error_array)) echo "Invalid format<br>";
                    else if (in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>

                    <input type="Password" name="reg_password" placeholder="Password" required>
                    <br>
                    <input type="Password" name="reg_password2" placeholder="Confirm Passowrd" required>
                    <br>
                    <?php if (in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>";
                    else if (in_array("Password can only contain letters and numbers<br>", $error_array)) echo "Password can only contain letters and numbers<br>";
                    else if (in_array("Password must be between 5 and 30 characters<br>", $error_array)) echo "Password must be between 5 and 30 characters<br>"; ?>

                    <input type="submit" name="register_button" value="Register">
                    <br>

                    <?php if (in_array("<span style='color: #14C800';>You are all set Goahead and login</span><br>", $error_array)) echo "<span style='color: #14C800';>You are all set Goahead and login</span><br>";   ?>
                    <a href="#" id="signin" class="signin">Already have an account? Signin here!</a>

                </form>
            </div>
        </div>
    </div>

<script>
    
$(document).ready(function() {

	//On click signup, hide login and show registration form
	$("#signup").click(function() {
		$("#first").slideUp("slow", function(){
			$("#second").slideDown("slow");
		});
	});

	//On click signup, hide registration and show login form
	$("#signin").click(function() {
		$("#second").slideUp("slow", function(){
			$("#first").slideDown("slow");
		});
	});
});

</script>

</body>

</html>

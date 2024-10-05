<?php

//Declaring variables
$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = ""; //Sign up date
$error_array = array(); //Holds error message

if(isset($_POST['register_button'])){
    
    
    //Registration form values
    //First name
    $fname = strip_tags($_POST['reg_fname']);//remove html tags
    $fname = str_replace(' ','', $fname); //remove spaces
    $fname = ucfirst(strtolower($fname));//Uppercase first letter
    $_SESSION['reg_fname'] = $fname; //Storing values in session variables

    //Last name
    $lname = strip_tags($_POST['reg_lname']);//remove html tags
    $lname = str_replace(' ','', $lname); //remove spaces
    $lname = ucfirst(strtolower($lname));//Uppercase first letter
    $_SESSION['reg_lname'] = $lname; //Storing values in session variables

    //email
    $em = strip_tags($_POST['reg_email']);//remove html tags
    $em = str_replace(' ','', $em); //remove spaces
    $em = ucfirst(strtolower($em));//Uppercase first letter
    $_SESSION['reg_email'] = $em; //Storing values in session variables

     //email2
     $em2 = strip_tags($_POST['reg_email2']);//remove html tags
     $em2 = str_replace(' ','', $em2); //remove spaces
     $em2 = ucfirst(strtolower($em2));//Uppercase first letter
     $_SESSION['reg_email2'] = $em2; //Storing values in session variables

    //Password
    $password = strip_tags($_POST['reg_password']);//remove html tags
    $password2 = strip_tags($_POST['reg_password2']);//remove html tags

    $date = date("Y-m-d"); //Current date

    if($em == $em2){
        //Check if email is in valid format
        if(filter_var($em, FILTER_VALIDATE_EMAIL)){

            $em = filter_var($em, FILTER_VALIDATE_EMAIL);

            //Check if email already exist\
            $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

            //Count the numberv of rows returnet 
            $num_rows = mysqli_num_rows($e_check);

            if($num_rows > 0){
                array_push($error_array, "Email already in use<br>");
            }

        }
        else{
            array_push($error_array, "Invalid format<br>");
        }



    }
    else{
        array_push($error_array, "Emails don't match<br>");
    }
    if(strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array, "First name must be between 2 and 25 characters<br>");
    }
    if(strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array, "Last name must be between 2 and 25 characters<br>");
    }
    if($password != $password2){
        array_push($error_array, "Your passwords do not match<br>");
    }
    else{
        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($error_array, "Password can only contain letters and numbers<br>");
        }
    }
    if(strlen($password) > 30 || strlen($password) < 5){
        array_push($error_array, "Password must be between 5 and 30 characters<br>");
    }

    if(empty($error_array)) {
        $password = md5($password); //Encrypt password before sending to database

        //generate username by concatenating first and last name 
        $username = strtolower($fname . "_" . $lname);
        $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

        $i = 0;
        //if username exists add number to username
        while(mysqli_num_rows($check_username_query) != 0) {
            $i++; //add 1 to i
            $username = $username . '_' . $i;
            $check_username_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
        }

        //profile picture assignment
        $rand = rand(1,2);
        if ($rand == 1){
            $profile_pic = "C:/xampp/htdocs/main/assets/images/profile_pics/defaults/head_deep_blue.png";
        }
        else if($rand == 2){
        $profile_pic = "C:/xampp/htdocs/main/assets/images/profile_pics/defaults/head_emerald.png";
        }

        $query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

        array_push($error_array, "<span style='color: #14C800';>You are all set Goahead and login</span><br>");

        //Clear session variables
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";

    }

    // Close connection
    mysqli_close($con);
}

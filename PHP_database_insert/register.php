<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:../index.php");
require_once('db.php');

$email = mysqli_real_escape_string($connection, $_POST['email']);
$pwd1 = mysqli_real_escape_string($connection, $_POST['pwd1']);
$pwd1 = password_hash($pwd1, PASSWORD_DEFAULT);
$user_type = $_POST['user_type'];

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
    }
//Put email and user type in session

    $session_email = $_POST['email'];
    $session_user_type = $_POST['user_type'];

$_SESSION['name'] =$session_email;
$_SESSION['user_type'] = $session_user_type;



// Attempt to insert into database
if($_POST['pwd1']== $_POST['pwd2']) {
    $sql = "INSERT INTO users (email, password, user_type) VALUES ('$email','$pwd1','$user_type')";
    if (mysqli_query($connection, $sql)) {
        #echo "Successfully registered.";
    } else {
        echo "Error: Could not execute." . mysqli_error($connection);
    }
}
else{
    die('Passwords do not match, please reurn to the previous page');
}


    //Redirect to correct additional details form
    if($user_type == "Service Provider") {
        header('Location:../sp_details.php');
    }

    else if($user_type == "Customer"){
        header('Location:../cust_details.php');
    }
    else{
        echo "User_type Invalid";
    }




mysqli_close($connection);
?>


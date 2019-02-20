<?php
session_start();
require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
    }
//Put email and user type in session

    $session_email = $_POST['email'];
    $session_user_type = $_POST['user_type'];

$_SESSION['name'] =$session_email;
$_SESSION['user_type'] = $user_type;



// Attempt to insert into database
    $sql = "INSERT INTO users (email, password, user_type) VALUES ('$_POST[email]','$_POST[pwd1]','$_POST[user_type]')";
    if (mysqli_query($connection, $sql)) {
        #echo "Successfully registered.";
    }
    else {
        echo "Error: Could not execute." . mysqli_error($connection);
    }


    //Redirect to correct additional details form
    if($_POST['user_type'] == 'Service Provider') {
        header('Location:../SP_details.html');
    }

    else if($_POST['user_type'] == 'Customer'){
        header('Location:../cust_details.html');
    }
    else{
        echo "User_type Invalid";
    }




mysqli_close($connection);
?>


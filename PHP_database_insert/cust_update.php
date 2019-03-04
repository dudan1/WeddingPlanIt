<?php
session_start();
require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

$session_email = $_SESSION['name'];
$new_firstname=$_POST['first_name'];
$new_surname=$_POST['surname'];

// Attempt to insert into database
$sql = "UPDATE customer SET first_name = '$new_firstname', surname = '$new_surname' 
            WHERE (email = '$session_email')";
if (mysqli_query($connection, $sql)){
    #echo "Successfully registered.";
    header('Location:../cust_home.php');
}
else {
    echo "Error: Could not execute." . mysqli_error($connection);
}
mysqli_close($connection);
?>
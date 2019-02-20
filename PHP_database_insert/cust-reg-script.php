<?php

session_start();
require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

//Retrieve email from Session
$session_email = $_SESSION['name'];

// Attempt to insert into database
$sql = "INSERT INTO customer (email, first_name, surname) 
            VALUES ('$session_email','$_POST[first_name]','$_POST[surname]')";
if (mysqli_query($connection, $sql)){
    #echo "Successfully registred.";
    header('Location:user_home.php');
} else {
    echo "Error: Could not execute." . mysqli_error($connection);
}
mysqli_close($connection);
session_destroy();
?>
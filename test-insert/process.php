<?php

require_once('test-db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
    }
// Attempt to insert into database
$sql = "INSERT INTO test (first_name, surname, email, password) VALUES ('$_POST[first_name]','$_POST[surname]','$_POST[email]','$_POST[password]')";

if (mysqli_query($connection, $sql)){
    #echo "Successfully registred.";
    header('Location:home.php');
} else {

    echo "Error: Could not execute." . mysqli_error($connection);
}

mysqli_close($connection);
?>


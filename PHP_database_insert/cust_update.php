<?php
session_start();
require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

$session_email = $_SESSION['name'];
$new_firstname =  mysqli_real_escape_string($connection, $_POST['first_name']);
$new_surname = mysqli_real_escape_string($connection, $_POST['surname']);
$new_phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
$new_wedding_date = mysqli_real_escape_string($connection, $_POST['wedding_date']);
$new_budget = mysqli_real_escape_string($connection, $_POST['budget']);

// Attempt to insert into database
$sql = "UPDATE customer SET first_name = '$new_firstname', surname = '$new_surname', phone_number = $new_phone_number, wedding_date = '$new_wedding_date', budget = '$new_budget'
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
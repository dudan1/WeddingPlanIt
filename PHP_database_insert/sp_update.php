<?php
session_start();
require_once('db.php');
if (!IsSet($_SESSION["name"]))
    header("Location:../index.php");

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

$session_email = $_SESSION['name'];
$new_firstname = mysqli_real_escape_string($connection, $_POST['first_name']);
$new_surname = mysqli_real_escape_string($connection, $_POST['surname']);
$new_address = mysqli_real_escape_string($connection, $_POST['address']);
$new_postcode = mysqli_real_escape_string($connection, $_POST['postcode']);
$new_business_name = mysqli_real_escape_string($connection, $_POST['business_name']);
$new_category = $_POST['category'];
$new_description = mysqli_real_escape_string($connection, $_POST['description']);
$new_price = mysqli_real_escape_string($connection,$_POST['price']);

// Attempt to insert into database
$sql = "UPDATE service_provider SET first_name = '$new_firstname', surname = '$new_surname', business_name = '$new_business_name', address = '$new_address',
 postcode = '$new_postcode', category = '$new_category', description = '$new_description', price = '$new_price'
            WHERE (email = '$session_email')";
if (mysqli_query($connection, $sql)){
    #echo "Successfully registered.";
    header('Location:../sp_profile.php');
}
else {
    echo "Error: Could not execute." . mysqli_error($connection);
}
mysqli_close($connection);
?>
<?php
session_start();
require_once('db.php');
if (!IsSet($_SESSION["name"]))
    header("Location:../index.html");

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

$session_email = $_SESSION['name'];
$new_firstname=$_POST['first_name'];
$new_surname=$_POST['surname'];
$new_address=$_POST['address'];
$new_postcode=$_POST['postcode'];
$new_business_name=$_POST['business_name'];
$new_category=$_POST['category'];
$new_description=$_POST['description'];

// Attempt to insert into database
$sql = "UPDATE service_provider SET first_name = '$new_firstname', surname = '$new_surname', business_name = '$new_business_name', address = '$new_address',
 postcode = '$new_postcode', category = '$new_category', description = '$new_description'
            WHERE (email = '$session_email')";
if (mysqli_query($connection, $sql)){
    #echo "Successfully registered.";
    header('Location:../sp_home.php');
}
else {
    echo "Error: Could not execute." . mysqli_error($connection);
}
mysqli_close($connection);
?>
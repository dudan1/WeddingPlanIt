
<?php
session_start();
require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}




//Retrieve email from Session
$session_email = $_SESSION['name'];

$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
$surname = mysqli_real_escape_string($connection, $_POST['surname']);
$address = mysqli_real_escape_string($connection, $_POST['address']);
$postcode = mysqli_real_escape_string($connection, $_POST['postcode']);
$category = $_POST['category'];
$price = mysqli_real_escape_string($connection, $_POST['price']);
$business_name = mysqli_real_escape_string($connection, $_POST['business_name']);
$description = mysqli_real_escape_string($connection, $_POST['description']);


// Attempt to insert into database

$sql = "INSERT INTO service_provider (email, first_name, surname, address, postcode, category, price, business_name, description) 
            VALUES ('$session_email','$first_name','$surname','$address','$postcode','$category','$price','$business_name', '$description')";
if (mysqli_query($connection, $sql)){
    #echo "Successfully registred.";
    header('Location:../sp_home.php');
} else {
    echo "Error: Could not execute." . mysqli_error($connection);
}
mysqli_close($connection);

?>
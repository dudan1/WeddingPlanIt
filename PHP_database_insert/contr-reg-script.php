
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

$sql = "INSERT INTO service_provider (email, first_name, surname, address, postcode, category, business_name, description) 
            VALUES ('$session_email','$_POST[first_name]','$_POST[surname]','$_POST[address]','$_POST[postcode]','$_POST[category]','$_POST[business_name]', '$_POST[description]')";
if (mysqli_query($connection, $sql)){
    #echo "Successfully registred.";
    header('Location:../sp_home.php');
} else {
    echo "Error: Could not execute." . mysqli_error($connection);
}
mysqli_close($connection);

?>
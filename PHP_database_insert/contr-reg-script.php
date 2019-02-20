<?php
require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}
// Attempt to insert into database
$sql = "INSERT INTO contractor (email, first_name, surname, address, postcode, category, business_name) 
            VALUES ('$_POST[email]','$_POST[first_name]','$_POST[surname]','$_POST[address]','$_POST[postcode]','$_POST[category]','$_POST[business_name]')";

if (mysqli_query($connection, $sql)){
    #echo "Successfully registred.";
    header('Location:home_test.php');
} else {

    echo "Error: Could not execute." . mysqli_error($connection);
}

mysqli_close($connection);

?>
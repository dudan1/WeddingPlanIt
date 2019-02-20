<?php

require_once('test-db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
    }
// Attempt to insert into database
$sql = "INSERT INTO test (email, password, user_type) VALUES ('$_POST[first_name]','$_POST[surname]','$_POST[email]','$_POST[password]','$_POST[user_type]')";

$user_category = $_POST[user_type];
if (mysqli_query($connection, $sql)){
    #echo "Successfully registred.";
    if ($user_category == contractor) {
        'Location: contractors-register.php';
    } else
    'Location:home_test.php');

} else {

    echo "Error: Could not execute." . mysqli_error($connection);
}

mysqli_close($connection);
?>


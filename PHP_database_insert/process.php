<?php

require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
    }
// Attempt to insert into database
    $sql = "INSERT INTO users (email, password, user_type) VALUES ('$_POST[email]','$_POST[pwd1]','$_POST[user_type]')";
    if (mysqli_query($connection, $sql)) {
        #echo "Successfully registered.";
        header('Location:user_home.php');
    }
    else {

        echo "Error: Could not execute." . mysqli_error($connection);
    }



mysqli_close($connection);
?>


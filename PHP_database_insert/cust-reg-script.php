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

   if($_SESSION['user_type'] == 'Customer'){
       header('Location:../cust_home.php');
   }
   elseif($_SESSION['user_type'] == 'Service Provider'){
       header('Location:../sp_home.php');
   }
   else{
       echo 'User type invalid';
   }
}
else {
    echo "Error: Could not execute." . mysqli_error($connection);
}
mysqli_close($connection);
?>
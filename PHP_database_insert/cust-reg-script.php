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
$phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
$wedding_date = mysqli_real_escape_string($connection, $_POST['wedding_date']);
$budget = mysqli_real_escape_string($connection, $_POST['budget']);
    
// Attempt to insert into database
$sql = "INSERT INTO customer (email, first_name, surname, phone_number, wedding_date, budget) 
            VALUES ('$session_email','$first_name','$surname', '$phone_number', '$wedding_date', '$budget')";
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

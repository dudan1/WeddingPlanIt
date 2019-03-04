<?php
/**
 * Created by PhpStorm.
 * User: 1809591
 * Date: 18/02/2019
 * Time: 16:11
 */
session_start();
require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}
$email = $_POST['email'];

$password = $_POST['pwd1'];



$sql = "Select email, password, user_type FROM users WHERE '$email' = email AND '$password' = password";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];

$count =mysqli_num_rows($result);

if($count == 1){
    $_SESSION['name'] =$email;
    $_SESSION['password'] = $password;

    if($row['user_type'] == 'Customer'){
        header('Location:../cust_home.php');
    }
    elseif($row['user_type'] == 'Service Provider'){
        header('Location:../sp_home.php');
    }
    else{
        echo 'User Type is invalid';
    }
}
else{
    $error = 'Your login email or password is invalid';
    header('Location:../index.html');
}




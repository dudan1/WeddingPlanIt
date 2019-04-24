<?php
session_start();
require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['pwd1']);




$sql = "SELECT * FROM users WHERE email = '$email'";

$result =mysqli_query($connection,$sql) or die(mysqli_error($connection));

$count =mysqli_num_rows($result);

if($count > 0){

    while($row = mysqli_fetch_array($result)) {
        if (password_verify($password, $row['password']) AND $row['IsSuspended'] == 0) {

            $_SESSION['name'] = $email;
            $_SESSION['password'] = $password;

            if ($row['user_type'] == 'Customer') {
                $_SESSION['user_type'] = $row['user_type'];
                header('Location:../cust_home.php');

            } elseif ($row['user_type'] == 'Service Provider') {
                $_SESSION['user_type'] = $row['user_type'];
                header('Location:../sp_home.php');
            }
            elseif ($row['user_type'] == 'Admin') {
                $_SESSION['user_type'] = $row['user_type'];
                header('Location:../admin_manage_accounts.php');
            }else {
                echo "User details are wrong";
            }
        } else {
            session_destroy();
            $error = 'Your login email or password is invalid';
            header('Location:../index.php');

        }
            }
    }else{
    session_destroy();
       $error = 'Your login email or password is invalid';
    header('Location:../index.php');
}









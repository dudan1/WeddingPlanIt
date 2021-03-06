<?php

session_start();
$errors = [];
$user_id = "";

// connect to database
require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    // ensure that the user exists on our system
    $query = "SELECT email FROM users WHERE email='$email'";
    $results = mysqli_query($connection, $query);

    if (empty($email)) {
        array_push($errors, "Your email is required");
    }else if(mysqli_num_rows($results) <= 0) {
        array_push($errors, "Sorry, no user exists on our system with that email");
       header('location:../enter_email2.php');
    }
    // generate a unique random token of length 100
    //$token = bin2hex(random_bytes(50));
    $token = bin2hex(openssl_random_pseudo_bytes(3));

    if (count($errors) == 0) {
        // store token in the password-reset database table against the user's email
        $sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
        $results = mysqli_query($connection, $sql);

                    // Send email to user with the token in a link they can click on
                  //  $to = $email;
                    /*$subject = "Reset your password on WeddingPlanIt";
                    $msg = "Hi there, click on this <a href=\"http://localhost/weddingplanit/password-recovery/new_password.php?token=" . $token . "\">link</a> to reset your password on our site";
                    $msg = wordwrap($msg,70);
                    $headers = "From: info@weddingplanit.co.uk";
                    mail($to, $subject, $msg, $headers);*/
//        header('location: ../pending.php?email=' . $email);
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;
        header('Location:../password_reset_code.php');
    }
}

// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
    $new_pass = mysqli_real_escape_string($connection, $_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($connection, $_POST['new_pass_c']);
    $token = mysqli_real_escape_string($connection, $_POST['token']);

    // Grab to token that came from the email link
    //$token = $_SESSION['token'];

    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
//    if (count($errors) == 0) {
        // select email address of user from the password_reset table
        $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
        $results = mysqli_query($connection, $sql);
        $email = mysqli_fetch_assoc($results)['email'];

        if ($email) {
            $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
            $results = mysqli_query($connection, $sql);
            header('location: ../success.php');
        }
//    }
}
?>
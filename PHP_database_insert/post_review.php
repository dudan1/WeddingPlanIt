<?php
session_start();
require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

//Retrieve email from Session

$review_text = mysqli_real_escape_string($connection, $_POST['review_text']);
$review_score = mysqli_real_escape_string($connection, $_POST['review_score']);
$review_title = mysqli_real_escape_string($connection, $_POST['review_title']);
$c_id = mysqli_real_escape_string($connection, $_SESSION['cust_id']);
$sp_id = mysqli_real_escape_string($connection, $_SESSION['sp_id']);

$sql = "INSERT INTO reviews (c_id, sp_id, review_text, review_score, review_title) 
            VALUES ('$c_id','$sp_id','$review_text','$review_score','$review_title')";
if (mysqli_query($connection, $sql)){
    #echo "Successfully registred.";
    header('Location:../cust_home.php');
} else {
    echo "Error: Could not execute." . mysqli_error($connection);
}
mysqli_close($connection);
?>
<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:../index.php");
require_once('db.php');

$cust_id = $_POST['cust_id'];
$sp_id = $_POST['sp_id'];
print $cust_id;
$sql = "INSERT INTO contracts (Cust_ID, SP_ID, Contract_Date) VALUES ('$cust_id', '$sp_id', now())";
if (mysqli_query($connection, $sql)){
    header('Location:../cust_home.php');
} else {
    echo "Error: Could not execute." . mysqli_error($connection);
}
mysqli_close($connection);
?>
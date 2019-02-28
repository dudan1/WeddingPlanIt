<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:../index.html");

require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}
// Receive category selection from homepage
$search = $_POST['category'];

// Search database for contractors of selected category
$sql = 'SELECT * FROM service_provider WHERE category == "$search"';
$result =mysqli_query($connection,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
</head>
<body>

</body>
</html>

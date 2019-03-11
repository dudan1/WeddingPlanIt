<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:../index.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Homepage</title>
</head>
<body>
<p>Congratulations you have reached the Customer Homepage!</p>
<a href="../PHP_database_insert/logout.php">Log Out</a>
</body>
</html>
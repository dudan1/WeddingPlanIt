<?php
$servername = "CSDM-WEBDEV";
$username = "1809591";
$password = "1809591";
$dbname = "db1809591_cmm007";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made!" . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($connection) . PHP_EOL;

mysqli_close($connection);
?>;
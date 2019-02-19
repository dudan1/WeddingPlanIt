<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:../index.html");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to your home page></title>
</head>
<body>
<header>
    <h2>Welcome to your home page</h2>
</header>
<main>
    <p>Hi ... you have successfully logged in</p>
    <a href="logout.php">Log Out</a>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Wedding Planit</p>
</footer>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
</head>
<body>
<header>
<h2>Signup to Wedding Planit</h2>
</header>
<main>
<p>To create an account, please enter your information below and submit</p>
    <form action="process.php" method="post">
        First name: <input type="text" name="first_name"><br>
        Last name: <input type="text" name="surname"><br>
        Email address: <input type="email" name="email"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Signup">
    </form>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Wedding Planit</p>
</footer>
</body>
</html>
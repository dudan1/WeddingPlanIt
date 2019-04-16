<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>FAQs</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">
    <link rel="stylesheet" type="text/css" href="CSS/accordion.css">

<link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/superceded/favicon1.ico" type="image/x-icon">

</head>
<body>
<header>
    <?php require 'Templates/navbar/navbar_out.php';
    ?>

    <p><button class="btn5 info5" onclick="document.getElementById('id02').style.display='block'" style="width:110px;height:auto;float:right">Log In</button></p>

    <div id="id02" class="modal">

        <form class="modal-content animate" action="PHP_database_insert/login.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
                <h2>LOGIN</h2>

                <p>Your email:</p>
                <p><input type="email" required name="email"></p>
                <p>Your Password:</p>
                <p><input type="password" required name="pwd1"></p>

                <button type="submit">Log in</button>

                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
            </div>
        </form>
    </div>

    <p><button class="btn6 info6" onclick="document.getElementById('id01').style.display='block'" style="width:110px;height:auto;float:right">Sign up</button></p>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="PHP_database_insert/register.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
                <h2>REGISTER</h2>
                <p>User type: You are a:
                    <select id="UserType" name="user_type">
                        <option>Service Provider</option>
                        <option>Customer</option>
                    </select>
                <p>Your email:</p>
                <p><input type="email" required name="email"></p>
                <p>Password: <input type="password" required name="pwd1"></p>
                <p>Confirm Password: <input type="password" required name="pwd2"></p>

                <button type="submit">Sign Up!</button>

                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
            </div>
        </form>
    </div>

</header>
<main>
    <?php require 'Templates/about_us/faq_text.php';?>

</main>

<footer class="footer">
    <?php require 'Templates/footer/footer.php';

    ?>
</footer>

</body>

</html>

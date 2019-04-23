<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Wedding PlanIt</title>
<!--    <link rel="stylesheet" type="text/css" href="CSS/styles.css">-->
<!--    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">-->
<!--    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">-->

<!--    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">-->
<!--    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">-->


</head>

<body style=" background-image: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.9)),url(assets/images/wed.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;">
<header>

                <h2>ADMIN LOGIN</h2>

                <p>Email:</p>
                <p><input type="email" required name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"></p>
                <p>Password:</p>
                <p><input type="password" required name="pwd1"></p>

                <button type="submit">Log in</button>

                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>

</header>

<main>
<!--<div class="grid-container2">-->
<!--    <div class="grid-50">-->
<!--        <div class = "bg-text4">-->
<!---->
<!--            <h1>Everything you need to plan your wedding</h1>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

</main>

<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>

</body>


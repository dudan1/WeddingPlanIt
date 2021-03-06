<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.php");

?>


    <!DOCTYPE html>
<html>
<!-- Acknowledgements of sources can be found in the footer of each page -->
<head>

    <meta charset="UTF-8">
    <title>Service Provider Profile</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <!--<link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">-->

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

    <style>
        .heading{
            position: absolute;
            padding-left: 400px;
            font-family:  "Comic Sans MS", cursive, sans-serif;
            font-size: 20px;
        }
        h2{
            color:darkseagreen;
            font-size: 70px;
            text-align: center;
            margin-top: 275px;
            font-family:  "Comic Sans MS", cursive, sans-serif;
        }
        .row{
            max-width: 1200px;
            margin: auto;
        }
        .logo img{
            width: 200px;
            height:auto;
            float: left;
        }
        .main-nav{
            float: right;
            list-style: none;
            margin-top: 30px;
        }
        .main-nav li{
            display:inline-block;
        }
        .main-nav li a{
            color: darkseagreen;
            text-decoration: none;
            padding: 5px 35px;
            font-family: "Trebuchet MS","Helvetica", "Sans-serif";
            font-size: 20px;
        }
        .main-nav li a:hover{
            border: 1px goldenrod;
        }
        body{
            height: 100vh;
            background-size: cover;
            background-position: center;
        }
        .tb table{
            margin: 0 auto;
        }
        .tb input{
            width: 180px;
        }


    </style>
</head>

<body<!-- style=" background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(assets/images/wed.jpg);"-->>

<header>
    <?php require '/Templates/navbar/navbar_sp.php';?>

</header>

<div class = "bg-text1">

    <h1>Your service provider details</h1>
    <p>Please enter the following details:<!-- for email address (email)-->.</p>

        <form action="PHP_database_insert/contr-reg-script.php" method="post">
        <!--<p>Your email: <input type="email" required name="email"></p>-->
        <p>The name of your business: <input type="text" required name="business_name" maxlength="40" width="200"></p>
        <p>Your personal first name: <input type="text" required name="first_name" maxlength="20"></p>
        <p>Your personal surname: <input type="text" required name="surname" maxlength="20"></p>
        <p>Your personal address: <input type="text" required name="address" maxlength="60"></p>
        <p>Your personal postcode: <input type="text" required name="postcode" maxlength="8"></p>
        The category of your business:
            <select name="category">
                <option value="Beautician">Beautician</option>
                <option value="Caterer">Caterer</option>
                <option value="Jeweller">Jeweller</option>
                <option value="Venue">Venue</option>
                <option value="Flowers">Flowers </option>
                <option value="Photography">Photography </option>
                <option value="Music">Music</option>
                <option value="Decor">Decor</option>
                <option value="Wedding Planners">Wedding Planners</option>
                <option value="Dressers">Dresses</option>
            </select>
            <div class="tb">
                <table>
                    <tr>
                        <td> <label>Price:</label></td>
                        <td><input type="text" required name="price" placeholder="£"></td>
                    </tr>
                </table>
            </div>
            <p>Say something about your business: <textarea required name="description" rows="7" cols="42"> </textarea></p>
            <button type="submit">Submit details</button>

            <button type="button" onclick="location.href='index.php';" class="cancelbtn">Cancel</button>
        </form>

</div>



<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>

</body>


</html>

<?php
session_start();
if($_SESSION['user_type'] != 'Admin'){
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Manage Accounts</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">


</head>

<body>
<header>
    <?php require 'Templates/navbar/navbar_admin.php';?>
</header>
<main>
    <div class="grid-container">
        <div class="grid-50">
            <div id="details" class="details_form" style="margin-top:100px">
                <form  action="PHP_database_insert/admin_suspend_user.php" method="post">
                    <h2>Suspend a User Account</h2>
                    <p>Select a user account below to suspend it.</p>
                    <input type="hidden" id="form_type" name="form_type" value="suspend">
                    <p>Email address: <select name="email">
                            <?php
                            require_once ('PHP_database_insert/db.php');
                            $sql = "SELECT email FROM users WHERE user_type != 'admin' AND isSuspended != 1";
                            $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
                            while($row =mysqli_fetch_array($result)){
                                echo "<option value='{$row['email']}'>{$row['email']}</option>";
                            }
                            ?>
                        </select></p>

                    <button type="submit">Suspend</button>
                </form>
            </div>
        </div>
        <div class="grid-50">
            <div id="details" class="details_form" style="margin-top:100px">
                <form  action="PHP_database_insert/admin_suspend_user.php" method="post">
                    <h2>Reactivate a User Account</h2>
                    <p>Select a user account below to reactivate it.</p>
                    <p>Email address: <select name="email">
                            <?php
                            require_once ('PHP_database_insert/db.php');
                            $sql = "SELECT email FROM users WHERE user_type != 'admin' AND isSuspended = 1";
                            $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
                            while($row =mysqli_fetch_array($result)){
                                echo "<option value='{$row['email']}'>{$row['email']}</option>";
                            }
                            ?>
                        </select></p>
                    <input type="hidden" name ="form_type" value="reactivate">
                    <button type="submit">Reactivate</button>
                </form>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-50">
            <div id="details" class="details_form" style="margin-top:100px">
                <form  action="PHP_database_insert/admin_vetting.php" method="post">
                    <h2>Activate a Service Provider</h2>
                    <p>Select a user account below to add their profile to the public pages.</p>
                    <p>Email address: <select name="email">
                            <?php
                            require_once ('PHP_database_insert/db.php');
                            $sql = "SELECT email FROM service_provider WHERE isVetted != 1";
                            $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
                            while($row =mysqli_fetch_array($result)){
                                echo "<option value='{$row['email']}'>{$row['email']}</option>";
                            }
                            ?>
                        </select></p>
                    <input type="hidden" name = "form_type" value="activate">
                    <button type="submit">Make Public</button>
                </form>
            </div>
        </div>
        <div class="grid-50">
            <div id="details" class="details_form" style="margin-top:100px">
                <form  action="PHP_database_insert/admin_vetting.php" method="post">
                    <h2>Remove a Service Provider</h2>
                    <p>Select a user account below to remove their profile from the public pages.</p>
                    <p>Email address: <select name="email">
                            <?php
                            require_once ('PHP_database_insert/db.php');
                            $sql = "SELECT email FROM service_provider WHERE isVetted = 1";
                            $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
                            while($row =mysqli_fetch_array($result)){
                                echo "<option value='{$row['email']}'>{$row['email']}</option>";
                            }
                            ?>
                        </select></p>
                    <input type="hidden" name = "form_type" value="remove">
                    <button type="submit">Remove from Public</button>
                </form>
            </div>
        </div>
    </div>
</main>

<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>

</body>

</html>


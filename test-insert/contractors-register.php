<?php
session_start();
#if (!IsSet($_SESSION["name"]))
   # header("Location: ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contractors Registration</title>
</head>
<header>
    <h2>Contractors Registration</h2>
</header>
<main>
   <p>Please enter your information in the form below</p>
    <fieldset>
        <legend>Account details</legend>
        <form>
            Email:<input type="email" name="email"><br>
                       Firstname:<input type="text" name="first_name"><br>
            Last name:<input type="text" name="surname"><br>
            Address:<input type="text" name="address"><br>
           Post code: <input type="text" name="postcode"><br>
            Category:<input type="text" name="category"><br>
           Business name: <input type="text" name="business_name"><br>
            <input type="submit" value="Submit"><br>

        </form>

    </fieldset>
<?php
    require_once('test-db.php');

    // Check connection
    if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
    }
    // Attempt to insert into database
    $sql = "INSERT INTO contractor (email, first_name, surname, address, postcode, category, business_name) 
            VALUES ('$_POST[email]','$_POST[first_name]','$_POST[surname]','$_POST[address]','$_POST[postcode]','$_POST[category]','$_POST[business_name]')";

    if (mysqli_query($connection, $sql)){
    #echo "Successfully registred.";
    header('Location:home_test.php');
    } else {

    echo "Error: Could not execute." . mysqli_error($connection);
    }

    mysqli_close($connection);

    ?>


</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Wedding Planit</p>
</footer>
<body>

</body>
</html>
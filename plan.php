<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");
if (($_SESSION["user_type"]) != "Customer")
    header("Location:index.php");


    require_once ('PHP_database_insert/db.php');
    //$sp_id = $_GET['id']; // assign variable for id
    $sql = "SELECT C_ID, first_name, surname, wedding_date, budget FROM customer WHERE '$_SESSION[name]' = email";
    $result =mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $cust_id = $row['C_ID'];
    $cust_fname = $row['first_name'];
    $cust_sname = $row['surname'];
    $wed_date = $row['wedding_date'];
    $budget = $row['budget'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Wedding Plan</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">
</head>

<!--<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">-->
<body>

<header>
    <?php require 'Templates/navbar/navbar_cust.php';?>

</header>

<main>
<div class ="grid-container" style="padding-top: 120px">
    <div class = "grid-25" style="background-color:lightgoldenrodyellow"><h2>Dashboard</h2>
        <?php
            echo "<p>" . $cust_fname . " " . $cust_sname . "</p>";
            echo "<p>" . "Wedding Date: " . $wed_date . "</p>";
            echo "<p>" . "Your budget is £" . "$budget" . "</p>";
            ?>

    </div>
    <div class = "grid-75">
        <h2 style="color:darkseagreen">WEDDING PLAN</h2>
        <hr>
        <?php
echo "<br>";
        // Join Contracts and Service_provider table
        require_once ('PHP_database_insert/db.php');
        $sql2 = "SELECT business_name, category, price 
            FROM bookings c, service_provider s
            WHERE c.SP_ID = s.SP_ID AND c.C_ID = '$cust_id'";
        if ($result2 = mysqli_query($connection, $sql2)) {
            $allexpense = 0;
            if (mysqli_num_rows($result2) > 0) {

                while ($row2 = mysqli_fetch_array($result2)) {

                   /* $sp_price = array($row2['price']);
                    foreach ($sp_price as $expense)  {
                        $allexpense = $expense++;
                    }*/

                    echo "<h3>" . $row2['category'] . "</h3>";
                    echo  "<p>" . $row2['business_name'] . " £" . $row2['price'] . "</p>";
                    $allexpense +=$row2['price'];

            }
            //free result set
                mysqli_free_result($result2);
        }else{
                echo "You have not started building your wedding plan. Look at our Checklist help you through out the process, then Go to your Homepage to select provider(s).";
            }


        }

//calculate budget remainder
      if ($allexpense !=0) {
        $remaider = $budget - $allexpense;
        echo "<br>";
        echo "Total expenditure is £" . $allexpense . " and your remaining budget is £" . $remaider ;
      }
        ?>
        <br>
    </div>
</div>




</main>
<footer class="footer">
    <?php require 'Templates/footer/footer.php';

    ?>
</footer>


</body>
</html>

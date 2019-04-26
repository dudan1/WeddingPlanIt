<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wedding Plan Checklist</title>
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
        <h2 style="color:darkseagreen">WEDDING PLAN CHECKLIST</h2>



        <hr>

<div id="checklist">
    <p>This checklist helps you build your wedding plan. WeddingPlanIt helps you choose and book providers in the following categories:</p>
<?php
require 'PHP_database_insert/db.php';
$sql ="select b.C_ID, b.cancelled, b.SP_ID, s.SP_ID, s.business_name, s.category from bookings b, service_provider s 
where b.C_ID = '$cust_id' AND b.cancelled = '0' AND s.SP_ID = b.SP_ID";
$result = mysqli_query($connection, $sql);
$count=mysqli_num_rows($result);


   echo"<p>Beautician: ";
   while($row = mysqli_fetch_array($result)){
    $business = $row['business_name'];
if($row['category'] =='Beautician' OR $row['category'] == 'beautician' ){
    echo "Booked {$business}";
}
 }
    echo"</p><p>Caterer: ";
$sql ="select b.C_ID, b.cancelled, b.SP_ID, s.SP_ID, s.business_name, s.category from bookings b, service_provider s 
where b.C_ID = '$cust_id' AND b.cancelled = '0' AND s.SP_ID = b.SP_ID";
$result = mysqli_query($connection, $sql);
   while($row = mysqli_fetch_array($result)){
    $business = $row['business_name'];
if($row['category'] =='Caterer' OR $row['category'] == 'caterer')
{ echo "Booked {$business}";
        }
    }

   echo" </p><p>Decor: ";
$sql ="select b.C_ID, b.cancelled, b.SP_ID, s.SP_ID, s.business_name, s.category from bookings b, service_provider s 
where b.C_ID = '$cust_id' AND b.cancelled = '0' AND s.SP_ID = b.SP_ID";
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_array($result)) {
    $business = $row['business_name'];
    if ($row['category'] == 'Decor' OR $row['category'] == 'decor') {
        echo "Booked {$business}";
        }
    }
  echo"  </p><p>Dresses:";
$sql ="select b.C_ID, b.cancelled, b.SP_ID, s.SP_ID, s.business_name, s.category from bookings b, service_provider s 
where b.C_ID = '$cust_id' AND b.cancelled = '0' AND s.SP_ID = b.SP_ID";
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_array($result)) {
    $business = $row['business_name'];
    if($row['category'] == 'Dresses' OR $row['category'] == 'dresses'){
        echo "Booked {$business}";
}
}
  echo" </p><p>Flowers: ";
$sql ="select b.C_ID, b.cancelled, b.SP_ID, s.SP_ID, s.business_name, s.category from bookings b, service_provider s 
where b.C_ID = '$cust_id' AND b.cancelled = '0' AND s.SP_ID = b.SP_ID";
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_array($result)){
    $business = $row['business_name'];
if ($row['category'] == 'Flowers' OR $row['category'] == 'flowers') {
    echo "Booked {$business}";
}
}
   echo"  </p><p>Jeweller: ";
$sql ="select b.C_ID, b.cancelled, b.SP_ID, s.SP_ID, s.business_name, s.category from bookings b, service_provider s 
where b.C_ID = '$cust_id' AND b.cancelled = '0' AND s.SP_ID = b.SP_ID";
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_array($result)){
    $business = $row['business_name'];

if ($row['category'] == 'Jeweller' OR $row['category'] == 'jeweller') {
    echo "Booked {$business}";
}
}
 echo"  </p> <p>Music: ";
$sql ="select b.C_ID, b.cancelled, b.SP_ID, s.SP_ID, s.business_name, s.category from bookings b, service_provider s 
where b.C_ID = '$cust_id' AND b.cancelled = '0' AND s.SP_ID = b.SP_ID";
$result = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_array($result)){
    $business = $row['business_name'];
if ($row['category'] == 'Music' OR $row['category'] == 'music') {
    echo "Booked {$business}";
}
}
  echo"  </p><p>Photography: ";
$sql ="select b.C_ID, b.cancelled, b.SP_ID, s.SP_ID, s.business_name, s.category from bookings b, service_provider s 
where b.C_ID = '$cust_id' AND b.cancelled = '0' AND s.SP_ID = b.SP_ID";
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_array($result)){
    $business = $row['business_name'];
if ($row['category'] == 'Photography' OR $row['category'] == 'photographer') {
    echo "Booked {$business}";
}
}
   echo"</p> <p>Venue: </p>";
$sql ="select b.C_ID, b.cancelled, b.SP_ID, s.SP_ID, s.business_name, s.category from bookings b, service_provider s 
where b.C_ID = '$cust_id' AND b.cancelled = '0' AND s.SP_ID = b.SP_ID";
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_array($result)){
    $business = $row['business_name'];
if ($row['category'] == 'Venue' OR $row['category'] == 'venue') {
    echo "Booked {$business}";
}
}
 echo"  </p> <p>Wedding Planners: ";
$sql ="select b.C_ID, b.cancelled, b.SP_ID, s.SP_ID, s.business_name, s.category from bookings b, service_provider s 
where b.C_ID = '$cust_id' AND b.cancelled = '0' AND s.SP_ID = b.SP_ID";
$result = mysqli_query($connection, $sql);
while($row = mysqli_fetch_array($result)){
    $business = $row['business_name'];
if ($row['category'] == 'Wedding Planner' OR $row['category'] == 'wedding planner') {
    echo "Booked {$business}";
}
}

?>
</div>
    </div>
</div>




</main>
<footer class="footer">
    <?php require 'Templates/footer/footer.php';

    ?>
</footer>

</body>
</html>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User home Wedding PlanIt</title>
    <link rel="stylesheet" href="assets/style.css" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <meta name="viewpoint" content="width=device-width, initial-scale=1" />
</head>
<body>



 <div class="jumbotron" align="center">
<form name="search" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">


  <select name="search" id="search">

      <option value="">Select Service Provider category to search</option>
      <option value="beautician">Beautician</option>
      <option value="caterer">Caterer</option>
      <option value="jeweller">Jeweller</option>
      <option value="venue">Venue</option>
      <option value="flowers">Flowers </option>
      <option value="photography">Photography </option>
      <option value="music">Music</option>
      <option value=" Beauticians">Beauticians</option>
      <option value="decor">Decor</option>
      <option value="weddingplanners">Wedding Planners</option>
      <option value="dressers">Dresses</option>
  </select>
  &nbsp;
  <input type="submit" id="submit" name="submit" value="Search">
</form>
 </div>

 $search_value = $_GET['search'];

<?php
require_once('assets/db.php');

//check connection
if ($db === false) {
    die ("Error: could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * from contractors WHERE category = $search_value']";
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      #  echo "All Contractors";

        //while ($row = mysqli_fetch_array($result)) {
        while($row = $result->fetch_array()){

            echo "<div class='card'>";
            echo "<div class='card-header'>" . $row['business_name'] . "</div>";
            echo "<div class='card-body'>" . $row['category'] . "</div>";
            echo "</div>" . "<br>";
        }

//free result set
        mysqli_free_result($result);
    }
}else{
    echo "No records matching your query were found.";
}

?>

</body>
</html>
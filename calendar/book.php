<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Make booking</title>
</head>

<body>

<?php
	$cust_id = $_SESSION['cust_id'];
	if(empty($errors))
	{
		include '../PHP_database_insert/db.php';

		
		// Check connection
		if (!$connection) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$start_day = intval(strtotime(htmlspecialchars($_POST["start_day"])));
		$end_day = intval(strtotime(htmlspecialchars($_POST["end_day"])));
		$name = htmlspecialchars($_POST["name"]);
		$sp_id = $_SESSION['sp_id'];
		
		$start_epoch = $start_day;
		$end_epoch = $end_day;
		
		// prevent double booking
		$sql = "SELECT * FROM bookings WHERE sp_id= $sp_id AND (start_day=$start_day OR end_day=$start_day) AND cancelled=0";
		$result = mysqli_query($connection, $sql);
		if (mysqli_num_rows($result) > 0) {
			// handle every row
			while($row = mysqli_fetch_assoc($result)) {
				// check overlapping at 10 minutes interval
				for ($i = $start_epoch; $i <= $end_epoch; $i=$i+600) {
					if ($i>($row["start_day"]) && $i<($row["end_day"])) {
						echo '<h3><font color="red">Unfortunately this service provider has already been booked for the time requested.</font></h3>';
						goto end;
					}
				}
			}				
		}
				
		$sql = "INSERT INTO bookings (name, sp_id, c_id, start_day, end_day, cancelled)
			VALUES ('$name', $sp_id, $cust_id, $start_day, $end_day, 0)";
		if (mysqli_query($connection, $sql)) {
		    echo "<h3>Booking succeed.</h3>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connection);
		}
		end:
		mysqli_close($connection);
	}
?>

<a href="indexFormatted.php"><p>Back to the booking calendar</p></a>

</body>

</html>

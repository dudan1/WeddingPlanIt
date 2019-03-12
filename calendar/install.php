<?php
	include 'db.php';
	
	// Create connection

	// Check connection
	if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// sql to create table
	$sql = "CREATE TABLE bookings (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(50) NOT NULL,
		phone VARCHAR(20) NOT NULL,
		SP_ID INT(11) NOT NULL,
		start_day INT(11),
		end_day INT(11),
		start_time INT(11),
		end_time INT(11),
		canceled INT(1)
	)";
	
	if (mysqli_query($connection, $sql)) {
		echo "Table " . $tablename . " created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}
	
	mysqli_close($connection);
?>
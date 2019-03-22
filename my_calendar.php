
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<style>
html *
{
   font-family: Arial !important;
}
table.calendar {
	border-left: 1px solid #999;
}
tr.calendar-row {
}
td.calendar-day {
	min-height: 80px;
	font-size: 11px;
	position: relative;
	vertical-align: top;
}
* html div.calendar-day {
	height: 80px;
}
td.calendar-day:hover {
	background: #eceff5;
}
td.calendar-day-np {
	background: #eee;
	min-height: 80px;
}
* html div.calendar-day-np {
	height: 80px;
}
td.calendar-day-head {
	background: #ccc;
	font-weight: bold;
	text-align: center;
	width: 120px;
	padding: 5px;
	border-bottom: 1px solid #999;
	border-top: 1px solid #999;
	border-right: 1px solid #999;
}
div.day-number {
	background: #999;
	padding: 5px;
	color: #fff;
	font-weight: bold;
	float: right;
	margin: -5px -5px 0 0;
	width: 20px;
	text-align: center;
}
td.calendar-day, td.calendar-day-np {
	width: 120px;
	padding: 5px;
	border-bottom: 1px solid #999;
	border-right: 1px solid #999;
}
</style>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>My Booking Calendar</title>
<link rel="stylesheet" type="text/css" href="CSS/styles.css">
<link rel="stylesheet" type="text/css" href="CSS/homepage.css">
<link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

<link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
<link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">
<link href="calendar/jquery-ui.css" rel="stylesheet">
<script src="calendar/jquery-1.10.2.js"></script>
<script src="calendar/jquery-ui.js"></script>

<!--<script src="lang/datepicker-fi.js"></script>-->
<script>
    $(function() {
	<!--$.datepicker.setDefaults($.datepicker.regional['fi']);-->
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
	  regional: "fi",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });  </script>
</head>
<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">

<header>
    <div class="row">
        <div class="logo">
            <img src="assets/images/logo1.png" alt="wedding band">
        </div>
        <nav>
            <ul class="main-nav">
                <li><a href="sp_home.php">HOME</a></li>
                <li><a href="Old versions/contact_us_zz.php">CONTACT US</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="my_calendar.php">MY CALENDAR</a></li>
                <li><a href="PHP_database_insert/logout.php">LOG OUT</a></li>
            </ul>
        </nav>
    </div>
</header>
<br><br><br><br><br><br><br><br>
<div class="bg-text2">
<h1>My Booking Calendar</h1>

    <?php
    session_start();
    if (!IsSet($_SESSION["name"]))
        header("Location:../index.html");
    /* draws a calendar */
    function draw_calendar($month,$year){

        $servername = "CSDM-WEBDEV";
        $username = "1809591";
        $password = "1809591";
        $dbname = "db1809591_cmm007";

        $headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
        // Create connection
        $connection = mysqli_connect($servername, $username, $password, $dbname);


        $sql = "Select SP_ID FROM service_provider WHERE email = '$_SESSION[name]'";
        $result =mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count =mysqli_num_rows($result);

        if($count == 1) {
            $sp_id = $row['SP_ID'];
            $_SESSION['sp_id'] = $sp_id;
        }
        else{
            echo'No user id found';
        }

        // Check connection
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        /* draw table */
        $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

        /* table headings */
        $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

        /* days and weeks vars now ... */
        $running_day = date('w',mktime(0,0,0,$month,1,$year));
        $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
        $days_in_this_week = 1;
        $day_counter = 0;
        $dates_array = array();

        /* row for week one */
        $calendar.= '<tr class="calendar-row">';

        /* print "blank" days until the first of the current week */
        for($x = 0; $x < $running_day; $x++):
            $calendar.= '<td class="calendar-day-np"> </td>';
            $days_in_this_week++;
        endfor;

        /* keep going with days.... */
        for($list_day = 1; $list_day <= $days_in_month; $list_day++):
            $calendar.= '<td class="calendar-day">';
            /* add in the day number */
            $calendar.= '<div class="day-number">'.$list_day.'</div>';

            /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
            $calendar.= str_repeat('<p> </p>',2);
            $current_epoch = mktime(0,0,0,$month,$list_day,$year);

            $sql = "SELECT * FROM bookings WHERE SP_ID = $sp_id  AND $current_epoch BETWEEN start_day AND end_day";

            $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    if($row["cancelled"] == 1) $calendar .= "<font color=\"grey\"><s>";
                    $calendar .= "BOOKED"."<b>" . "</b><br>Booking ID: " . $row["id"] . "<br>" . $row["name"] . "<br>"  . "<br>";
                    if($row["cancelled"] == 1) $calendar .= "</s></font>";
                }
            } else {
                $calendar .= "No bookings";
            }

            $calendar.= '</td>';
            if($running_day == 6):
                $calendar.= '</tr>';
                if(($day_counter+1) != $days_in_month):
                    $calendar.= '<tr class="calendar-row">';
                endif;
                $running_day = -1;
                $days_in_this_week = 0;
            endif;
            $days_in_this_week++; $running_day++; $day_counter++;
        endfor;

        /* finish the rest of the days in the week */
        if($days_in_this_week < 8):
            for($x = 1; $x <= (8 - $days_in_this_week); $x++):
                $calendar.= '<td class="calendar-day-np"> </td>';
            endfor;
        endif;

        /* final row */
        $calendar.= '</tr>';

        /* end the table */
        $calendar.= '</table>';

        mysqli_close($connection);

        /* all done, return result */
        return $calendar;
    }

    include 'calendar/config.php';

    $d = new DateTime(date("Y-m-d"));
    echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
    echo draw_calendar($d->format('m'),$d->format('Y'));

    $d->modify( 'first day of next month' );
    echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
    echo draw_calendar($d->format('m'),$d->format('Y'));

    $d->modify( 'first day of next month' );
    echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
    echo draw_calendar($d->format('m'),$d->format('Y'));

    ?>

</div>
</body>

</html>


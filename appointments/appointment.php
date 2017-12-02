<html>
<body>
<head>
<link href="calendar.css" type="text/css" rel="stylesheet" />
</head>
<style> 
	body {
		background-color:rgb(21, 118, 221);
		color: white;
		text-align:center;
	}
</style>
<?php
//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);
include "calendar.php";
$calendar = new Calendar();
echo "Select the day to set an appointment.<br><br><br>";
echo $calendar->show();
?>
</body>
</html>




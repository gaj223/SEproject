<html>
<body>
<?php
$password = "cs3773";
$database = "EMIS";
//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);

// Connect to server
$mysqli = new mysqli("localhost", "root", $password, $database);
if(!$mysqli) {
	die('Could not connect: ' . mysql_error());
}

// Close mysqli connection
mysqli_close($mysqli);

?>


<form action="timesavailable.php" method="post">
Select a date:<br>
<input type="date" name="appdate" min="<?php echo date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 14, date('Y')));?>"
</select><br>
<input type="submit" value="Submit">
</form>
</body>
</html>


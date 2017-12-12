<html>
<body>
<?php
$password = "cs3773";

//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);

// Connect to mysql
$mysqli = new mysqli("localhost", "root", $password, "emis_general");
if(!$mysqli) {
	die('Could not connect: ' . mysql_error());
}

// Start session to retrieve date
if (!session_start()) {
	die('Could not start session.');
}

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$apptime = $_POST["time"];
$date = $_SESSION['date'];

// Creates app (appointment) table
$sql = "CREATE TABLE app (lastname VARCHAR(100), firstname VARCHAR(100), time VARCHAR(10), date VARCHAR(20));";
$rs = mysqli_query($mysqli, $sql);

/*if (!$rs) {
	die('Could not create table: ' . mysqli_error($mysqli));
}*/


// Check database for time and date to see schedule conflict
$sql = "SELECT COUNT(1) FROM app WHERE time='{$apptime}' AND date='{$date}';";
$rs = mysqli_query($mysqli, $sql);
if (!$rs) {
	die("Could not query: " . mysqli_error($mysqli));
}
$data = mysqli_fetch_array($rs, MYSQLI_NUM);

// Check if patient already has appointment
$sql = "SELECT COUNT(1) FROM app WHERE lastname='{$lastname}'";
$rs = mysqli_query($mysqli, $sql);
if (!$rs) {
	die("Could not query: " . mysqli_error($mysqli));
}
$dataname = mysqli_fetch_array($rs, MYSQLI_NUM);

// If no conflicts, set appointment
if ($dataname[0] != 0) {
	printf("This person already has an appointment.\n");
} else if ($data[0] != 0) {
	printf("%s is already taken. Try again.\n", $apptime);
} else {
	printf("Appointment set for %s, on  %s at %s\n", $firstname . " " . $lastname, $date, $apptime);
	$sql = "INSERT INTO app VALUES ('{$lastname}', '{$firstname}', '{$apptime}', '{$date}');";
	$rs = mysqli_query($mysqli, $sql);
	if (!$rs) {
		die('Could not insert items: ' . mysqli_error($mysqli));
	}
}


mysqli_close($mysqli);
?>
</body>
</html>


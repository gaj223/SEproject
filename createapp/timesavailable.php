<html>
<body>
<?php
$password = "cs3773";
$database = "emis_general";
//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);

// Connect to server
$mysqli = new mysqli("localhost", "root", $password, $database);
if(!$mysqli) {
	die('Could not connect: ' . mysql_error());
}

// Create app table (lastname, firstname, time, date)
$sql = "CREATE TABLE app (lastname VARCHAR(100), firstname VARCHAR(100), time VARCHAR(10), date VARCHAR(20));";
$rs = mysqli_query($mysqli, $sql);
if (!rs) {
	die("Could not query: " . mysqli_error($mysqli));
}

// Retrieve the date
$date = $_POST["appdate"];
if (!$date) {
	die("You did not enter a date. Please try again.");
}
echo $date . "<br>";
// Default content
$content = 'No available times found. Try another date.';

// Available appointment times
$times = array("9:00 A.M.", "10:00 A.M.", "11:00 A.M.", "12:00 P.M.", "1:00 P.M.", "2:00 P.M.", "3:00 P.M.", "4:00 P.M.");

// Check database for existing appointment
for ($i = 0; $i < count($times); $i++) {

	// Parse database for certain time
	$sql = "SELECT COUNT(1) FROM app WHERE time='{$times[$i]}' AND date='{$date}';";
        $rs = mysqli_query($mysqli, $sql);
        if (!$rs) {
                die("Could not query: " . mysqli_error($mysqli));
        }
	
	// Convert to array
        $data = mysqli_fetch_array($rs, MYSQLI_NUM);

	// Add time to available times if nothing found
        if ($data[0] == 0) {
		if (!strcmp($content, 'No available times found. Try another date.')) {
			$content = "These are the available times: <br>";
		}
		$content.=$times[$i];
        }
}

// Display available times
echo $content;

// Start session so we can retrieve the date on the next page
if (!session_start()) {
	die("Could not start session.");
}
$_SESSION['date'] = $date;

// Close mysqli connection
mysqli_close($mysqli);


?>

<form action="action_page.php" method="post">
Set up an appointment<br>
email: <input name="email" type="text">
Desired Time: <select name="time">
        <option value="9:00 A.M.">9:00 A.M.</option>
        <option value="10:00 A.M.">10:00 A.M.</option>
        <option value="11:00 A.M.">11:00 A.M.</option>
        <option value="12:00 P.M.">12:00 P.M.</option>
        <option value="1:00 P.M.">1:00 P.M.</option>
        <option value="2:00 P.M.">2:00 P.M</option>
        <option value="3:00 P.M.">3:00 P.M.</option>
        <option value="4:00 P.M.">4:00 P.M.</option>
</select>
<input type="submit" value="Submit">
<br>
<a href="man.php">No email?</a>
</form>
</body>
</html>


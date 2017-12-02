<html>
<body>
<form action="/delete_db.php">
	<fieldset>
		<legend> WARNING!!! WARNING!!! </legend>
		<input type="submit" value="DELETE. EVERYTHING.">
	</fieldset>
</form>
<?php
$password = "cs3773";

//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);

// Connect to server
$mysqli = new mysqli("localhost", "root", $password, "emis_general");
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
$date = $_GET["date"];

// Default content
$content = 'No appointments found :(';

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
		if (!strcmp($content, 'No appointments found :(')) {
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
First Name: <input name="firstname" type="text">
Last Name: <input name="lastname" type="text"><br>
Desired Time: <select name="time">
        <option value="9:00 A.M.">9:00 A.M.</option>
        <option value="10:00 A.M.">10:00 A.M.</option>
        <option value="11:00 A.M.">11:00 A.M.</option>
        <option value="12:00 P.M.">12:00 P.M.</option>
        <option value="1:00 P.M.">1:00 P.M.</option>
        <option value="2:00 P.M.">2:00 P.M</option>
        <option value="3:00 P.M.">3:00 P.M.</option>
        <option value="4:00 P.M.">4:00 P.M.</option>
</select><br>
<input type="submit">
</form>
</body>
</html>


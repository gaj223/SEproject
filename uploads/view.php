<html>
<body>
<?php

if (!isset($_GET["patientid"])) {
	echo '<form action="view.php" method="post">' .
	'Enter patient email or SSN: <input type="text" name="id">' .
	'<input type="submit" value="Find Documents" name="submit"><br>'.
	'</form>'.
	'<form action="../main/LoginEmployee.php" method="post">'.
	'<input type="submit" value="Home" name="home">'.
	'</form>';

}else{
	echo '<form action="../jamesfiles/searchresults.php" method="post">' .
	'<input type="submit" value="Back" name="back"> </form>';
	$patientid = $_GET["patientid"];
}


if (isset($_POST["submit"])) {
	$patientid = $_POST["id"];
} else if (!isset($_GET["patientid"])) {
	exit();
}
$con = mysqli_connect("localhost", "root", "cs3773", "EMIS");
if(!$con) {
	die("Failed to connect to database.");
}
//$patientid = $_POST['id'];
$sql = "SELECT * FROM PatientLogin WHERE PatientID='{$patientid}'";
$q = mysqli_query($con, $sql);
$a = mysqli_fetch_array($q);
$email = $a['Email'];
$sql = "SELECT * FROM PatientPersonalInfo WHERE Email='{$email}'";
$q = mysqli_query($con, $sql);
$a = mysqli_fetch_array($q);
$ssn = $a["ssn"];
$sql = "SELECT * FROM tbl_uploads WHERE PatientID='{$email}' OR PatientID='{$ssn}'";
$q = mysqli_query($con, $sql);
while ($a = mysqli_fetch_array($q)) {
	$file = $a['file'];
	echo "<a href=".$file.">".$file."</a><br>";
}
?>
</body>
</html>

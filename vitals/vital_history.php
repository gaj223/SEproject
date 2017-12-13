<html>
<body>
<a href="../jamesfiles/searchresults.php">Home</a><br>
<?php
$patientid = $_GET['patientid'];

$con = mysqli_connect("localhost", "root", "cs3773", "EMIS");
$sql = "SELECT * FROM PatientPersonalInfo WHERE PatientID='{$patientid}'";
$q = mysqli_query($con, $sql);
$a = mysqli_fetch_array($q);
$email = $a['Email'];
$ssn = $a['ssn'];
$sql = "SELECT * FROM PatientVitals WHERE id='{$email}' OR id='{$ssn}'";
$q = mysqli_query($con, $sql);
echo "<table style='width:100%'>"
	. "<tr><th>Date</th><th>Blood Pressure</th><th>Body Temp</th><th>Heart Rate</th></tr><br>";
while ($a = mysqli_fetch_array($q)) {
	echo "<td>" . $a['date'] . "</td><td>" . $a['bp'] . "</td><td>" . $a['temp'] . "</td><td>" . $a['hr'] . "</td>";
}
echo "</tr></table>";
?>

</body>
</html>

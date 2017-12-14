<html>
<body>
<?php

$user = $_POST["user"];
$password = $_POST["password"];
$host = $_POST["host"];

$con = mysqli_connect($host, $user, $password);

// Create EMIS database
$q = mysqli_query($con, "CREATE DATABASE EMIS;");
if (!q) {
	die("Failed to create database");
}

mysqli_select_db($con, "EMIS");
// Create Appointments table
$q = mysqli_query($con, "CREATE TABLE Appointments(doctor_email varchar(50), date varchar(35), time varchar(50), PatientID varchar(50))");
if (!q) {
	die("Failed to create Appointments table");
}
// Create EmployeeLogin table
$q = mysqli_query($con, "CREATE TABLE EmployeeLogin(EmployeeID int(11) AUTO_INCREMENT PRIMARY KEY, Email char(255), Password char(50), LastName char(50), FirstName char(50), DateOfBirth date, SecurityQuest1 char(250), SecurityAns1 char(250), SecurityQuest2 char(250), SecurityAns2 char(250), Position char(50), Locked char(3), attempts int(2), permission int(1))");
if (!q) {
	die("Failed to create EmployeeLogin table");
}
// Create PatientInsuranceInfo table
$q = mysqli_query($con, "CREATE TABLE PatientInsuranceInfo(MemberID varchar(15), GroupID int(6), Company char(50), Email varchar(255))");
if (!$q) {
	die("Failed to create PatientInsuranceInfo table");
}
// Create PatientLogin table
$q = mysqli_query($con, "CREATE TABLE PatientLogin(PatientID int(11) AUTO_INCREMENT PRIMARY KEY, Email varchar(255), PassWord varchar(255), SecurityQues1 char(255), SecurityAns1 char(255), SecurityQuest2 char(255), SecurityAns2 char(255), Locked char(3), attempts int(2))");
if (!$q) {
	die("Failed to create PatientLogin table");
}
// Create PatientPersonalInfo table
$q = mysqli_query($con, "CREATE TABLE PatientPersonalInfo(PatientID int(11) AUTO_INCREMENT PRIMARY KEY, firstname char(50), lastname char(50), dob date, address char(255), Email varchar(255), phone char(12), ssn char(11), gender char(6), ecname char(50), ecphone char(12), ecrelation char(20), mstatus char(10));");
if (!$q) {
	die("Failed to create PatientPersonalInfo table");
}
// Create PatientVitals table
$q = mysqli_query($con, "CREATE TABLE PatientVitals(id varchar(50), date varchar(50), bp varchar(50), temp varchar(50), hr varchar(50));");
if (!$q) {
	die("Failed to create PatientVitals table");
}
// Create ms table
$q = mysqli_query($con, "CREATE TABLE ms(id int(11) AUTO_INCREMENT PRIMARY KEY, message varchar(255), send_to varchar(255), sent_from varchar(255), date char(35))");
if (!$q) {
	die("Failed to create ms table");
}
// create tbl_uploads table
$q = mysqli_query($con, "CREATE TABLE tbl_uploads(id int(10) AUTO_INCREMENT PRIMARY KEY, file varchar(100), type varchar(10), size int(11), PatientID varchar(50));");
if (!$q) {
	die("Failed to create tbl_uploads table");
}

// insert admin
$q = mysqli_query($con, "INSERT INTO EmployeeLogin(Email, Password, Locked, attempts, permission) VALUES ('admin', 'admin', 'no', 0, 9);");
if (!$q) {
	die("Failed to insert admin.");
}
exit("Install successful. For file upload to function properly, see README.txt");
?>
</body>
</html>

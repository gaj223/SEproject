<html>
<body>
<?php
$target_dir = "~/uploads/";
$target_file = $target_dir . basename($_FILES["filename"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST["submit"])) {
	if ($_FILES['file']) {
		echo 'upload successful<br>';
	} else {
		die("Upload failed: " . $_FILES['file']['error']);
	}
	$con = mysqli_connect("localhost", "root", "cs3773", "EMIS");
	if (!$con) {
		die("Couldn't connect to database");
	}

	$user = $_POST['id'];
	$file = $_POST['lastname'] . $_POST['firstname'] . $_POST['social']
		. "-" . $_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="/var/www/html/SEproject/uploads/";
	echo $file;
	
	if(move_uploaded_file($file_loc, $folder.$file) == false) {
		exit("<br>error moving file<br>");
	}
	$sql = "INSERT INTO tbl_uploads(file, type, size, PatientID) VALUES ('{$file}', '{$file_type}', '{$file_size}', '{$user}')";
	$q = mysqli_query($con, $sql);
	if (!$q) {
		exit("Failed to upload file: " . mysqli_error($con));
	}
}
?>
<form action="../main/LoginEmployee.php" method="post">
<input type="submit" value="Home" name="home">
</form>
</body>
</html>

<html>
<body>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
	Patient Email or SSN:
	<input type="text" name="id" id="id"><br>
	Patient Firstname:
	<input type="text" name="firstname" id="firstname"><br>
	Patient Lastname:
	<input type="text" name="lastname" id="lastname"><br>
	Last 4 of Social:
	<input type="text" name="social" id="social"><br>
	Select file to upload:
	<input type="file" name="file" id="file">
	<input type="submit" value="Upload File" name="submit"><br>
</form>
<form action="../main/LoginEmployee.php" method="post">
<input type="submit" value="Home" name="home">
</form>

<?php
/*$target_dir = "~/uploads/";
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
	$file = $_POST['lastname'] . $_POST['firstname'] . $_POST['social']
		. "-" . $_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	echo $file;
	move_uploaded_file($file_loc, $folder.$file);
	$sql = "INSERT INTO tbl_uploads(file, type, size) VALUES ('{$file}', '{$file_type}', '{$file_size}')";
	$q = mysqli_query($con, $sql);
	if (!$q) {
		exit("Failed to upload file: " . mysqli_error($con));
	}
}*/
?>

</body>
</html>

<html>
<body>
<form style="text-align:center;" action="install.php" method="POST">
Please read README.txt before installation.<br>
MySQL Username: <input type="text" name="user" id="user"><br>
Password:	<input type="text" name="password" id="password"><br>
Host:		<input type="text" name="host" id="host"><br>
</form>
<?php
$user = $_POST["user"];
$password = $_POST["password"];
$host = $_POST["host"];

$con = mysqli_connect($host, $user, $password);



?>
</body>
</html>

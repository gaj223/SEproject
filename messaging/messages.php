<html>
<body>
<h1>Messages</h1>
<table>
<tbody>
<?php
$con = mysqli_connect('localhost', 'root', 'cs3773', 'EMIS');
session_start();
$user = $_SESSION['user'];
echo $user . ':<br>';
echo '<tr><td>From<hr></td></td><td></td><td>Message<hr></td></tr>';
$q = mysqli_query($con, "SELECT * FROM ms WHERE send_to='{$user}'");
if (mysqli_num_rows($q) > 0) {
	while($row = mysqli_fetch_array($q)) {
		echo '<tr><td>' . $row["sent_from"] . '<hr></td><td>' . $row["date"] . '</td><td><br><br>' . $row["message"].'<hr></td></tr>';
	}
}
?>
<a href="../main/Login<?php echo $_SESSION['emp'] ?>.php">Home</a>
</tbody>
</table>
</body>
</html>

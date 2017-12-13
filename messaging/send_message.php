<html>
<body>
<h1>Send Message</h1>
<form action='send_message.php' method='POST'>
<table>
<tbody>
<tr>
	<td>From: </td><td><?php session_start(); echo $_SESSION['user']; ?></td>
</tr>
<tr>
	<td>To: </td><td><input type='text' name='send_to' /></td>
</tr>
<tr>
	<td>Message: </td><td><input type='text' name='message' /></td>
</tr>
<tr>
	<td></td><td><input type='submit' value='Send Message' name='sendMessage' /></td>
</tr>
</tbody>
</table>
</form>

<?php
session_start();
$user = $_SESSION['user'];
$con = mysqli_connect('localhost', 'root', 'cs3773', 'EMIS');
if (isSet($_POST['sendMessage'])) {
	if (isSet($_POST['send_to']) && $_POST['send_to'] != '' && isSet($_POST['message']) && $_POST['message'] != '') {
		$to = $_POST['send_to'];
		$message = $_POST['message'];
		$date = date('D, m/d/Y h:i e');
		$sql = "INSERT INTO ms(message, send_to, sent_from, date) VALUES ('{$message}', '{$to}', '{$user}', '{$date}')";
		$q = mysqli_query($con, $sql) or die(mysqli_error($con));
		if ($q) {
			echo 'Message sent.';
		} else {
			echo 'Failed to send message.';
		}
	}
}
?>
<a href="../main/Login<?php echo $_SESSION['emp']?>.php">Home</a>
</body>
</html>

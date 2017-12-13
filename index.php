<!DOCTYPE html>
<!--
    Creates the Login Page
-->
<?php
    session_start();
    header('Cache-Control: max-age=900');
    if (isset($_GET['logout']) || isset($_SESSION['user']) || isset($_SESSION['passwd'])){
        session_unset();
        session_destroy();
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EMIS Login</title>
        <style>
        	header {
            		font-family:helvetica;
                	font-size: 20px;
                	padding: 20px;
                	text-align:center;
            	}
		footer {
            		font-family:helvetica;
                	font-size: 15px;
                	padding: 20px;
                	text-align:center;
		}
           	body {
                	font-family:helvetica;
                	font-size: 15px;
                	text-align: center;
                	background-color:rgb(21, 118, 221);
                	color:white;
                	background-image:url("http://www.clker.com/cliparts/0/4/C/O/g/t/doctor-and-patient-blue.svg.med.png");
                	background-position: right bottom;
                	background-repeat:no-repeat;
                	background-attachment:fixed;
            }

            {
        </style>
    </head>
    <header>
        <p style="text-align:center;">
        	<img src="emis-logo.jpg" width="250" height="150">
        </p>

        <p>
            Welcome to EMIS, your medical home on the Web.
            With EMIS, you can connect with your <br>doctor through a convenient, safe, and secure environment. 
        </p>
    </header>

    <body>
        <br>
        <p>Patient Login</p>
        <form action="main/Login.php" method="POST">
            <div><label for="user">Username:
                    <input type="text" name="user" id="user"></label>
            </div>
            <br>
            <div><label for="passwrd">Password:
                    <input type="password" name="passwrd" id="passwrd"></label>
            </div>
            <div><input type="submit" value="LOG IN"></div>
        </form>
        	<br>
           <p> Employee Login </p>
        <form action="main/LoginEmployee.php" method="POST">
            <div><label for="user2">Username: 
                    <input type="text" name="user2" id="user"></label>
            </div>
            <br>
            <div><label for="passwrd2">Password:
                    <input type="password" name="passwrd2" id="passwrd"></label>
            </div>
            <div><input type="submit" value="LOG IN"></div>
        </form>
	</body>

    <footer>
            <p>
            <a href="main/Username.php"> Forgot Username?</a>
			|
            <a href="main/Password.php"> Forgot Password?</a>
        </p>
    </footer>
</html>

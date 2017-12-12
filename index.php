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
        <title></title>
        <style>
            body {
                background-color:rgb(21, 118, 221);
                color:white;
                background-image:url("http://www.clker.com/cliparts/0/4/C/O/g/t/doctor-and-patient-blue.svg.med.png");
                background-position: right bottom;
                background-repeat:no-repeat;
                background-attachment:fixed;
            }

        </style>

    </head>
    <body>
        <h1 style="font-size:70px;"> 
            <img src="Symbol.png" width="60" height="60">
            EMIS <hr>
        </h1>
        <p> Welcome to EMIS, your medical home on the Web.
            With EMIS, you can connect with your doctor through a convenient, safe, and secure environment. 
        </p>
        <br>
        <br>
        <p style="text-align:center;"> Patient Login </p>
        <form style="text-align:center;" action="main/Login.php" method="POST">
            <div><label for="user">Username: 
                    <input type="text" name="user" id="user"></label>
            </div>
            <div><label for="passwrd">Password:
                    <input type="password" name="passwrd" id="passwrd"></label>
            </div>
            <div><input type="submit" value="LOG IN"></div>
        </form>

        <p style="text-align:center;"> Employee Login </p>
        <form style="text-align:center;" action="main/LoginEmployee.php" method="POST">
            <div><label for="user2">Username: 
                    <input type="text" name="user2" id="user"></label>
            </div>
            <div><label for="passwrd2">Password:
                    <input type="password" name="passwrd2" id="passwrd"></label>
            </div>
            <div><input type="submit" value="LOG IN"></div>
        </form>
        <p style="text-align:center;">
            <a href="main/Username.php"> Forgot Username?</a>
            <br>
            <a href="main/Password.php"> Forgot Password?</a>
        </p>
    </body>
</html>

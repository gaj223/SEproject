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
        		div.container {
    				width: 100%;
				}
                header {
                        font-family:helvetica;
                        font-size: 20px;
                        text-align:center;
                }
                footer {
                        font-family:helvetica;
                        font-size: 15px;
                        padding: 20px;
                        text-align:center;
                }
                article {
                        font-family:helvetica;
                        font-size: 15px;
                        text-align: left;
                        margin-left: 350px;
                }
                body {
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

    
    <body>
    <div class="container">
    <header>
        <p style="text-align:center;">
        <a href="../index.php">
        	<img src="../emis-logo.jpg" width="250" height="150">
        </a><br>
        	Please Enter the Following Information to Locate Account
        </p>

    </header>
	<article>
        
        <form action="CheckInfoUser.php" method="POST">
            <input type="radio" name="role" value="Patient" checked> Patient<br>
            <input type="radio" name="role" value="Employee"> Employee<br>
            <div><label for="first">First Name: 
            <input type="text" name="first" id="first"></label>
            </div><br>
            <div><label for="last">Last Name:
            <input type="text" name="last" id="last"></label>
            </div><br>
            <div><label for="ssn">Social Security Number:
            <input type="number" name="ssn" id="ssn"></label>
            </div><br>
            <div><input type="submit" value="Submit"></div>
        </form>
    </article>
    <footer>
            <p>
        </p>
    </footer>
    </div>
    </body>
</html>

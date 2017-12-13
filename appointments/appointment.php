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
        <title>EMIS</title>
        <style>
               	div.container {
						width: 100%;
        		}
                h1, h2 {
                		text-align: center;
                }header {
                        background-color:rgb(21, 118, 221);
                        font-family:helvetica;
                        font-size: 20px;
                        text-align:center;
                }
                footer {
                        background-color:rgb(21, 118, 221);
                        font-family:helvetica;
                        font-size: 15px;
                        padding: 20px;
                        text-align:center;
                }
                article {

                        font-family:helvetica;
                        font-size: 15px;
                        text-align: center;
                        margin-left: 30px;

				}
                nav {
                	background-color:rgb(21, 118, 221);
                    text-align: center;
                }
				a:link{
                	color: white;
                }
                a:hover{
                	color: black;
                }
                body {
                	background-color:rgb(21, 118, 221);
                    color: white;
                }
        </style>
    </head>

    
    <body>
    <div class="container">
    <header>
        <p style="text-align:right; font-size: 11px;">
        	<a href="Logout.php";>
        		Logout
        	</a>
        </p>
        <p style="text-align:center;">
        <a href='../<?php session_start(); if (! $_SESSION["emp"]) { echo "main/Login.php"; } else { echo "jamesfiles/searchresults.php"; }?>'>
                <img src="../emis-logo.jpg" width="250" height="150">
        </a>

    </header>
    <nav>
           	<a href="../personal/PersonalInfo.php?patientid=<?php echo $pass['patientid']; ?>"> Personal Information</a> |
            <a href="../insurance/InsuranceInfo.php"> Insurance Information</a> |
            <a href="../appointments/appointment.php"> Appointments</a> |
            <a href="../messaging/send_message.php">Send Message</a> |
            <a href="../messaging/messages.php">My Messages</a>
    </nav>
    <article>
        <h1> Appointments </h2>
<?php
        if (! $_SESSION['emp']) {
                echo "Looks like you don't have an appointment. Give us a call to set up an appointment!";
        }
?>

    </article>
    <footer>
        <p>
        <a href="../main/Login.php"> Home </a>
        </p>
    </footer>
    </div>
    </body>
</html>

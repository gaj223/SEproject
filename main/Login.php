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
        	<a href="logout.php";>
        		Logout
        	</a>
        </p>
        <p style="text-align:center;">
        <a href="../index.php">
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
                <?php 
            header('Cache-Control: max-age=900');
            include '../include/db.emis';
            // Check to see if username and password is correct
            $user = htmlentities($_POST["user"]);
            $passwrd =  htmlentities($_POST["passwrd"]);
            session_start();
            
            if (!$user || !$passwrd) {
                $user = $_SESSION["user"];
                $passwrd = $_SESSION["passwd"];
                if (!$user || !$passwrd) {
                    echo "<h1 style='font-size:70px;textalign:left;'>"
                    . "<img src='../Symbol.png' width='60' height='60'>"
                    . "EMIS <hr> </h1>";
                    echo "<p>The Username and/or Password entered was incorrect. Please check and try again. <br>"
                    . "<a href='Username.php'>Forgot Username?</a><br>"
                    . "<a href='Password.php'>Forgot Password?</a><br></p>";
                    echo "<p style=text-align:right;> <br><a href='../index.php'> Home </a><br>";
                    exit();
                }
            } else {
            $_SESSION["emp"] = '';
            $_SESSION["user"] = $user;
            $_SESSION["passwd"] = $passwrd;
            // check if user is in the database
            /*$patientUsr = mysqli_query($con, "SELECT Email FROM PatientLogin WHERE Email='" . $user . "'");
            if (mysqli_num_rows($patientUsr) < 1) {
                                    echo "<h1 style='font-size:70px;textalign:left;'>"
                    . "<img src='../Symbol.png' width='60' height='60'>"
                    . "EMIS <hr> </h1>";
                    echo "<p>The Username and/or Password entered was incorrect. Please check and try again. <br>"
                    . "<a href='Username.php'>Forgot Username?</a><br>"
                    . "<a href='Password.php'>Forgot Password?</a><br></p>";
                    echo "<p style=text-align:right;> <br><a href='../index.php'> Home </a><br>";

            }
            
            $pass = $patientUsr->fetch_assoc();
            //echo $row['PatientID'];
            */
            // Check if password is correct
            $patientPW = mysqli_query($con, "SELECT PassWord FROM PatientLogin WHERE Email='" . $user . "' AND PassWord='" . $passwrd . "'");
            $row = mysqli_fetch_array($patientPW);
            if ($passwrd != $row[0]) {
                    echo "<h1 style='font-size:70px;textalign:left;'>"
                    . "<img src='../Symbol.png' width='60' height='60'>"
                    . "EMIS <hr> </h1>";
                    echo "<p>The Username and/or Password entered was incorrect. Please check and try again. <br>"
                    . "<a href='Username.php'>Forgot Username?</a><br>"
                    . "<a href='Password.php'>Forgot Password?</a><br></p>";
                    echo "<p style=text-align:right;> <br><a href='../index.php'> Home </a><br>";
                    exit();
            }
  
            // Get Patient's Name
            $patientNm = mysqli_query($con, "SELECT FirstName FROM PatientPersonalInfo WHERE Email='" . $user . "'");
            $row = mysqli_fetch_row($patientNm);
            echo '<h1><br>Welcome to EMIS, '. $row[0]."</h1><br/>";

            
            // Free mysql query
            mysqli_free_result($patientPW);
            mysqli_free_result($patientUsr);
            mysqli_free_result($patientNm);
            }
        ?>
    </article>
    <footer>
        <p>
        <a href="../index.php"> Home </a>
        </p>
    </footer>
    </div>
    </body>
</html>

<!DOCTYPE html>
<!--
    Prompt user to enter login information
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page Title</title>
        <style>
            body {
                background-color:rgb(21, 118, 221);
                color:white;
                background-image:url("http://www.clker.com/cliparts/0/4/C/O/g/t/doctor-and-patient-blue.svg.med.png");
                background-position: right bottom;
                background-repeat:no-repeat;
                background-attachment:fixed;
                font-size:60px;
                text-align:center;
            }
	    p {
		font-size:30px;
		text-align:left;
	    }
            
        </style>
    </head>
    <body>
        
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
            echo 'Welcome to EMIS, '. $row[0]."<br/>";
            
            // Free mysql query
            mysqli_free_result($patientPW);
            mysqli_free_result($patientUsr);
            mysqli_free_result($patientNm);
            }
        ?>
	<h1 style="font-size:20px;text-align:right;">
	<a href="Logout.php"> Logout</a>
	</h1>
        <p style="font-size:30px;text-align:left;">
            Menu: <br>
            <a href="../personal/PersonalInfo.php?patientid=<?php echo $pass['patientid']; ?>"> Personal Information</a> <br>
            <a href="../insurance/InsuranceInfo.php"> Insurance Information</a> <br>
            <a href="../appointments/appointment.php"> Appointments</a> <br>
	    <a href="../messaging/send_message.php">Send Message</a><br>
	    <a href="../messaging/messages.php">My Messages</a><br>
	
        </p>
        
    </body>
</html>

<!DOCTYPE html>
<!--
Validates the employee and create the Welcome page for the employee
-->
<?php
    session_start()
?>
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
            //include 'include/db.emis';
            // Connect to SQL
            $host = "localhost";
            $user = "root";
            $password = "cs3773";
            $database = "EMIS";
            $con = mysqli_connect($host, $user, $password, $database);
            
            if (!$con) {
                exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
            }
            
            //set the default client character set
            mysqli_set_charset($con, 'utf-8');
	    session_start();
	    //if (! isset($_SESSION['login'])) {
	//	$_SESSION['login'] = 1;

            	// Check to see if username and password is correct
            	$user = htmlentities($_POST["user2"]);
            	$passwrd =  htmlentities($_POST["passwrd2"]);
                $_SESSION['user'] = $user;
		if (!$user || !$passwrd) {
			echo "<h1 style='font-size:70px;textalign:left;'>"
			. "<img src='../Symbol.png' width='60' height='60'>"
			. "EMIS <hr> </h1>";
			echo "<p>The Username and/or Password entered was incorrect. Please check and try again. <br>"
			. "<a href='Username.php'> Forgot Username?</a><br>"
			. "<a href='Password.php'> Forgot Password?</a><br></p>";
			echo "<p style = text-align:right;> <br><a href='../index.php'> Home </a><br>";
			exit();
		}
            	// check if user is in the database
            	$employeeUsr = mysqli_query($con, "SELECT FirstName FROM EmployeeLogin WHERE Email='" . $user . "'");
            	if (mysqli_num_rows($employeeUsr) < 1) {
                	echo "<h1 style='font-size:70px;text-align:left;'> "
                	. "<img src='../Symbol.png' width='60' height='60'>"
                        	. "EMIS <hr> </h1>";
                	echo "<p>The Username and/or Password entered was incorrect. Please check and try again. <br>"
                        	. "<a href='Username.php'> Forgot Username?</a><br>"
                        	. "<a href='Password.php'> Forgot Password? </a><br></p>";
                	echo "<p style = text-align:right;> <br><a href='../index.php'> Home </a><br>";
			exit();
            	}
            	$row = mysqli_fetch_row($employeeUsr);
            	$firstNm = $row[0];
            
            	$pas = mysqli_query($con, "SELECT EmployeeID FROM EmployeeLogin WHERE Email='" . $user . "'");
            	$pass = $pas->fetch_assoc();
            
            	// check if account is locked 
            	$lock = mysqli_query($con, "SELECT Locked FROM EmployeeLogin WHERE Email='" . $user . "'");
            	$row = mysqli_fetch_row($lock);
            	if(strcmp(row[0],"Yes") == 0){
                	echo "<h1 style='font-size:70px;text-align:left;'> "
                	. "<img src='Symbol.png' width='60' height='60'>"
                        	. "EMIS <hr> </h1>";
                	echo "<p> Your account has been locked. Please, contact the clinic or click the link to recovery account.<br>"
                        	    . "<a href='Password.php'> Account Recovery  </a><br></p>";
                	echo "<p style = text-align:right;> <br><a href='../index.php'> Home </a><br>";
                	exit();
            	}
            
            	// Check if password is correct
            	$employeePW = mysqli_query($con, "SELECT Password FROM EmployeeLogin WHERE Email='" . $user . "'");
            	$row = mysqli_fetch_row($employeePW);
            	if ($passwrd != $row[0]) {
                	// Track attempts
                	echo "<h1 style='font-size:70px;text-align:left;'> "
                	. "<img src='Symbol.png' width='60' height='60'>"
                        	. "EMIS <hr> </h1>";
                	$attempt = mysqli_query($con, "SELECT attempts FROM EmployeeLogin WHERE Email='" . $user . "'");
                	$row = mysqli_fetch_row($attempt);
                	$count = $row[0] + 1;
                	mysqli_query($con, "UPDATE EmployeeLogin SET attempts='" . $count . "' WHERE Email='" . $user . "'");
                	if($count >= 5){ // lockout account
                    		mysqli_query($con, "UPDATE EmployeeLogin SET Locked='Yes' WHERE Email='" . $user . "'");
                    		// Print out that account is locked
                    		echo "<p> Your account has been locked. Please, contact the clinic or click the link to recovery account.<br>"
                            	. "<a href='Password.php'> Account Recovery  </a><br></p>";
                    		echo "<p style = text-align:right;> <br><a href='../index.php'> Home </a><br>";
                    
                	}else{
                    		// Print out link back to home page and username and password recovery
                    		echo "<p>The Username and/or Password entered was incorrect. Please check and try again. <br>"
                            		. "<a href='Username.php'> Forgot Username?</a><br>"
                            		. "<a href='Password.php'> Forgot Password? </a><br></p>";
                    			echo "<p style = text-align:right;> <br><a href='index.php'> Home </a><br>";
                	}
                	exit();
            	}
            	mysqli_query($con, "UPDATE EmployeeLogin SET attempts= '0' WHERE Email='" . $user . "'");
            //}
            echo 'Welcome to EMIS, '. $firstNm ."<br/>";
            
            // Free mysql query
            mysqli_free_result($employeePW);
            mysqli_free_result($employeeUsr);
            

            
            
        ?>
        <h1 style="font-size:20px;text-align:right;"> 
            <a href="Logout.php"> Logout</a>
        </h1>
        <p> 
            Menu: <br>
            <a href="../jamesfiles/search.php?employeeid=<?php echo $pass['EmployeeID']; ?>"> Search</a> <br>
            <a href="../createapp/create.php"> Create Appointment</a> <br>
            <a href="../createpatient/CreatePatientAccount.php"> Create a New Patient Account</a> <br>
            <a href="../messaging/send_message.php">Send Message</a> <br>
	    <a href="../messaging/messages.php">My Messages</a> <br>
	</p>
        
    </body>
</html>


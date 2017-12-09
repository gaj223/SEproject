<!DOCTYPE html>
<!--
    Prompt user to enter login information
-->
<?php
    //session_start()
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
            

            // Check to see if username and password is correct
            $user = htmlentities($_POST["user"]);
            $passwrd =  htmlentities($_POST["passwrd"]);
            
            // check if user is in the database
            $patientUsr = mysqli_query($con, "SELECT PatientID FROM PatientLogin WHERE Email='" . $user . "'");
            if (mysqli_num_rows($patientUsr) < 1) {
                echo "<h1 style='font-size:70px;text-align:left;'> "
                . "<img src='Symbol.png' width='60' height='60'>"
                        . "EMIS <hr> </h1>";
                echo "<p>The Username and/or Password entered was incorrect. Please check and try again. <br>"
                        . "<a href='Username.php'> Forgot Username?</a><br>"
                        . "<a href='Password.php'> Forgot Password? </a><br></p>";
                echo "<p style = text-align:right;> <br><a href='index.php'> Home </a><br>";
                exit();
            }
            $pass = $patientUsr->fetch_assoc();
            
            // check if account is locked 
            $lock = mysqli_query($con, "SELECT Locked FROM PatientLogin WHERE Email='" . $user . "'");
            $row = mysqli_fetch_row($lock);
            if(strcmp(row[0],"Yes") == 0){
                echo "<h1 style='font-size:70px;text-align:left;'> "
                . "<img src='Symbol.png' width='60' height='60'>"
                        . "EMIS <hr> </h1>";
                echo "<p> Your account has been locked. Please, contact the clinic or click the link to recovery account.<br>"
                            . "<a href='Password.php'> Account Recovery  </a><br></p>";
                echo "<p style = text-align:right;> <br><a href='index.php'> Home </a><br>";
                exit();
            }
            
            // Check if password is correct
            $patientPW = mysqli_query($con, "SELECT PassWord FROM PatientLogin WHERE Email='" . $user . "'");
            $row = mysqli_fetch_row($patientPW);
            if ($passwrd != $row[0]) {
                // Track attempts
                echo "<h1 style='font-size:70px;text-align:left;'> "
                . "<img src='Symbol.png' width='60' height='60'>"
                        . "EMIS <hr> </h1>";
                $attempt = mysqli_query($con, "SELECT attempts FROM PatientLogin WHERE Email='" . $user . "'");
                $row = mysqli_fetch_row($attempt);
                $count = $row[0] + 1;
                mysqli_query($con, "UPDATE PatientLogin SET attempts='" . $count . "' WHERE Email='" . $user . "'");
                if($count >= 5){ // lockout account
                    mysqli_query($con, "UPDATE PatientLogin SET Locked='Yes' WHERE Email='" . $user . "'");
                    // Print out that account is locked
                    echo "<p> Your account has been locked. Please, contact the clinic or click the link to recovery account.<br>"
                            . "<a href='Password.php'> Account Recovery  </a><br></p>";
                    echo "<p style = text-align:right;> <br><a href='index.php'> Home </a><br>";
                    
                }else{
                    // Print out link back to home page and username and password recovery
                    echo "<p>The Username and/or Password entered was incorrect. Please check and try again. <br>"
                            . "<a href='Username.php'> Forgot Username?</a><br>"
                            . "<a href='Password.php'> Forgot Password? </a><br></p>";
                    echo "<p style = text-align:right;> <br><a href='index.php'> Home </a><br>";
                }
                exit();  
            }
            mysqli_query($con, "UPDATE PatientLogin SET attempts= '0' WHERE Email='" . $user . "'");
            // Get Patient's Name 
            $patientNm = mysqli_query($con, "SELECT FirstName FROM PatientPersonalInfo WHERE Email='" . $user . "'");
            $row = mysqli_fetch_row($patientNm);
            echo 'Welcome to EMIS, '. $row[0]."<br/>";
            
            // Free mysql query
            mysqli_free_result($patientPW);
            mysqli_free_result($patientUsr);
            mysqli_free_result($patientNm);

            
        ?>
        <h1 style="font-size:20px;text-align:right;"> 
            <a href="Logout.php"> Logout</a>
        </h1>
        <p> 
            Menu: <br>
            <a href="PersonalInfo.php?patientid=<?php echo $pass['PatientID']; ?>"> Personal Information</a> <br>
            <a href="InsuranceInfo.php"> Insurance Information</a> <br>
            <a href="appointments/appointment.php"> Appointments</a> <br> 
        </p>
       
    </body>
</html>


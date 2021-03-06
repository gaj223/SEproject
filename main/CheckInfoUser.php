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
                        font-size: 20px;
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
        	<h2></h2>
        </p>

    </header>
	<article>
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
            $role = htmlentities($_POST["role"]);
            $first =  htmlentities($_POST["first"]);
            $last =  htmlentities($_POST["last"]);
            $ssn = htmlentities($_POST["ssn"]);
            // Check to see if a patient or employee
            if ($role == "Patient"){
                $patientInfo = mysqli_query($con, "SELECT FirstName, LastName, Email FROM PatientPersonalInfo"
                    . " WHERE SSN='" . $ssn . "'");
            
                if (mysqli_num_rows($patientInfo) < 1) {
                    exit("Information does match our system. 1");
                } 
            
                // Retrieve the Patient's info
                $row = mysqli_fetch_row($patientInfo);
                
                // Free mysql query
                mysqli_free_result($patientInfo);
                
            }else{
                $employeeInfo = mysqli_query($con, "SELECT FirstName, LastName, Email FROM EmployeeLogin"
                    . " WHERE SSN='" . $ssn . "'");

            
                if (mysqli_num_rows($employeeInfo) < 1) {
                    exit("Information does match our system. ");
                } 
            
                // Retrieve the Employee's info
                $row = mysqli_fetch_row($employeeInfo);   
                
                // Free mysql query
            // Check to see if username and password is correct
                mysqli_free_result($employeeInfo);
            }
            
            
            //Check first and last name
            $firstNm = $row[0];
            $lastNm = $row[1];
            if ($firstNm != $first || $lastNm != $last){
                exit("Information does match our system. ");
            }
            
            // Display Username
            $email = $row[2];
            echo 'Your username is '. $email."<br/>";
            
            
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
